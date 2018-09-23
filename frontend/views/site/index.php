<?php
namespace common\models\Categories;

use common\models\Products;
use Yii;
use yii\helpers\Html;
use common\models\Categories;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<body>
<!--header-->
<div class="header">

  <div class="header-two navbar navbar-default"><!--header-two-->
    <div class="container">
      <div class="nav navbar-nav header-two-left">
        <ul>
          <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+38(067) 756-51-28  <p style="margin-left: 23px"> +38(095) 212-51-37</li>
          <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">sergiymedd635@gmail.com</a></li>
        </ul>
      </div>
      <div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
          <h1><a href="index.html">Pony <br><b style="font-size: 22px; font-style: italic">інтернет-магазин</b><span class="tag">Все для дітей та не тільки </span> </a></h1>
      </div>
      <div class="nav navbar-nav navbar-right header-two-right">
        <div class="header-right my-account">
          <a href="contact.html"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> ДЕ НАС ЗНАЙТИ </a>
        </div>
        <div class="header-right cart">
          <a href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
          <h4><a href="checkout.html">
              <span class="simpleCart_total"> 0.00 грн. </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)
            </a></h4>
          <div class="cart-box">
            <p><a href="javascript:;" class="simpleCart_empty">Ваш кошик порожній</a></p>
            <div class="clearfix"> </div>
          </div>
        </div>
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
            <li><a href="index.html" class="active">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Baby<b class="caret"></b></a>
              <ul class="dropdown-menu multi-column multi-column1">
                <div class="row">
                  <div class="col-sm-4 menu-grids menulist1">
                    <h4>Bath & Care</h4>
                    <ul class="multi-column-dropdown ">
                      <li><a class="list" href="products.html">Diapering</a></li>
                      <li><a class="list" href="products.html">Baby Wipes</a></li>
                      <li><a class="list" href="products.html">Baby Soaps</a></li>
                      <li><a class="list" href="products.html">Lotions & Oils </a></li>
                      <li><a class="list" href="products.html">Powders</a></li>
                      <li><a class="list" href="products.html">Shampoos</a></li>
                    </ul>
                    <ul class="multi-column-dropdown">
                      <li><a class="list" href="products.html">Body Wash</a></li>
                      <li><a class="list" href="products.html">Cloth Diapers</a></li>
                      <li><a class="list" href="products.html">Baby Nappies</a></li>
                      <li><a class="list" href="products.html">Medical Care</a></li>
                      <li><a class="list" href="products.html">Grooming</a></li>
                      <li><h6><a class="list" href="products.html">Combo Packs</a></h6></li>
                    </ul>
                  </div>
                  <div class="col-sm-2 menu-grids">
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
                  </div>
                  <div class="clearfix"> </div>
                </div>
              </ul>
            </li>
            <li class="dropdown grid">
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
            </li>
            <li><a href="codes.html">Special Offers</a></li>
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
        <form>
          <input style="font-style: italic" type="search" placeholder="Пошук...">
        </form>
      </div>
    </div>
  </div>
</div>
<!--//header-->
<!--banner-->
<!--<div class="banner">
  <div class="container">
    <div class="banner-text">
      <div class="col-sm-5 banner-left wow fadeInLeft animated" data-wow-delay=".5s">
        <h2>On Entire Fashion range</h2>
        <h3>Coming Soon </h3>
        <h4>Our New Designs</h4>
        <div class="count main-row">
          <ul id="example">
            <li><span class="hours">00</span><p class="hours_text">Hours</p></li>
            <li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
            <li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
          </ul>
          <div class="clearfix"> </div>
        </div>

      </div>
      <div class="col-sm-7 banner-right wow fadeInRight animated" data-wow-delay=".5s">
        <section class="slider grid">
          <div class="flexslider">
            <ul class="slides">
              <li>
                <h4>-30%</h4>
                <img src="images/b1.png" alt="">
              </li>
              <li>
                <h4>-25%</h4>
                <img src="images/b2.png" alt="">
              </li>
              <li>
                <h4>-32%</h4>
                <img src="images/b3.png" alt="">
              </li>
            </ul>
          </div>
        </section>
        <!--FlexSlider-->
        <!--End-slider-script-->
    <!--  </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>-->
