<!DOCTYPE html>
<html lang="en" ng-app="farmapp">
<?php include_once(__ROOT__TEMPLATES__ . 'head.php');?>

<body>
<div id="wrapper">
    <!-- Header start -->
    <section id="header">
        <section id="header-top" class="container-fluid">
            <?php include_once( __ROOT__TEMPLATES__ . 'header-top.php');?>
        </section>
        <section id="header-nav">
            <?php include_once( __ROOT__TEMPLATES__ . 'header-nav.php');?>
        </section>
        <section class="breadcrumb-wrapper">
            <div class="container">
                <?php include_once( __ROOT__TEMPLATES__ . 'breadcrumb.php');?>
            </div>
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

    <section id="content">
        <div  class="container">
            <div class="row">

                <!-- category left sidebar start -->
                <section id="left_sidebar">
                    <div class="col-md-3">
                        <section  id="shopping-cart-panel" ng-controller="ShoppingCartCtrl">
                            <div class="col-md-12" ng-if="shoppingcart.haveProducts">
                                <?php include_once( __ROOT__TEMPLATES__ . 'shopping-cart.php');?>
                            </div>
                        </section>
                        <div class="col-md-12" id="categories_panel">
                            <?php include_once( __ROOT__TEMPLATES__ . 'category-left-sidebar.php');?>
                        </div>
                    </div>
                </section>
                <!-- category left sidebar over -->

                <!-- product list start -->
                <section id="request_product_form" ng-controller="RequestProductCtrl">

                    <div class="col-md-9" >
                        <section id="product-request-before" >
                            <div class="row" >
                                <p class="bg-primary sample-show-hide.ng-hide" ng-if="!showRequestProductForm">¡Lo sentimos! tu búsqueda <strong><?= '"' . $string_to_search  . '"'?></strong> no ha generado resultados.</p>
                            </div>
                        </section>
                    </div>
                </section>
                <!-- product list over -->
            </div>
        </div>
    </section>

    <!-- Content over -->

    <!-- Footer start -->
    <section id="footer">
        <?php include_once( __ROOT__TEMPLATES__ . 'footer.php');?>
    </section>
    <!-- Footer over -->
</div>
</body>
</html>


