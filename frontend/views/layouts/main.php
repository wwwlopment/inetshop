<?php

/* @var $this \yii\web\View */

/* @var $content string */
use common\models\Products;
use frontend\models\SearchForm;
use yii\helpers\Html;
use common\models\Categories;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\UnicaseAsset;
use common\widgets\Alert;

$upsell = Products::find()->limit(10)->offset(15)->all();
$hot = Products::find()->limit(5)->offset(25)->all();

/*$upsell = Yii::$app->params['upsel'];
$hot = Yii::$app->params['hot'];*/
/*if (isset($_SESSION['cart'])) {
  echo '<pre>';
  var_dump($_SESSION['cart']);
  echo '</pre>';
  echo count($_SESSION['cart']);
}*/


UnicaseAsset::register($this);

//$model = new SearchForm();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>


    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<div class="cnt-homepage">
<?php $this->beginBody() ?>

  <?php
  /*    NavBar::begin([
          'brandLabel' => Yii::$app->name,
          'brandUrl' => Yii::$app->homeUrl,
          'options' => [
              'class' => 'navbar-inverse navbar-fixed-top',
          ],
      ]);
      $menuItems = [
          ['label' => 'Home', 'url' => ['/site/index']],
          ['label' => 'About', 'url' => ['/site/about']],
          ['label' => 'Contact', 'url' => ['/site/contact']],
      ];
      if (Yii::$app->user->isGuest) {
          $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
          $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
      } else {
          $menuItems[] = '<li>'
              . Html::beginForm(['/site/logout'], 'post')
              . Html::submitButton(
                  'Logout (' . Yii::$app->user->identity->username . ')',
                  ['class' => 'btn btn-link logout']
              )
              . Html::endForm()
              . '</li>';
      }
      echo Nav::widget([
          'options' => ['class' => 'navbar-nav navbar-right'],
          'items' => $menuItems,
      ]);
      NavBar::end();
      */ ?>

<div class="container">
    <!-- ============================================================= SEARCH AREA ============================================================= -->
<div class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                    <a  href="<?=\yii\helpers\Url::to(['/'])?>">

                        <img src="<?=Yii::$app->urlManager->baseUrl.'/images/logo_112.jpg'?>" alt="">

                    </a>
                <!-- ============================================================= LOGO : END ============================================================= -->
            </div><!-- /.logo-holder -->

            <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                <div class="contact-row ">
                <span class="section-title text-center vcenter ">Internet Shop</span>


                </div><!-- /.contact-row -->
                <!-- ============================================================= SEARCH AREA ============================================================= -->
                <div class="search-area">

                 <!--  <form>-->
                    <?php
                   // $search_model = new \app\models\Search();
                   // $q='';
                    $form = ActiveForm::begin([

                      'action'  => ['elastic/search'],
                      'method'  => 'get',
                            'id' => 'form-input-example',
                            'options' => [
                              'name'=>'search_form',
                               // 'class' => 'form-horizontal col-lg-11',
                               // 'enctype' => 'multipart/form-data'
                            ],
                        ]); ?>
                        <div class="control-group">

                            <ul class="categories-filter animate-dropdown">

                                <li class="dropdown">

                                    <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Категорії <b class="caret"></b></a>

                                    <ul class="dropdown-menu" role="menu" >
                              <?php
                              $categories = Categories::find()->all();
                              if (isset ($categories)) {
                                foreach ($categories as $category) {

                                  echo Html::tag('li',$category->title ,['class'=>'menu-header']);
                                    ?>

                                  <?php
                                }
                              }?>
                                    </ul>
                                </li>
                            </ul>

                            <!--/*= $form->field($model, 'q')->label('')->textInput(['class'=>'search-field', 'placeholder'=>'Пошук...']);*/-->

                         <input name="search" class="search-field" placeholder="Пошук..." />
