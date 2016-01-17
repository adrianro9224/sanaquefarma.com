<!DOCTYPE html>
<html lang="en" ng-app="farmapp">
<?php include_once(__ROOT__TEMPLATES__ . 'head.php');?>

<body ng-controller="MainCtrl">
	<div id="wrapper">
		<!-- Header start -->
		<section id="header">
			<section id="header-top" class="container-fluid">
				<?php include_once( __ROOT__TEMPLATES__ . 'header-top.php');?>
			</section>
			<section id="header-nav" class="">
				<?php include_once( __ROOT__TEMPLATES__ . 'header-nav.php');?>
			</section>
		</section>
		<!-- Header over -->
		<!-- Errors start -->
		<div class="container">
			<div class="row">
				<section id="errors">
					<?php include_once( __ROOT__TEMPLATES__ . 'notifications-banner.php');?>
				</section>
			</div>
		</div>
		<!-- Errors over -->

		<!-- Content start -->
		<section id="carousel" class="hidden-xs">
			<?php include_once( __ROOT__TEMPLATES__ . 'carousel.php');?>
		</section>
		<div class="container-container" id="home-products-container">
			<div class="container-fluid" id="main-products">
	            <!-- product list -->
				<section id="content">
	                <div id="home_product_list">
	                    <?php if ( isset($products) ):?>
	                    <div class="row">
	                        <?php foreach ( $products as $key => $product ): ?>
	                        <div class="col-md-2" id="columns-home">
	                            <div class="thumbnail product-product">
	                                <div class="caption caption-custom">
	                                	<img src="<?= base_url() . 'assets/images/products/' . $product->uri_img . $product->image_format_id?>" class="img-responsive" alt="<?= $product->name ?>" >
		                                <?php if( isset($product->has_discount) && $product->has_discount ): ?>
		                                    <span class="fa-stack fa-lg">
		                                        <i id="promotionWrapper" class="fa fa-circle"></i>
		                                        <span id="promotionText">-<?= bcmul($product->discount, 100) ?>%</span>
		                                    </span>
		                                <?php endif; ?>
	                                    <h3><?= $product->name ?></h3>
	                                    <p><?= $product->presentation ?></p>
	                                    <div class="product-price">
	                                        <!-- <span class="old-price" ng-bind=" // $product->joker ?> | currency : '$' : 0"></span> -->
	                                        <?php if( isset($product->has_discount) && $product->has_discount ): ?>
		                                        <h4 id="home-price" class="secondary-emphasis" ><?= 'Antes $' . number_format($product->old_price) . ' Ahora $' . number_format($product->new_price) ?></h4>
	                                        <?php else: ?>
	                                        	<h3 id="home-price" class="secondary-emphasis" ng-bind="<?= $product->price ?> | currency : '$' : 0"></h3>
	                                    	<?php endif;?>
											<?php if( isset($product->has_discount) && !empty($product->pre_description) ): ?>
												<p><?= $product->pre_description ?>
													<?php if( isset($product->landing_url) && !empty($product->landing_url) ): ?>
													<a id="landing-url-link" href="<?= base_url(). $product->landing_url ?>" ><strong>Ver más</strong></a>
													<?php endif;?>
												</p>
											<?php endif;?>
	                                    </div>

	                                </div>
	                                <div class="caption">
	                                	<a href="<?= '/product/show_product_by_id/' . $product->id  ?>" class="btn btn-primary">Comprar</a>
	                                </div>
	                            </div>
	                        </div>
	                        <?php endforeach; ?>
	                    </div>
	                    <?php endif;?>
	                </div>
	            </section>
	            <!-- product list end -->
			</div>
		</div>
		<!-- Content over -->
		<!-- Footer start -->
		<section id="footer">
				<?php include_once( __ROOT__TEMPLATES__ . 'footer.php');?>
		</section>
		<!-- Footer over -->
	</div>
</body>
</html>
