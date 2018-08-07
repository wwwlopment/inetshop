<?php
use yii\helpers\Html;
?>

<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row single-product outer-bottom-sm '>
      <div class='col-md-3 sidebar'>
        <div class="sidebar-module-container">
          <!-- ==============================================CATEGORY============================================== -->
          <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
            <h3 class="section-title">Категорії</h3>
            <div class="sidebar-widget-body m-t-10">
              <div class="accordion">
                  <?php foreach ($categories as $category) {?>

                <div class="accordion-group">
                  <div class="accordion-heading">
                    <?= Html::a(Html::tag('i','',['class'=>'icon '.$category->logo_class])
                      . ' ' .$category->title ,['site/index', 'cat' => $category->id],
                      ['class'=>'accordion-toggle collapsed']);
                    ?>
                   <!--   <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed">

                      </a>-->
                  </div><!-- /.accordion-heading -->
              <!--    <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                    <div class="accordion-inner">
                      <ul>
                        <li><a href="#">gaming</a></li>
                        <li><a href="#">office</a></li>
                        <li><a href="#">kids</a></li>
                        <li><a href="#">for women</a></li>
                      </ul>
                    </div>
                  </div>--><!-- /.accordion-body -->
                </div><!-- /.accordion-group -->

                    <?php } ?>

              </div><!-- /.accordion -->
            </div><!-- /.sidebar-widget-body -->
          </div><!-- /.sidebar-widget -->
          <!-- ============================================== CATEGORY : END ============================================== -->					<!-- ============================================== HOT DEALS ============================================== -->
          <div class="sidebar-widget hot-deals wow fadeInUp">
            <h3 class="section-title">гарячі продажі</h3>
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">

                <?php foreach ($hot as $hot_item) { ?>
              <div class="item">
                <div class="products">
                  <div class="hot-deal-wrapper">
                    <div class="image">
                      <img  width="200px" src="<?=$hot_item->image?>" alt="">
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
                      <?= Html::a($hot_item->title, ['view', 'id' => $hot_item->id])?>
                    </h3>
                    <div class="rating rateit-small"></div>

                    <div class="product-price">
								<span class="price">
									<?=$hot_item->price . ' грн.'?>
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
                          <button  href="<?=\yii\helpers\Url::to(['site/addtocart', 'product_id' => $hot_item->id])?>"  data-id="<?=$hot_item->id?>" class="buy btn btn-primary" type="button">Купити</button>
                      </div>

                    </div><!-- /.action -->
                  </div><!-- /.cart -->
                </div>
              </div>
 <?php } ?>




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

              <div class="item" style="background-image: url('../../web/images/advertisement/1.jpg');">

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

          <!-- ============================================== COLOR: END ============================================== -->
        </div>
      </div><!-- /.sidebar -->
      <div class='col-md-9'>
        <div class="row  wow fadeInUp">
          <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
            <div class="product-item-holder size-big single-product-gallery small-gallery">

              <div id="owl-single-product">
                <div class="single-product-gallery-item" id="slide1">
                  <a data-lightbox="image-1" data-title="Gallery" href="<?=$product->image?>">
                    <img class="img-responsive" alt="" src="<?=$product->image?>" data-echo="<?=$product->image?>" />
                  </a>
                </div><!-- /.single-product-gallery-item -->



              </div><!-- /.single-product-slider -->


              <div class="single-product-gallery-thumbs gallery-thumbs">

                <div id="owl-single-product-thumbnails">
                  <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                      <img class="img-responsive" width="85" alt="" src="<?=$product->image?>" data-echo="<?=$product->image?>" />
                    </a>
                  </div>


                </div><!-- /#owl-single-product-thumbnails -->



              </div><!-- /.gallery-thumbs -->

            </div><!-- /.single-product-gallery -->
          </div><!-- /.gallery-holder -->
          <div class='col-sm-6 col-md-7 product-info-block'>
            <div class="product-info">
              <h1 class="name"><?=$product->title?></h1>

              <div class="rating-reviews m-t-20">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="rating rateit-small"></div>
                  </div>
                  <div class="col-sm-8">
                    <div class="reviews">
                      <a href="#" class="lnk">(06 Reviews)</a>
                    </div>
                  </div>
                </div><!-- /.row -->
              </div><!-- /.rating-reviews -->

              <div class="stock-container info-container m-t-10">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="stock-box">
                       <span class="red-text"><?= ($product->available == 1) ? 'В наявності' : 'Немає в наявності' ?></span>
                    </div>
                  </div>
              <!--    <div class="col-sm-9">
                    <div class="stock-box">
                      <span class="red-text"><?/*= ($product->available!=1) ? 'В наявності' : '' */?></span>
                    </div>
                  </div>-->
                </div><!-- /.row -->
              </div><!-- /.stock-container -->

              <div class="description-container m-t-20">
                    <?= $product->description?>
              </div><!-- /.description-container -->

              <div class="price-container info-container m-t-20">
                <div class="row">


                  <div class="col-sm-6">
                    <div class="price-box">
                      <span class="price"><?= $product->price . ' грн.' ?></span>
                      <!--<span class="price-strike">$900.00</span>-->
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="favorite-button m-t-10">
                      <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                        <i class="fa fa-heart"></i>
                      </a>