<!--//banner-->
<!--new-->
<div class="new">
  <div class="container">
    <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
      <h3 class="title">Нові <span>поступлення </span></h3>
      <p>Щось цікавеньке для Вас із новинок... </p>
    </div>
    <div class="new-info">
      <div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
        <div class="new-top">
          <a href="single.html"><img src="images/g9.jpg" class="img-responsive" alt=""/></a>
          <div class="new-text">
            <ul>
              <li><a class="item_add" href=""> Add to cart</a></li>
              <li><a href="single.html">Quick View </a></li>
              <li><a href="products.html">Show Details </a></li>
            </ul>
          </div>
        </div>
        <div class="new-bottom">
          <h5><a class="name" href="single.html">Baby Red Dress </a></h5>
          <div class="rating">
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span>☆</span>
          </div>
          <div class="ofr">
            <p class="pric1"><del>$2000.00</del></p>
            <p><span class="item_price">$500.00</span></p>
          </div>
        </div>
      </div>
      <div class="col-md-3 new-grid new-mdl simpleCart_shelfItem wow flipInY animated" data-wow-delay=".7s">
        <div class="new-top">
          <a href="single.html"><img src="images/g10.jpg" class="img-responsive" alt=""/></a>
          <div class="new-text">
            <ul>
              <li><a class="item_add" href=""> Add to cart</a></li>
              <li><a href="single.html">Quick View </a></li>
              <li><a href="products.html">Show Details </a></li>
            </ul>
          </div>
        </div>
        <div class="new-bottom">
          <h5><a class="name" href="single.html">Crocs Sandals </a></h5>
          <div class="rating">
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span>☆</span>
          </div>
          <div class="ofr">
            <p><span class="item_price">$50.00</span></p>
          </div>
        </div>
      </div>
      <div class="col-md-3 new-grid new-mdl1 simpleCart_shelfItem wow flipInY animated" data-wow-delay=".9s">
        <div class="new-top">
          <a href="single.html"><img src="images/g11.jpg" class="img-responsive" alt=""/></a>
          <div class="new-text">
            <ul>
              <li><a class="item_add" href=""> Add to cart</a></li>
              <li><a href="single.html">Quick View </a></li>
              <li><a href="products.html">Show Details </a></li>
            </ul>
          </div>
        </div>
        <div class="new-bottom">
          <h5><a class="name" href="single.html">Pink Sip Cup </a></h5>
          <div class="rating">
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span>☆</span>
          </div>
          <div class="ofr">
            <p><span class="item_price">$150.00</span></p>
          </div>
        </div>
      </div>
      <div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay="1.1s">
        <div class="new-top">
          <a href="single.html"><img src="images/g12.jpg" class="img-responsive" alt=""/></a>
          <div class="new-text">
            <ul>
              <li><a class="item_add" href=""> Add to cart</a></li>
              <li><a href="single.html">Quick View </a></li>
              <li><a href="products.html">Show Details </a></li>
            </ul>
          </div>
        </div>
        <div class="new-bottom">
          <h5><a class="name" href="single.html">Child Print Bike </a></h5>
          <div class="rating">
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span>☆</span>
          </div>
          <div class="ofr">
            <p class="pric1"><del>$5050.00</del></p>
            <p><span class="item_price">$3020.00</span></p>
          </div>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<!--//new-->
