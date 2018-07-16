<?php

namespace common\models\Categories;

use common\models\Products;
use Yii;
use yii\helpers\Html;
use common\models\Categories;
?>
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1 header-style-2">
    <div class="logo col-xs-12 col-sm-12 col-md-10">
        <a class="col-md-4" href="home.html">

            <img src="frontend/web/images/logo_112.jpg" alt="">

        </a>
        <span class="section-title text-center vcenter col-md-6">Internet Shop</span>
    </div><!-- /.logo -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

            <div class="dropdown dropdown-cart">
                <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                    <div class="items-cart-inner">
                        <div class="total-price-basket">
                            <span class="lbl">cart -</span>
                            <span class="total-price">
						<span class="sign">$</span>
						<span class="value">600.00</span>
					</span>
                        </div>
                        <div class="basket">
                            <i class="glyphicon glyphicon-shopping-cart"></i>
                        </div>
                        <div class="basket-item-count"><span class="count">2</span></div>

                    </div>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="cart-item product-summary">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="image">
                                        <a href="detail.html"><img src="frontend/web/images/cart.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-xs-7">

                                    <h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
                                    <div class="price">$600.00</div>
                                </div>
                                <div class="col-xs-1 action">
                                    <a href="#"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div><!-- /.cart-item -->
                        <div class="clearfix"></div>
                        <hr>

                        <div class="clearfix cart-total">
                            <div class="pull-right">

                                <span class="text">Sub Total :</span><span class='price'>$600.00</span>

                            </div>
                            <div class="clearfix"></div>

                            <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                        </div><!-- /.cart-total-->


                    </li>
                </ul><!-- /.dropdown-menu-->
            </div><!-- /.dropdown-cart -->

            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
        </div
    </div><!-- /.container-class -->

    <!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
      <!--  <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Smart Phone</li>
            </ul>
        </div>--><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class="homepage-container">
            <div class='row outer-bottom-sm'>
                <div class='col-md-3 sidebar'>
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    <div class="side-menu animate-dropdown outer-bottom-xs">
                        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Категорії</div>
                        <nav class="yamm megamenu-horizontal" role="navigation">
                            <ul class="nav">
                                <?php $categories = Categories::find()->all();
                                    foreach ($categories as $category) { ?>
                                <li id="<?=$category->id?>" class="dropdown menu-item">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon <?=$category->logo_class?>"></i><?=$category->title?></a>
                                </li>

                                <?php }?>

                            </ul><!-- /.nav -->
                        </nav><!-- /.megamenu-horizontal -->
                    </div><!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <!-- ========================================== SECTION – HERO ========================================= -->



                    <!-- ========================================= SECTION – HERO : END ========================================= -->
                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active">
                                            <a data-toggle="tab" href="#grid-container"><i
                                                        class="icon fa fa-th-list"></i>Grid</a>
                                        </li>
                                        <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th"></i>List</a>
                                        </li>
                                    </ul>
                                </div><!-- /.filter-tabs -->
                            </div><!-- /.col -->

                            <div class="col col-sm-12 col-md-10 text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->        </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                    <div class="search-result-container">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active" id="grid-container">
                                <div class="category-product  inner-top-vs">
                                    <div id="products"class="row">
<?php /*$products = Products::find()->where(['category_id'=>1])->orderBy('id')->all();
foreach ($products as $product) {
*/?>

<?php /*} */?>
                                    </div><!-- /.row -->
                                </div><!-- /.category-product -->

                            </div><!-- /.tab-pane -->

                            <div class="tab-pane" id="list-container">
                                <div class="category-product  inner-top-vs">


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/1.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag new"><span>new</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/2.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag sale"><span>sale</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/3.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag hot"><span>hot</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/4.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag hot"><span>hot</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/5.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag sale"><span>sale</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/6.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag new"><span>new</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/7.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag new"><span>new</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/1.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag sale"><span>sale</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/3.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag hot"><span>hot</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/5.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag new"><span>new</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/2.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag sale"><span>sale</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="frontend/web/images/fashion-products/6.jpg"
                                                                     src="frontend/web/images/blank.gif" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="detail.html">Simple Products Demo
                                                                    Showcase</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
					<span class="price">
						$650.99					</span>
                                                                <span class="price-before-discount">$ 800</span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">Suspendisse posuere arcu
                                                                diam, id accumsan eros pharetra ac. Nulla enim risus,
                                                                facilisis bibendum gravida eget, lacinia id purus.
                                                                Suspendisse posuere arcu diam, id accumsan eros pharetra
                                                                ac. Nulla enim risus, facilisis bibendum gravida eget.
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button class="btn btn-primary" type="button">Add to
                                                                        cart
                                                                    </button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="icon fa fa-heart"></i></button>
                                                                    <button class="left btn btn-primary" type="button">
                                                                        <i class="fa fa-retweet"></i></button>


                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                                <div class="tag hot"><span>hot</span></div>
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->


                                </div><!-- /.category-product -->
                            </div><!-- /.tab-pane #list-container -->
                        </div><!-- /.tab-content -->
                        <div class="clearfix filters-container">

                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->                                </div>
                            <!-- /.text-right -->

                        </div><!-- /.filters-container -->

                    </div><!-- /.search-result-container -->

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.container -->

</div><!-- /.body-content -->
</body>
</html>