<!--                      <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                        <i class="fa fa-retweet"></i>
                      </a>
                      <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                        <i class="fa fa-envelope"></i>
                      </a>-->
                    </div>
                  </div>

                </div><!-- /.row -->
              </div><!-- /.price-container -->

              <div class="quantity-container info-container">
                <div class="row">

                  <div class="col-sm-2">
                    <span class="label">Кількість :</span>
                  </div>

                  <div class="col-sm-2">
                    <div class="cart-quantity">
                      <div class="quant-input">
                        <div class="arrows">
                          <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                          <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                        </div>
                        <input id="view_quantity" type="text" value="<?= isset($_SESSION['cart'][$product->id]['quantity']) ? $_SESSION['cart'][$product->id]['quantity'] : 1 ?>">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-7">

                   <!-- <a href="#" class="btn btn-primary">
                        <i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART
                    </a>-->
                    <?= Html::a(Html::tag('i','',['class'=>'fa fa-shopping-cart inner-right-vs']). 'Купити',
                      ['site/addtocart', 'product_id' => $product->id],
                      ['class'=>'buy btn btn-primary', 'data-id'=>$product->id]);
                    ?>
<!--                      <button  href="<?/*=\yii\helpers\Url::to(['site/addtocart', 'product_id' => $product->id])*/?>"  data-id="<?/*=$product->id*/?>" class="buy btn btn-primary" type="button">Купити</button>
-->
                  </div>


                </div><!-- /.row -->
              </div><!-- /.quantity-container -->

              <div class="product-social-link m-t-20 text-right">
                <span class="social-label">Share :</span>
                <div class="social-icons">
                  <ul class="list-inline">
                    <li><a class="fa fa-facebook" href="http://facebook.com/transvelo"></a></li>
                    <li><a class="fa fa-twitter" href="#"></a></li>
                    <li><a class="fa fa-linkedin" href="#"></a></li>
                    <li><a class="fa fa-rss" href="#"></a></li>
                    <li><a class="fa fa-pinterest" href="#"></a></li>
                  </ul><!-- /.social-icons -->
                </div>
              </div>




            </div><!-- /.product-info -->
          </div><!-- /.col-sm-7 -->
        </div><!-- /.row -->



        <!-- ============================================== UPSELL PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">upsell products</h3>
          <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

              <?php foreach ($upsell as $upsel_item) { ?>

            <div class="item item-carousel">
              <div class="products">

                <div class="product">
                  <div class="product-image">
                    <div class="image">
                      <a href="detail.html"><img width="150px" src="<?=$upsel_item->image?>" data-echo="<?=$upsel_item->image?>" alt=""></a>
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
<?php } ?>

          </div><!-- /.home-owl-carousel -->
        </section><!-- /.section -->
        <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

      </div><!-- /.col -->
      <div class="clearfix"></div>
    </div><!-- /.row -->
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
</div><!-- /.body-content -->
