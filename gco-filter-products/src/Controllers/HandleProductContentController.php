<?php

namespace GCOFILTERPRODUCTS\Controllers;

use GCOFILTERPRODUCTS\Shared\BuilderQueryProduct;

class HandleProductContentController {
	public function __construct() {
		add_filter( 'gco-handle-content-grid-products', [ $this, 'handleContentGridProduct' ] );
		add_filter( 'gco-handle-content-list-products', [ $this, 'handleContentListProduct' ] );
		// add_action('init',[$this,'handleContentGridProduct']);
	}

	public function handleContentGridProduct() {
		$content   = '';
		$aProducts = BuilderQueryProduct::initCreated()
		                                ->commonParseArgs( [
			                                'limit'   => 12,
			                                'order'   => 'desc',
			                                'orderBy' => 'date',
		                                ] )
		                                ->query();
		if ( ! empty( $aProducts ) ) {
			ob_start();
			foreach ( $aProducts as $aProduct ) {
				?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                    <!-- Single Product Start Here -->
                    <div class="single-pander-product">
                        <div class="pro-img">
                            <a href="<?= esc_url( $aProduct['link'] ) ?>"><img
                                        src="<?= esc_url( $aProduct['featuredImage'] ) ?>" alt="product-img"></a>
                            <span class="sticker-new">new</span>
                            <div class="quick-view-pro">
                                <a data-toggle="modal" data-target="#product-window" class="quick-view" href="#"></a>
                            </div>
                        </div>
                        <div class="pro-content">
                            <div class="rating"></div>
                            <h4 class="pro-title"><a
                                        href="<?= esc_url( $aProduct['link'] ) ?>"><?= esc_html( $aProduct['title'] ) ?></a>
                            </h4>
                            <p><span class="price"><?= $aProduct['HTMLPrice']['price'] ?></span></p>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" class="add-to-cart" data-toggle="tooltip"
                                       data-original-title="Thêm vào giỏ">Thêm vào giỏ</a>
                                </div>
                                <div class="actions-secondary">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End Here -->
                </div>
				<?php
			}
			$content = ob_get_contents();
			ob_end_clean();
		}

		return $content;
	}

	public function handleContentListProduct() {
		$content   = '';
		$aProducts = BuilderQueryProduct::initCreated()
		                                ->commonParseArgs( [
			                                'limit'   => 12,
			                                'order'   => 'desc',
			                                'orderBy' => 'date',
		                                ] )
		                                ->query();
		if ( ! empty( $aProducts ) ) {
			ob_start();
			foreach ( $aProducts as $aProduct ) {
				?>
                <div class="single-pander-product">
                    <div class="pro-img">
                        <a href="<?= esc_url( $aProduct['link'] ) ?>"><img
                                    src="<?= esc_url( $aProduct['featuredImage'] ) ?>" alt="product-img"></a>
                        <span class="sticker-new">new</span>
                        <div class="quick-view-pro">
                            <a data-toggle="modal" data-target="#product-window" class="quick-view" href="#"></a>
                        </div>
                    </div>
                    <div class="pro-content">
                        <div class="rating">
                        </div>
                        <h4 class="pro-title"><a
                                    href="<?= esc_url( $aProduct['link'] ) ?>"><?= esc_html( $aProduct['title'] ) ?></a>
                        </h4>
                        <p><span class="price"><?= $aProduct['HTMLPrice']['price'] ?></span></p>
                        <p><?= esc_html( $aProduct['shortDescription'] ) ?></p>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="cart.html" class="add-to-cart" data-toggle="tooltip" data-original-title="Thêm vào giỏ">Thêm vào giỏ</a>
                            </div>
                            <div class="actions-secondary">
                            </div>
                        </div>
                    </div>
                </div>
				<?php
			}
			$content = ob_get_contents();
			ob_end_clean();
		}

		return $content;
	}
}