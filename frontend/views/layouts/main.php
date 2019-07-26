<?php

/* @var $this \yii\web\View */

/* @var $content string */
use common\models\Products;
use frontend\models\SearchForm;
use yii\helpers\Html;
use common\models\Categories;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\ModernAsset;
use common\widgets\Alert;
use yii\helpers\Url;

if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "") {
  $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: $redirect");
}

$upsell = Products::find()->limit(10)->all();
$hot = Products::find()->limit(5)->all();
ModernAsset::register($this);
   $subtotal = 0;
      $sum = 0;
if(isset($_SESSION['cart'])){
    $count = count($_SESSION['cart']);
} else {
    $count = 0;
}
 if (!empty($_SESSION['cart'])) {
/*   $subtotal = 0;
   $sum = 0;*/
   foreach ($_SESSION['cart'] as $id => $item) {
     $sum = $item['quantity'] * $item['price'];
     $subtotal = $subtotal + $sum;
   }
 }
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html>
<head>

    <title><?= Html::encode($this->title) ?></title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Shoppe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <?= Html::csrfMetaTags() ?>

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!--web-fonts-->
        <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Caveat|Cormorant+Infant" rel="stylesheet">
<!--  --><?php /* $this->registerJsFile('https://code.jquery.com/jquery-migrate-3.0.0.js', ['position' => View::POS_HEAD]);*/
?>
    <!--//for-mobile-apps -->
    <!--Custom Theme files -->
    <!--//end-smooth-scrolling-->
  <?php $this->head() ?>
</head>
<body>
<!--header-->
<div class="header">

    <div class="header-two navbar navbar-default"><!--header-two-->
        <div class="container">

            <div class="nav navbar-nav header-two-left">
                <h3 style="color: #ff590f">Не знайшли - <b>замовляйте !</b></h3    >
                <ul style="margin-top: 20px">
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+38(067) 756-51-28  <p style="margin-left: 23px"> +38(095) 212-51-37 (viber)</li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:sergiymedd635@gmail.com">sergiymedd635@gmail.com</a></li>

                </ul>

            </div>
            <div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
                <h1><a href="<?=\yii\helpers\Url::to(['/'])?>">Pony <br><b style="font-size: 22px; font-style: italic">інтернет-магазин</b><span class="tag">для дітей та батьків </span> </a></h1>
            </div>
            <div class="nav navbar-nav navbar-right header-two-right">
                <div class="header-right my-account">
                    <a href="<?=\yii\helpers\Url::to(['site/contact'])?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> ДЕ НАС ЗНАЙТИ </a>
                </div>
              <?php Pjax::begin(['id' => 'pjaxContent']); ?>
                <div class="header-right cart">
                    <a href="<?=\yii\helpers\Url::to(['site/cart'])?>" data-pjax="0"><span class="glyphicon glyphicon-shopping-cart"  aria-hidden="true"></span></a>
                    <h4>


                        <?= Html::a(Html::tag('span', $subtotal .' грн.'.'(' . Html::tag('span', $count, ['id'=>'simpleCart_quantity', 'class'=>'simpleCart_quantity']).')',['class'=> 'simpleCart_total'] ), Url::to(['site/cart']), ['data-pjax'=>0])?>


                    </h4>
                      <!--  <div class="cart-box">
                          <p><a href="javascript:;" class="simpleCart_empty">Очистити кошик</a></p>
                          <div class="clearfix"> </div>
                        </div>-->
                </div>
              <?php Pjax::end(); ?>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="top-nav navbar navbar-default"><!--header-three-->
        <div class="container">
            <nav class="navbar" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!--navbar-header-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav top-nav-info">
