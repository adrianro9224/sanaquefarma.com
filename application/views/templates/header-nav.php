<header ng-controller="DevicesMenuAccordionCtrl">
	
	<div class="container-fluid">
        <div id="sticky-anchor"></div>
        <div class="row ng-cloak" id="search-nav" ng-cloak>
            <div class="col-md-8 col-md-offset-2">
                <div id="search-container">
                    <form name="searchProductForm" class="search-form" role="search" action="<?= base_url() . 'product/search_product'?>" method="post" autocomplete="off">
                        <div id="search-module" class="pull-left">
                            <input type="text" name="productName" id="productName" ng-change="search( productNameToSearch, searchProductForm.productName.$valid )" ng-model="productNameToSearch" ng-model="productNameToSearch" class="form-control" placeholder="BUSCA AQUÍ TU PRODUCTO" required="required">
                            <!-- <input popover-placement="top" popover="Escríbe aquí el nombre del producto que deseas!"  popover-trigger="focus" type="text" name="productName" id="productName" ng-change="search( productNameToSearch, searchProductForm.productName.$valid )" ng-model="productNameToSearch" ng-model="productNameToSearch" class="form-control" placeholder="Busca aquí tus productos" required="required"> -->
                            <!--<span for="productName" class="form-control-feedback"><i class="fa fa-search"></i></span>-->
                        </div><!-- /input-group -->
                        <button class="btn btn-default" href="/account" >BUSCAR <i class="fa fa-search"></i></button>
                    </form>
                    <div id="aux-search-table" class="hidden-xs">
                        <table class="table table-condensed table-hover table-striped" ng-if="searching">
                            <thead>
                            </thead>
                            <tbody >
                            <tr ng-if="results" ng-repeat="product in results">
                                <td ><a href="<?= base_url() . 'product/show_product_by_id/{{product.id}}'?>"  ng-bind="product.name + ', ' + product.presentation + ', ' + product.lab"></a></td>
                            </tr>
                            <tr ng-if="!productsCharged">
                                <td>Buscando...</td>
                            </tr>
                            <tr ng-if="!results && productsCharged">
                                <td>No se encontró ninguna coincidencia</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="nav">
            <div class="col-md-12 col-lg-12" id="primary-nav-container">
                <div id="header-nav-container">
                    <div id="primary-nav">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="#">
                                        <!--<i class="fa fa-cart-plus"></i>-->
                                    </a>
                                </div>
                        
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a title="Página de Inicio" href="/">Inicio<span class="sr-only">(current)</span></a></li>
                                        <!-- <li class="dropdown">
                                            <a href="#" title="lista de categorías" class="dropdown-toggle" role="button" aria-expanded="false">Categorias <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu" id="categories-scroll">
                                                <?php// foreach ($categories as $category):?>
                                                    <li>
                                                        <a href="<?//= "/product/show_products_by_category/" . lcfirst(str_replace(array(' '), '_', $category->name))?>"><?= $category->name?></a>
                                                    </li>
                                                    <li class="divider"></li>
                                                <?php// endforeach;?> 
                                            </ul>
                                        </li> -->
                                        <li ng-controller="HoursOfOperationCtrl">
                                            <?php include_once( __ROOT__TEMPLATES__ . 'hours_of_operation_modal.php' )?>
                                            <a ng-click="open('sm')" title="Horario" >Horario de atención</a>
                                        </li>
                                        <!-- <li><a href="/contact" title="Comunícate con nosotros" >Contacto</a></li> -->
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <?php if( $user_logged ):?>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $user_logged_account->first_name; ?> <i class="fa fa-user"></i></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="/account/log_in"><i class="fa fa-cog"></i> Panel</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="/account/log_out"><i class="fa fa-sign-out"></i> Cerrar sessión</a></li>
                                                </ul>
                                            </li>
                                        <?php else:?>
                                            <li><a class="btn btn-default" href="/account#sign-up-form" role="button"><i class="fa fa-sign-in"></i> Regístrate</a></li>
                                            <li><a class="btn btn-default" href="/account#log-in-form" role="button"><i class="fa fa-child"></i> Iniciar sesión</a></li>
                                        <?php endif;?>
                                    </ul>

                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>

	</div>
</header>