<!-- Main Header Area End Here -->
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumb-area">
    <div class="container">
        <ol class="breadcrumb breadcrumb-list">
            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
            <li class="breadcrumb-item active">Shop</li>
        </ol>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Shop Page Start -->
<div class="container">
	<div class="main-shop-page white-bg ptb-90">
		<div class="container">
			<!-- Row End -->
			<div class="row">
				<!-- Sidebar Shopping Option Start -->
				<?php
                $slider = apply_filters('gcoFP_filter_product',[]);
                if (!empty($slider)){
                    echo $slider;
                }
                ?>
				<!-- Sidebar Shopping Option End -->
				<!-- Product Categorie List Start -->
				<div class="col-lg-9 order-1 order-lg-2">
					<div class="shop-banner mb-40">
						<a href="shop.html"><img src="<?=get_template_directory_uri()?>/assets/img/banner/b16.jpeg"
                                                 alt="banner-img"></a>
					</div>
					<!-- Grid & List View Start -->
					<div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
						<div class="grid-list-view d-flex align-items-center  mb-sm-15">
							<ul class="nav tabs-area d-flex align-items-center">
								<li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
								<li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
							</ul>
							<span class="show-items"></span>
						</div>
						<!-- Toolbar Short Area Start -->
						<div class="main-toolbar-sorter clearfix">
							<div class="toolbar-sorter d-md-flex align-items-center">

								<select class="sorter wide">
									<option value="Position">Sắp xếp mặc định</option>
									<option value="Product Name">Neme, A to Z</option>
									<option value="Product Name">Neme, Z to A</option>
									<option value="Price">Price low to heigh</option>
									<option value="Price">Price heigh to low</option>
								</select>
							</div>
						</div>
						<!-- Toolbar Short Area End -->
					</div>
					<!-- Grid & List View End -->
					<div class="shop-area mb-all-40">
						<!-- Grid & List Main Area End -->
						<div class="tab-content" id="gco-content-product">
							<div id="grid-view" class="tab-pane fade show active">
								<div class="row border-hover-effect ">
                                    <?php
                                    $contentGridProduct = apply_filters('gco-handle-content-grid-products',[]);
                                    if (!empty($contentGridProduct)){
                                        echo $contentGridProduct;
                                    }else{
                                        ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <!-- Single Product Start Here -->
                                            <div class="single-pander-product">
                                                <div class="pro-img">
                                                    <a href="product-details.html"><img src="img/products/p1.jpg" alt="product-img"></a>
                                                    <span class="sticker-new">new</span>
                                                    <div class="quick-view-pro">
                                                        <a data-toggle="modal" data-target="#product-window" class="quick-view" href="#"></a>
                                                    </div>
                                                </div>
                                                <div class="pro-content">
                                                    <div class="rating">
                                                    </div>
                                                    <h4 class="pro-title"><a href="product-details.html">Tiêu đề mẫu</a></h4>
                                                    <p><span class="price">$45.50</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" class="add-to-cart" data-toggle="tooltip" data-original-title="Thêm vào giỏ">Thêm vào giỏ</a>
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
                                    ?>
								</div>
								<!-- Row End -->
							</div>
							<!-- #grid view End -->
							<div id="list-view" class="tab-pane fade">
								<!-- Single Product Start Here -->
								<?php
								$contentListProduct = apply_filters('gco-handle-content-list-products',[]);
								if (!empty($contentListProduct)){
									echo $contentListProduct;
								}else{
									?>
                                    <div class="single-pander-product">
                                        <div class="pro-img">
                                            <a href="product-details.html"><img src="img/products/p1.jpg" alt="product-img"></a>
                                            <span class="sticker-new">new</span>
                                            <div class="quick-view-pro">
                                                <a data-toggle="modal" data-target="#product-window" class="quick-view" href="#"></a>
                                            </div>
                                        </div>
                                        <div class="pro-content">
                                            <div class="rating">





                                            </div>
                                            <h4 class="pro-title"><a href="product-details.html">Tiêu đề mẫu</a></h4>
                                            <p><span class="price">$55.50</span><span class="prev-price">$59.50</span></p>
                                            <p>Tiêu đề mẫu with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
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
								?>
							</div>
							<!-- #list view End -->
						</div>
						<!-- Grid & List Main Area End -->
					</div>
					<!-- Shop Breadcrumb Area Start -->
					<div class="shop-breadcrumb-area border-default mt-40">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-5">
								<span class="show-items"> </span>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-7">
								<ul class="pfolio-breadcrumb-list text-center">
									<li class="float-left prev"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i>Previous</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li class="float-right next"><a href="#">Next<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Shop Breadcrumb Area End -->
				</div>
				<!-- product Categorie List End -->
			</div>
			<!-- Row End -->
		</div>
		<!-- Container End -->
	</div>
</div>