<!--                        <li><a href="<?/*=\yii\helpers\Url::to(['/'])*/?>" class="active">Home</a></li>
-->
                          <?php
                          $categories = \common\models\KartikTreeMenu::find()->roots()->all();
                          if (isset ($categories)) {
                            foreach ($categories as $category) {
                              //echo Html::tag('li',Html::a($category->name, ['site/category', 'cat' => $category->id], ['role'=>'menuitem', 'tabindex'=>'-1']));
                              ?>
                        <li class="dropdown grid">
                            <?= Html::a($category->name . Html::tag('b', '', ['class'=>'caret']),['site/category', 'cat' => $category->id] ,['class'=> 'dropdown-toggle active', 'data-toggle' => 'dropdown'])?>
                            <ul class="dropdown-menu multi-column multi-column1">
                                <div class="row">
                                    <?php
                                   // $subcat = \common\models\KartikTreeMenu::findOne(['id'=>$category->id]);
                                   // $subcategory = $subcat->children(1)->all();
                                    //foreach ($subcategory as $subcategory_item) {
                                      ?>
                                        <div class="col-sm-4 menu-grids menulist1">
                                            <a href="<?=\yii\helpers\Url::to(['site/category', 'cat' => $category->id])?>">
                                                <h4><?= $category->name ?></h4>
                                            </a>
                                            <ul class="multi-column-dropdown ">
                                                <?php $subsubcat = \common\models\KartikTreeMenu::findOne(['id'=>$category->id]);
                                                $subsubcategory = $subsubcat->children(1)->all();
                                                foreach ($subsubcategory as $subsub_item){
                                                ?>
                                                <li><a class="list" href="<?=\yii\helpers\Url::to(['site/category', 'cat' => $subsub_item->id])?>"><?=$subsub_item->name?></a></li>
                                                <?php }?>
                                                <!--<li><a class="list" href="products.html">Baby Wipes</a></li>
                                                <li><a class="list" href="products.html">Baby Soaps</a></li>
                                                <li><a class="list" href="products.html">Lotions & Oils </a></li>
                                                <li><a class="list" href="products.html">Powders</a></li>
                                                <li><a class="list" href="products.html">Shampoos</a></li>-->
                                            </ul>
                                    <!--        <ul class="multi-column-dropdown">
                                                <li><a class="list" href="products.html">Body Wash</a></li>
                                                <li><a class="list" href="products.html">Cloth Diapers</a></li>
                                                <li><a class="list" href="products.html">Baby Nappies</a></li>
                                                <li><a class="list" href="products.html">Medical Care</a></li>
                                                <li><a class="list" href="products.html">Grooming</a></li>
                                                <li><h6><a class="list" href="products.html">Combo Packs</a></h6></li>
                                            </ul>-->
                                        </div>
                                      <?php
                                    //}
                                    ?>
                                    <!--<div class="col-sm-2 menu-grids">
                                        <h4>Baby Clothes</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="products.html">Onesies & Rompers</a></li>
                                            <li><a class="list" href="products.html">Frocks</a></li>
                                            <li><a class="list" href="products.html">Socks & Tights</a></li>
                                            <li><a class="list" href="products.html">Sweaters & Caps</a></li>
                                            <li><a class="list" href="products.html">Night Wear</a></li>
                                            <li><a class="list" href="products.html">Quilts & Wraps</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 menu-grids">
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="products.html">Blankets</a></li>
                                            <li><a class="list" href="products.html">Gloves & Mittens</a></li>
                                            <h4>Shop by Age</h4>
                                            <li><a class="list" href="products.html">New Born (0 - 5 M)</a></li>
                                            <li><a class="list" href="products.html">5 - 10 Months</a></li>
                                            <li><a class="list" href="products.html">10 - 15 Months</a></li>
                                            <li><a class="list" href="products.html">15 Months Above</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 menu-grids">
                                        <ul class="multi-column-dropdown">
                                            <li><h6><a class="list" href="products.html">Feeding & Nursing</a></h6></li>
                                            <h4>Baby Gear</h4>
                                            <li><a class="list" href="products.html">Baby Walkers</a></li>
                                            <li><a class="list" href="products.html">Strollers</a></li>
                                            <li><a class="list" href="products.html">Prams & Toys</a></li>
                                            <li><a class="list" href="products.html">Cribs & Cradles</a></li>
                                            <li><a class="list" href="products.html">Booster Seats</a></li>
                                        </ul>
                                    </div>-->
                                    <div class="clearfix"> </div>
                                </div>
                            </ul>
                       </li>
                              <?php
                            }
                          }?>
                   <!--      <li class="dropdown grid">
                            <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Kids<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column multi-column2">
                                <div class="row">
                                    <div class="col-sm-3 menu-grids">
                                        <h4>New Arrivals</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="products.html">Topwear</a></li>
                                            <li><a class="list" href="products.html">Bottomwear</a></li>
                                            <li><a class="list" href="products.html">Innerwear</a></li>
                                            <li><a class="list" href="products.html">Nightwear</a></li>
                                            <li><a class="list" href="products.html">Swimwear</a></li>
                                            <li><a class="list" href="products.html">Jumpers</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 menu-grids">
                                        <h4>Boys</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="products.html">Jeans</a></li>
                                            <li><a class="list" href="products.html">Shirts</a></li>
                                            <li><a class="list" href="products.html">T-shirts</a></li>
                                            <li><a class="list" href="products.html">Dhoti Kurta Sets</a></li>
                                            <li><a class="list" href="products.html">Winter wear</a></li>
                                            <li><a class="list" href="products.html">Party Wear</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 menu-grids">
                                        <h4>Girls</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="products.html">Tops</a></li>
                                            <li><a class="list" href="products.html">Leggings</a></li>
                                            <li><a class="list" href="products.html">Dresses </a></li>
                                            <li><a class="list" href="products.html">Skirts</a></li>
                                            <li><a class="list" href="products.html">Casual Dresses</a></li>
                                            <li><a class="list" href="products.html">Capris & 3/4ths</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 menu-grids new-add2">
                                        <a href="products.html">
                                            <h6>Kids Special</h6>
                                            <img src="images/img1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </ul>
                        </li>
                        <li class="dropdown grid">
                            <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Accessories<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column menu-two multi-column3">
                                <div class="row">
                                    <div class="col-sm-4 menu-grids">
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="products.html">Jewellery</a></li>
                                            <li><a class="list" href="products.html">Hair bands & Clips</a></li>
                                            <li><a class="list" href="products.html">Bangles </a></li>
                                            <li><a class="list" href="products.html">Caps & Belts</a></li>
                                            <li><a class="list" href="products.html">Rain wear</a></li>
                                            <li><a class="list" href="products.html">Bags</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-8 menu-grids">
                                        <a href="products.html">
                                            <div class="new-add">
                                                <h5>30% OFF <br> Today Only</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </ul>
                        </li>
                        <li class="dropdown grid">
                            <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Toys <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column multi-column4">
                                <div class="row">
                                    <div class="col-sm-4 menu-grids menulist1">
                                        <h4>BABY</h4>
                                        <ul class="multi-column-dropdown ">
                                            <li><a class="list" href="products.html">Rockers</a></li>
                                            <li><a class="list" href="products.html">Rattles</a></li>
                                            <li><a class="list" href="products.html">Stroller Toys</a></li>
                                            <li><a class="list" href="products.html">Musical Toys </a></li>
                                            <li><a class="list" href="products.html">Doll Houses</a></li>
                                            <li><a class="list" href="products.html">Play Sets</a></li>
                                        </ul>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="products.html">Toys Dolls</a></li>
                                            <li><a class="list" href="products.html">Pacifiers</a></li>
                                            <li><a class="list" href="products.html">Building Sets</a></li>
                                            <li><a class="list" href="products.html">Bath Toys</a></li>
                                            <li><a class="list" href="products.html">Soft Toys</a></li>
                                            <li><h6><a class="list" href="products.html">Special Off</a></h6></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2 menu-grids">
                                        <h4>Pretend Play</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><h6><a class="list" href="products.html">Video Games</a></h6></li>
                                            <li><a class="list" href="products.html">Kitchen Sets</a></li>
                                            <li><a class="list" href="products.html">Sand Toys</a></li>
                                            <li><a class="list" href="products.html">Tool Sets</a></li>
                                            <li><a class="list" href="products.html">Bath Toys</a></li>
                                            <li><a class="list" href="products.html">Medical Set</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2 menu-grids">
                                        <h4>Outdoor</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="products.html">Swimming</a></li>
                                            <li><a class="list" href="products.html">Rideons </a></li>
                                            <li><a class="list" href="products.html">Scooters</a></li>
                                            <li><a class="list" href="products.html">Remote Control</a></li>
                                            <li><a class="list" href="products.html">Animals</a></li>
                                            <li><a class="list" href="products.html">Make up</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 menu-grids">
                                        <a href="products.html">
                                            <div class="new-add">
                                                <h5>30% OFF <br> Today Only</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </ul>
                        </li>-->
                        <!--<li><a href="codes.html">Special Offers</a></li>-->
                    </ul>
                    <div class="clearfix"> </div>
                    <!--//navbar-collapse-->
                    <header class="cd-main-header">
                        <ul class="cd-header-buttons">
                            <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                        </ul> <!-- cd-header-buttons -->
                    </header>
                </div>
                <!--//navbar-header-->
            </nav>
            <div id="cd-search" class="cd-search">
              <?php
               $search_model = new \common\models\SearchProducts();
               $q='';
              $form = ActiveForm::begin([

                'action'  => ['site/search'],
                'method'  => 'get',
                'id' => 'form-input-example',
                'options' => [
                  'name'=>'search_form',
                  // 'class' => 'form-horizontal col-lg-11',
                  // 'enctype' => 'multipart/form-data'
                ],
              ]); ?>

              <?= $form->field($search_model, 'params')->textInput(['placeholder' => 'введіть текст для пошуку...',
                'style' => ['font-style'=> 'italic'],
              ])->label(false) ?>
                  <!--  <input style="font-style: italic" type="search" placeholder="Пошук...">-->
              <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->beginBody() ?>
<?= Breadcrumbs::widget([
  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<?= Alert::widget() ?>
<?= $content ?>

<?php $this->endBody() ?>
<div class="footer">
    <div class="container">
        <div class="footer-info">
            <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
                <h4 class="footer-logo"><a href="<?=\yii\helpers\Url::to(['/'])?>">Pony <b>Shop</b> <span class="tag">Все для дітей та батьків </span> </a></h4>
                <p>© 2018 Pony Shop . All rights reserved | Developed by <a href="<?=\yii\helpers\Url::to(['/'])?>" target="_blank">wwwlopment</a></p>
                 Design by <a href="<?=\yii\helpers\Url::to(['/'])?>" target="_blank">W3layouts</a>
            </div>
            <!--<div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
                <h3>Popular</h3>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="products.html">new</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="checkout.html">Wishlist</a></li>
                </ul>
            </div>
            <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".9s">
                <h3>Subscribe</h3>
                <p>Sign Up Now For More Information <br> About Our Company </p>
                <form>
                    <input type="text" placeholder="Enter Your Email" required="">
                    <input type="submit" value="Go">
                </form>
            </div>-->
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</body>
</html>
<?php $this->endPage() ?>
