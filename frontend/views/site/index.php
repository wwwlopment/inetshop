<?php

namespace common\models\Categories;

use common\models\Products;
use Yii;
use yii\helpers\Html;
use common\models\Categories;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
/*if (isset($_SESSION['cart'])) {
  echo '<pre>';
  var_dump($_SESSION['cart']);
  echo '</pre>';
  echo count($_SESSION['cart']);
}*/
?>
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1 header-style-2">
    <div class="logo col-xs-12 col-sm-12 col-md-9">
        <a class="col-md-4" href="<?=\yii\helpers\Url::to(['/'])?>">

            <img src="<?=Yii::$app->urlManager->baseUrl.'/images/logo_112.jpg'?>" alt="">

        </a>
        <span class="section-title text-center vcenter col-md-6">Internet Shop</span>
    </div><!-- /.logo -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          <?php Pjax::begin(['id' => 'pjaxContent']); ?>
          <?= Html::a("Обновить", ['site/index'], ['hidden'=>true, 'id'=>'cart_update']);?>
            <div id="cart" class="dropdown dropdown-cart">
                <a href="/" class="dropdown-toggle lnk-cart" data-toggle="dropdown">

                    <div class="items-cart-inner">
                        <div class="total-price-basket">
                            <span class="lbl">Cart -</span>
                            <span class="total-price">
						<span class="sign"></span>

						<span class="value">0 грн.</span>
					</span>
                        </div>
                        <div class="basket">
                            <i class="glyphicon glyphicon-shopping-cart"></i>
                        </div>
                        <div class="basket-item-count"><span class="count">
                                <?php if (!empty($_SESSION['cart_items'])) {
                                    echo $_SESSION['cart_items'];
                                    } else {
                                    echo '0';
                                } ?>

                            </span></div>

                    </div>
                </a>
              <?php if (!empty($_SESSION['cart'])) {
                $subtotal = 0;
                $sum = 0;
                ?>
                <ul class="dropdown-menu">

                    <li>
                      <?php foreach ($_SESSION['cart'] as $id => $item) {
                          $sum = $item['quantity'] * $item['price'];
                          $subtotal = $subtotal+$sum;
                          if(isset($item['image'])) {
                          $img_url = '../../frontend/web/uploads/'.$item['image'];
                          } else {
                          $img_url = '';
                          }
                          ?>
                        <div class="cart-item product-summary">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="image">
                                        <img class="cart-img" src="<?=$img_url?>" alt="">
                                    </div>
                                </div>
                                <div class="col-xs-7">

                                    <h3 class="name"><?=$item['title']?></h3>
                                    <div class="price"><?=$item['price']. ' грн.'?></div>
                                </div>
                                <div class="col-xs-1 action">
                                    <?= Html::a(Html::tag('i', '', ['class'=> 'fa fa-trash']).'', ['site/index', 'product_id' => $id], ['data-id'=> $id, 'class'=> 'rm_from_cart']);?>
                                </div>
                            </div>
                        </div><!-- /.cart-item -->
                        <?php } ?>

                        <div class="clearfix"></div>
                        <hr>

                        <div class="clearfix cart-total">
                            <div class="pull-right">

                                <span class="text">Sub Total :</span>
                                <span id="price_subtotal" class='price'><?=$subtotal . ' грн.'?></span>

                            </div>
                            <div class="clearfix"></div>

                            <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                        </div><!-- /.cart-total-->


                    </li>
                </ul><!-- /.dropdown-menu-->
            </div><!-- /.dropdown-cart -->
<?php } ?>
          <?php Pjax::end(); ?>
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

                                <?php
                                if (isset ($categories)) {
                                    foreach ($categories as $category) { ?>
                                        <li id="<?= $category->id ?>" class="dropdown menu-item">
                                            <?php
                                            echo Html::a(Html::tag('i','',['class'=>'icon '.$category->logo_class])
                                              .$category->title ,['site/index', 'cat' => $category->id],
                                              ['class'=>'dropdown-toggle']);
                                            ?>

                                        </li>

                                      <?php
                                    }
                                }?>

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
                                <?php
                                    if (isset ($pages)) {
                                    echo LinkPager::widget([
                                    'pagination' => $pages,
                                      'options'      => [
                                        'class'=>'list-inline list-unstyled'],

                                    ]);
                                    }
                                ?>

                                </div><!-- /.pagination-container -->        </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                    <div class="search-result-container">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active" id="grid-container">
                                <div class="category-product  inner-top-vs">
                                    <div class="row">
                                        <?php
                                        if (isset ($products)) {
                                        foreach ($products as $product) {
                                          if(isset($product->image)) {
                                            $img_url = '../../frontend/web/uploads/'.$product->image;
                                          } else {
                                            $img_url = '';
                                          }
                                        ?>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="#"><img  src="<?=$img_url?>" data-echo="<?=$img_url?>" alt=""></a>
                                                        </div><!-- /.image -->

                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="#"><?=$product->title;?></a></h3>
                                                        <div class="description"><?=$product->description;?></div>
                                                        <div class="product-price">
				                                        <span class="price"><?=$product->price. ' грн.';?></span>

                                                        </div><!-- /.product-price -->

                                                    </div><!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">

                                                            <button  href="<?=\yii\helpers\Url::to(['site/addtocart', 'product_id' => $product->id])?>"  data-id="<?=$product->id?>" class="buy btn btn-primary" type="button">Купити</button>



                                                        </div><!-- /.action -->
                                                    </div><!-- /.cart -->
                                                </div><!-- /.product -->

                                            </div><!-- /.products -->
                                        </div><!-- /.item -->
                                        <?php }
                                        }
                                        ?>
                                    </div><!-- /.row -->
                                </div><!-- /.category-product -->

                            </div><!-- /.tab-pane -->

                            <div class="tab-pane" id="list-container">
                                <div class="category-product  inner-top-vs">
                                  <?php
                                  if (isset ($products)) {
                                      foreach ($products as $product) {
                                  if(isset($product->image)) {
                                    $img_url = '../../frontend/web/uploads/'.$product->image;
                                  } else {
                                    $img_url = '';
                                  }
                                  ?>

                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img data-echo="<?=$img_url?>"
                                                                     src="<?=$img_url?>" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#"><?=$product->title?></a></h3>
                                                           <!-- <div class="rating rateit-small"></div>-->
                                                            <div class="product-price">
				                                        	<span class="price"><?=$product->price. ' грн.';?></span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">
                                                                <!--<div class="rating rateit-small"></div>-->
                                                            <?=$product->description?>
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button href="<?=\yii\helpers\Url::to(['site/addtocart', 'product_id' => $product->id])?>"  data-id="<?=$product->id?>" class="buy btn btn-primary" type="button">Купити
                                                                    </button>



                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->

                                    <?php }
                                      }
                                    ?>



                                </div><!-- /.category-product -->
                            </div><!-- /.tab-pane #list-container -->
                        </div><!-- /.tab-content -->
                        <div class="clearfix filters-container">

                            <div class="text-right">
                                <div class="pagination-container">
                                  <?php
                                  if (isset ($pages)) {
                                    echo LinkPager::widget([
                                      'pagination' => $pages,
                                      'options'      => [
                                        'class'=>'list-inline list-unstyled'],

                                    ]);
                                  }
                                  ?>
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