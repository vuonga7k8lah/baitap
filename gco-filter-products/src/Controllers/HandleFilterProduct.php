<?php

namespace GCOFILTERPRODUCTS\Controllers;

class HandleFilterProduct {
	public function __construct() {
		add_filter( 'gcoFP_filter_product', [ $this, 'handleDisplayFilterProduct' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueScripts' ],999 );
	}
	public function enqueueScripts() {
		wp_register_script(
			GCOFP_PREFIX . 'script',
			plugin_dir_url( __FILE__ ) . '../Assets/JS/Main.js',
			[],
			GCOFP_VERSION,
			true
		);
        wp_enqueue_script(GCOFP_PREFIX . 'script');

	}

	public function handleDisplayFilterProduct() {
		?>
        <div class="col-lg-3 order-2 order-lg-1 mt-all-40">
            <div class="sidebar">
                <!-- Price Filter Options Start -->
                <div class="search-filter mb-30">
                    <h3 class="sidebar-title">Lọc giá</h3>
                    <form action="#" class="slider-sidebar">
                        <div id="slider-range"></div>
                        <input type="text" id="amount" class="amount-range" readonly>
                    </form>
                </div>
                <!-- Price Filter Options End -->
                <!-- Sidebar Categorie Start -->
                <div class="sidebar-categorie mb-30">
                    <h3 class="sidebar-title">Danh mục</h3>
                    <ul class="sidbar-style">
						<?php
						$aCategories = $this->getCategoriesProduct();
						if ( ! empty( $aCategories ) ) {
							foreach ( $aCategories as $aCategory ):
								?>
                                <li class="form-check">
                                    <input class="form-check-input" value="<?= esc_attr( $aCategory->term_id ) ?>"
                                           id="<?= esc_attr( $aCategory->slug ) ?>"
                                           type="checkbox">
                                    <label class="form-check-label"
                                           for="<?= esc_attr( $aCategory->slug ) ?>"><?= esc_attr
										( $aCategory->name ) ?>(<?= esc_attr( $aCategory->count ) ?>)</label>
                                </li>
							<?php
							endforeach;
						}
						?>
                    </ul>
                </div>
                <!-- Sidebar Categorie Start -->
                <!-- Product Size Start -->
                <div class="size mb-30">
                    <h3 class="sidebar-title">size</h3>
                    <ul class="size-list sidbar-style">
						<?php
						$aSizesProduct = $this->getSizesProduct();
						if ( ! empty( $aSizesProduct ) ) {
							foreach ( $aSizesProduct as $aSizeProduct ):
								?>
                                <li class="form-check">
                                    <input class="form-check-input" value="<?= esc_attr( $aSizeProduct->term_id ) ?>"
                                           id="<?= esc_attr( $aSizeProduct->slug ) ?>"
                                           type="checkbox">
                                    <label class="form-check-label"
                                           for="<?= esc_attr( $aSizeProduct->slug ) ?>"><?= esc_attr
										( $aSizeProduct->name ) ?>(<?= esc_attr( $aSizeProduct->count ) ?>)</label>
                                </li>
							<?php
							endforeach;
						}
						?>
                    </ul>
                </div>
                <!-- Product Size End -->
                <!-- Product Color Start -->
                <div class="color mb-30">
                    <h3 class="sidebar-title">Màu sắc</h3>
                    <ul class="color-option sidbar-style">
						<?php
						$aColorsProduct = $this->getColorsProduct();
						if ( ! empty( $aColorsProduct ) ) {
							foreach ( $aColorsProduct as $aColorProduct ):
								?>
                                <li>
                                    <span class="<?= esc_attr( $aColorProduct->slug ) ?>"></span>
                                    <a href="#"><?= esc_attr( $aColorProduct->name ) ?>
                                        (<?= esc_attr( $aColorProduct->count ) ?>)</a>
                                </li>
							<?php
							endforeach;
						}
						?>
                    </ul>
                </div>
                <!-- Product Color End -->
                <!-- Sidebar Categorie Start -->

            </div>
            <!-- Single Banner Start -->
            <div class="sidebar-banner mt-30">
                <a href="shop.html"><img class="ful" src="<?= get_template_directory_uri() ?>/assets/img/banner/b14.jpeg"
                                         alt="slider-banner"></a>
            </div>
            <!-- Single Banner End -->
        </div>
		<?php
	}

	public function getCategoriesProduct() {
		$aArgs['taxonomy'] = 'product_cat';
		$aArgs['number']   = 10;

		return get_terms( $aArgs );
	}

	public function getSizesProduct() {
		$aArgs['taxonomy'] = 'pa_size';
		$aArgs['number']   = 10;

		return get_terms( $aArgs );
	}

	public function getColorsProduct() {
		$aArgs['taxonomy'] = 'pa_color';
		$aArgs['number']   = 10;

		return get_terms( $aArgs );
	}
}