<!--                            --><?php /*$form->field($search_model, 'search')->textInput(['class'=>'search-field'])->hint('Пошук')->label(false);*/?>
                           <?=Html::a('', '#', ['class' => 'search-button', 'onclick'=>'$(\'#form-input-example\').submit();']);?>
                        <!--    <a class="search-button" href="#" ></a>-->

                        </div>
<!--                    </form>
-->                    <?php ActiveForm::end(); ?>
                </div>


            </div>
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
                              $img_url = $item['image'];
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
                                          <h5 class="quantity">х<?=$item['quantity']?> шт.</h5>
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

                                <a href="<?=\yii\helpers\Url::to(['site/createorder'])?>" data-pjax=0 class="btn btn-upper btn-primary   btn-block m-t-20">Checkout</a>
                            </div><!-- /.cart-total-->


                        </li>
                    </ul><!-- /.dropdown-menu-->
                </div><!-- /.dropdown-cart -->
            <?php } ?>
              <?php Pjax::end(); ?>
                <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
            </div>
        </div>
    </div>
</div>

    <?php if ($_SERVER['REQUEST_URI'] != '/site/createorder') { ?>
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
                          <?= Html::a(Html::tag('i','',['class'=>'icon '.$category->logo_class])
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
        <div class="sidebar-widget hot-deals wow fadeInUp">
            <h3 class="section-title">гарячі продажі</h3>
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">

              <?php
           //   $hot = [];
              if (isset($hot)) {
                foreach ($hot as $hot_item) { ?>
                    <div class="item">
                        <div class="products">
                            <div class="hot-deal-wrapper">
                                <div class="image">
                                    <img width="200px" src="<?= $hot_item->image ?>" alt="">
                                </div>
                                <div class="sale-offer-tag"><span>35%<br>off</span></div>
                                <div class="timing-wrapper">
                                    <div class="box-wrapper">
                                        <div class="date box">
                                            <span class="key">120</span>
                                            <span class="">Days</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="hour box">
                                            <span class="key">20</span>
                                            <span class="">HRS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="minutes box">
                                            <span class="key">36</span>
                                            <span class="">MINS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper hidden-md">
                                        <div class="seconds box">
                                            <span class="key">60</span>
                                            <span class="">SEC</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.hot-deal-wrapper -->

                            <div class="product-info text-left m-t-20">
                                <h3 class="name">
                                  <?= Html::a($hot_item->title, ['site/view', 'id' => $hot_item->id]) ?>
                                </h3>
                                <div class="rating rateit-small"></div>

                                <div class="product-price">
								<span class="price">
									<?= $hot_item->price . ' грн.' ?>
								</span>

                                    <!-- <span class="price-before-discount">$800.00</span>-->

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->

                            <div class="cart clearfix animate-effect">
                                <div class="action">

                                    <div class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <!--<button class="btn btn-primary" type="button">В кошик</button>-->
                                        <button href="<?= \yii\helpers\Url::to(['site/addtocart', 'product_id' => $hot_item->id]) ?>"
                                                data-id="<?= $hot_item->id ?>" class="buy btn btn-primary"
                                                type="button">Купити
                                        </button>
                                    </div>

                                </div><!-- /.action -->
                            </div><!-- /.cart -->
                        </div>
                    </div>
                <?php }
              }?>




            </div><!-- /.sidebar-widget -->
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== -->					<!-- ============================================== COLOR============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
            <div id="advertisement" class="advertisement">
                <div class="item bg-color">
                    <div class="container-fluid">
                        <div class="caption vertical-top text-left">
                            <div class="big-text">
                                Save<span class="big">50%</span>
                            </div>


                            <div class="excerpt">
                                on selected items
                            </div>
                        </div><!-- /.caption -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.item -->

                <div class="item" style="background-image: url('../../../frontend/web/images/advertisement/1.jpg');">

                </div><!-- /.item -->

                <div class="item bg-color">
                    <div class="container-fluid">
                        <div class="caption vertical-top text-left">
                            <div class="big-text">
                                Save<span class="big">50%</span>
                            </div>


                            <div class="excerpt fadeInDown-2">
                                on selected items
                            </div>
                        </div><!-- /.caption -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.item -->

            </div><!-- /.owl-carousel -->
        </div>

        <!-- ================================== TOP NAVIGATION : END ================================== -->
    </div><!-- /.sidebar -->
    <?php }?>
    <!-- ============================================== CATEGORY : END ============================================== -->					<!-- ============================================== HOT DEALS ============================================== -->
<div class="col-md-9">
      <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?= $content ?>
</div>

</div>
</div>
<div class="container">
<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">upsell products</h3>
    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

      <?php
             // $upsell = [];
              if (isset($upsell)) {
                  foreach ($upsell as $upsel_item) { ?>

          <div class="item item-carousel">
              <div class="products">

                  <div class="product">
                      <div class="product-image">
                          <div class="image">
                            <?= Html::a(Html::img($upsel_item->image,['width'=>'150px', 'data-echo'=>$upsel_item->image]), ['site/view', 'id' => $upsel_item->id])?>
                          </div><!-- /.image -->

                          <div class="tag sale"><span>sale</span></div>
                      </div><!-- /.product-image -->


                      <div class="product-info text-left col-md-12">
                          <h3 class="name"><a href="detail.html"><?=$upsel_item->title?></a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>

                          <div class="product-price">
				<span class="price">
					<?=$upsel_item->price . ' грн.'?>				</span>
                              <!-- <span class="price-before-discount">$ 800</span>-->

                          </div><!-- /.product-price -->

                      </div><!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                          <div class="action">
                              <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                          <i class="fa fa-shopping-cart"></i>
                                      </button>
                                      <!-- <button class="btn btn-primary" type="button">Купити</button>-->
                                      <button  href="<?=\yii\helpers\Url::to(['site/addtocart', 'product_id' => $upsel_item->id])?>"  data-id="<?=$upsel_item->id?>" class="buy btn btn-primary" type="button">Купити</button>
                                  </li>

                                  <li class="lnk wishlist">
                                      <a class="add-to-cart" href="detail.html" title="Wishlist">
                                          <i class="icon fa fa-heart"></i>
                                      </a>
                                  </li>

                                  <li class="lnk">
                                      <a class="add-to-cart" href="detail.html" title="Compare">
                                          <i class="fa fa-retweet"></i>
                                      </a>
                                  </li>
                              </ul>
                          </div><!-- /.action -->
                      </div><!-- /.cart -->
                  </div><!-- /.product -->

              </div><!-- /.products -->
          </div><!-- /.item -->
      <?php }
      } ?>

    </div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

    <h3 class="section-title">Our Brands</h3>
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">

            <div class="item m-t-15">
                <a href="#" class="image">
                    <img data-echo="../../frontend/web/images/brands/brand1.png" src="../../frontend/web/images/blank.gif" alt="">
                </a>
            </div><!--/.item-->

            <div class="item m-t-10">
                <a href="#" class="image">
                    <img data-echo="../../frontend/web/images/brands/brand2.png" src="../../frontend/web/images/blank.gif" alt="">
                </a>
            </div><!--/.item-->

            <div class="item">
                <a href="#" class="image">
                    <img data-echo="../../frontend/web/images/brands/brand3.png" src="../../frontend/web/images/blank.gif" alt="">
                </a>
            </div><!--/.item-->

            <div class="item">
                <a href="#" class="image">
                    <img data-echo="../../frontend/web/images/brands/brand4.png" src="../../frontend/web/images/blank.gif" alt="">
                </a>
            </div><!--/.item-->

            <div class="item">
                <a href="#" class="image">
                    <img data-echo="../../frontend/web/images/brands/brand5.png" src="../../frontend/web/images/blank.gif" alt="">
                </a>
            </div><!--/.item-->

            <div class="item">
                <a href="#" class="image">
                    <img data-echo="../../frontend/web/images/brands/brand6.png" src="../../frontend/web/images/blank.gif" alt="">
                </a>
            </div><!--/.item-->

            <div class="item">
                <a href="#" class="image">
                    <img data-echo="../../frontend/web/images/brands/brand2.png" src="../../frontend/web/images/blank.gif" alt="">
                </a>
            </div><!--/.item-->

            <div class="item">
                <a href="#" class="image">
                    <img data-echo="../../frontend/web/images/brands/brand4.png" src="../../frontend/web/images/blank.gif" alt="">
                </a>
            </div><!--/.item-->

            <div class="item">
                <a href="#" class="image">
                    <img data-echo="../../frontend/web/images/brands/brand1.png" src="../../frontend/web/images/blank.gif" alt="">
                </a>
            </div><!--/.item-->

            <div class="item">
                <a href="#" class="image">
                    <img data-echo="../../frontend/web/images/brands/brand5.png" src="../../frontend/web/images/blank.gif" alt="">
                </a>
            </div><!--/.item-->
        </div><!-- /.owl-carousel #logo-slider -->
    </div><!-- /.logo-slider-inner -->

</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
<!--</div>-->
<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
    <div class="links-social inner-top-sm">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <!-- ============================================================= CONTACT INFO ============================================================= -->
                    <div class="contact-info">
                        <div class="footer-logo">
                            <div class="logo">
                                <a href="<?=\yii\helpers\Url::to(['site/index'])?>">

                                    <img src="<?=Yii::$app->urlManager->baseUrl.'/images/logo_112.jpg'?>" alt="">

                                </a>
                            </div><!-- /.logo -->

                        </div><!-- /.footer-logo -->

                        <div class="module-body m-t-20">
                            <p class="about-us"> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.
                            </p>

                            <div class="social-icons">

                                <a href="http://facebook.com/transvelo" class='active'><i
                                            class="icon fa fa-facebook"></i></a>
                                <a href="#"><i class="icon fa fa-twitter"></i></a>
                                <a href="#"><i class="icon fa fa-linkedin"></i></a>
                                <a href="#"><i class="icon fa fa-rss"></i></a>
                                <a href="#"><i class="icon fa fa-pinterest"></i></a>

                            </div><!-- /.social-icons -->
                        </div><!-- /.module-body -->

                    </div><!-- /.contact-info -->
                    <!-- ============================================================= CONTACT INFO : END ============================================================= -->
                </div><!-- /.col -->

<div class="col-sm-6 col-md-2">
</div>

                <div class="col-xs-12 col-sm-6 col-md-5 ">
                    <!-- ============================================================= INFORMATION============================================================= -->
                    <div class="contact-information">
                        <div class="module-heading">
                            <h4 class="module-title">information</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body outer-top-xs">
                            <ul class="toggle-footer" style="">
                                <li class="media">
                                    <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                    </span>
                                    </div>
                                    <div class="media-body">
                                        <p>868 Any Stress,Burala Casi,Picasa USA.</p>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                    </span>
                                    </div>
                                    <div class="media-body">
                                        <p>(987) 1234 567 890<br>(123) 456 789 012</p>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                                    </div>
                                    <div class="media-body">
                                        <span><a href="#">wwwlopment@gmail.com</a></span><br>
                                    </div>
                                </li>

                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.contact-timing -->
                    <!-- ============================================================= INFORMATION : END ============================================================= -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.links-social -->


    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="copyright">
                    Copyright © 2018
                    <a href="<?=\yii\helpers\Url::to(['site/index'])?>">wwwlopment</a>
                    - All rights Reserved
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="<?=Yii::$app->urlManager->baseUrl.'/images/payments/1.png'?>" alt=""></li>
                        <li><img src="<?=Yii::$app->urlManager->baseUrl.'/images/payments/3.png'?>" alt=""></li>
                        <li><img src="<?=Yii::$app->urlManager->baseUrl.'/images/payments/4.png'?>" alt=""></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->


<!--<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <? /*= Html::encode(Yii::$app->name) */ ?> <? /*= date('Y') */ ?></p>

        <p class="pull-right"><? /*= Yii::powered() */ ?></p>
    </div>
</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
