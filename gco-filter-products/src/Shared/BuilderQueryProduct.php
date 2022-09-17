<?php

namespace GCOFILTERPRODUCTS\Shared;

use WP_Query;

class BuilderQueryProduct {
	public array     $aArgs           = [];
	protected string $regularPriceKey = '_regular_price';
	protected string $salePriceKey    = '_sale_price';
	private static   $oSelf           = null;

	public static function initCreated(): ?BuilderQueryProduct {
		if ( self::$oSelf == null ) {
			self::$oSelf = new self();
		}

		return self::$oSelf;
	}

	public function commonParseArgs( array $aRawArgs ): BuilderQueryProduct {

		if ( isset( $aRawArgs['limit'] ) ) {
			$this->aArgs['posts_per_page'] = (int) $aRawArgs['limit'];
		}

		if ( isset( $aRawArgs['orderBy'] ) ) {
			$this->aArgs['orderBy'] = $aRawArgs['orderBy'];
		}
		if ( isset( $aRawArgs['order'] ) ) {
			$this->aArgs['order'] = $aRawArgs['order'];
		}
		if ( isset( $aRawArgs['categories'] ) && $aRawArgs['filter'] == 'filter' ) {
			$this->aArgs['category__in'] = array_map( function ( $aCategory ) {
				return (int) $aCategory['id'] ?? 0;
			}, $aRawArgs['categories'] );
		}

		return $this;
	}

	private function defineArgs(): array {
		return [
			'posts_per_page' => 20,
			'paged'          => 1,
			'orderby'        => 'ID',
			'order'          => 'DESC',
			'status'         => 'publish',
		];
	}

	public function query(): array {
		$aItems                   = [];
		$this->aArgs['post_type'] = 'product';
		$oQuery                   = new WP_Query( $this->aArgs );
		if ( $oQuery->have_posts() ) {
			while ( $oQuery->have_posts() ) {
				$oQuery->the_post();
				$postID          = $oQuery->post->ID;
				$aGalleryImages  = [];
				$aProductCat     = [];
				$aDataProductCat = get_the_terms( $postID, 'product_cat' );
				$featuredImageId = (int) get_post_meta( $postID, '_thumbnail_id', true );

				if ( ! empty( $aDataProductCat ) ) {
					foreach ( $aDataProductCat as $aItem ) {
						$aProductCat[] = [
							'id'    => $aItem->term_id,
							'name'  => $aItem->name,
							'slug'  => $aItem->slug,
							'count' => $aItem->count,
							'link'  => home_url( '/products-category/' . $aItem->slug ),
						];
					}
				}
				$oProduct    = wc_get_product( $postID );
				$ratingCount = $oProduct->get_rating_count() ?? 0;
				$reviewCount = $oProduct->get_review_count() ?? 0;
				$average     = $oProduct->get_average_rating() ?? '0';


				$aAmountPrice = [
					'price'     => (float) get_post_meta( $postID, $this->regularPriceKey, true ),
					'salePrice' => (float) get_post_meta( $postID, $this->salePriceKey, true ),
				];
				$aHTMLPrice   = [
					'price'     => wc_price( (float) get_post_meta( $postID, $this->regularPriceKey,
						true ) ),
					'salePrice' => wc_price( (float) get_post_meta( $postID, $this->salePriceKey,
						true ) ),
				];
				$aItems[]     = [
					'id'               => $postID,
					'title'            => $oQuery->post->post_title,
					'slug'             => $oQuery->post->post_name,
					'link'             => get_permalink( $postID ),
					'content'          => get_the_content( $postID ),
					'shortDescription' => $oProduct->get_short_description()??'',
					'createDate'       => $oQuery->post->post_date,
					'categories'       => $aProductCat,
					'featuredImage'    => wp_get_attachment_image_url( $featuredImageId ),
					'galleryImages'    => $aGalleryImages,
					'amountPrice'      => $aAmountPrice,
					'HTMLPrice'        => $aHTMLPrice,
					'reviews'          => [
						'ratingCount' => $ratingCount,
						'reviewCount' => $reviewCount,
						'average'     => (float) $average,
					]
				];
			}
		}
		wp_reset_postdata();

		return $aItems;
	}
}