<!--gallery-->
<div class="gallery">
  <div class="container">
    <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
      <h3 class="title">Popular<span> Products</span></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>
    </div>
    <div class="gallery-info">
      <div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
        <a href="products.html"><img src="images/g1.jpg" class="img-responsive" alt=""/></a>
        <div class="gallery-text simpleCart_shelfItem">
          <h5><a class="name" href="single.html">Baby Girls' Dress </a></h5>
          <p><span class="item_price">100$</span></p>
          <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
          <ul>
            <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
            <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 gallery-grid gallery-grid1 wow flipInY animated" data-wow-delay=".7s">
        <a href="products.html"><img src="images/g2.jpg" class="img-responsive" alt=""/></a>
        <div class="gallery-text simpleCart_shelfItem">
          <h5><a class="name" href="single.html">Pokemon Onesies</a></h5>
          <p><span class="item_price">79$</span></p>
          <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
          <ul>
            <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
            <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 gallery-grid gallery-grid2 wow flipInY animated" data-wow-delay=".9s">
        <a href="products.html"><img src="images/g3.jpg" class="img-responsive" alt=""/></a>
        <div class="gallery-text simpleCart_shelfItem">
          <h5><a class="name" href="single.html">Doctor Play Set</a></h5>
          <p><span class="item_price">30$</span></p>
          <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
          <ul>
            <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
            <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay="1.1s">
        <a href="products.html"><img src="images/g4.jpg" class="img-responsive" alt=""/></a>
        <div class="gallery-text simpleCart_shelfItem">
          <h5><a class="name" href="single.html">Cap & Gloves Set</a></h5>
          <p><span class="item_price">15$</span></p>
          <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
          <ul>
            <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
            <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
        <a href="products.html"><img src="images/g5.jpg" class="img-responsive" alt=""/></a>
        <div class="gallery-text simpleCart_shelfItem">
          <h5><a class="name" href="single.html">Full Sleeves Romper</a></h5>
          <p><span class="item_price">60$</span></p>
          <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
          <ul>
            <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
            <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 gallery-grid gallery-grid1 wow flipInY animated" data-wow-delay=".7s">
        <a href="products.html"><img src="images/g6.jpg" class="img-responsive" alt=""/></a>
        <div class="gallery-text simpleCart_shelfItem">
          <h5><a class="name" href="single.html">Party Wear Frock</a></h5>
          <p><span class="item_price">80$</span></p>
          <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
          <ul>
            <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
            <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 gallery-grid gallery-grid2 wow flipInY animated" data-wow-delay=".9s">
        <a href="products.html"><img src="images/g7.jpg" class="img-responsive" alt=""/></a>
        <div class="gallery-text simpleCart_shelfItem">
          <h5><a class="name" href="single.html">Bear Diaper Bag</a></h5>
          <p><span class="item_price">110$</span></p>
          <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
          <ul>
            <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
            <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay="1.1s">
        <a href="products.html"><img src="images/g8.jpg" class="img-responsive" alt=""/></a>
        <div class="gallery-text simpleCart_shelfItem">
          <h5><a class="name" href="single.html">Battery Police Bike</a></h5>
          <p><span class="item_price">300$</span></p>
          <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
          <ul>
            <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
            <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--//gallery-->
<!--trend-->
<div class="trend wow zoomIn animated" data-wow-delay=".5s">
  <div class="container">
    <div class="trend-info">
      <section class="slider grid">
        <div class="flexslider trend-slider">
          <ul class="slides">
            <li>
              <div class="col-md-5 trend-left">
                <img src="images/t1.png" alt=""/>
              </div>
              <div class="col-md-7 trend-right">
                <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                <h5>Flat 20% OFF</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
              </div>
              <div class="clearfix"></div>
            </li>
            <li>
              <div class="col-md-5 trend-left">
                <img src="images/t2.png" alt=""/>
              </div>
              <div class="col-md-7 trend-right">
                <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                <h5>Flat 20% OFF</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
              </div>
              <div class="clearfix"></div>
            </li>
            <li>
              <div class="col-md-5 trend-left">
                <img src="images/t3.png" alt=""/>
              </div>
              <div class="col-md-7 trend-right">
                <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                <h5>Flat 20% OFF</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
              </div>
              <div class="clearfix"></div>
            </li>
            <li>
              <div class="col-md-5 trend-left">
                <img src="images/t4.png" alt=""/>
              </div>
              <div class="col-md-7 trend-right">
                <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                <h5>Flat 20% OFF</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
              </div>
              <div class="clearfix"></div>
            </li>
          </ul>
        </div>
      </section>
    </div>
  </div>
</div>
<!--//trend-->
<!--footer-->
<div class="footer">
  <div class="container">
    <div class="footer-info">
      <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
        <h4 class="footer-logo"><a href="index.html">Modern <b>Shoppe</b> <span class="tag">Everything for Kids world </span> </a></h4>
        <p>© 2016 Modern Shoppe . All rights reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
      </div>
      <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
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
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
