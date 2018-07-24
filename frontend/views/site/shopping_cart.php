<?php

use common\models\OrderDescript;
use yii\helpers\Html;
/*if (isset($_SESSION['cart'])) {
  echo '<pre>';
  var_dump($_SESSION['cart']);
  echo '</pre>';
  echo count($_SESSION['cart']);
}*/
?>

<div class="body-content outer-top-xs">
  <div class="container">
    <div class="row inner-bottom-sm">
      <div class="shopping-cart">
        <div class="col-md-12 col-sm-12 shopping-cart-table ">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th class="cart-romove item">Remove</th>
                <th class="cart-description item">Image</th>
                <th class="cart-product-name item">Product Name</th>
               <!-- <th class="cart-edit item">Edit</th>-->
                <th class="cart-qty item">Quantity</th>
                <th class="cart-sub-total item">Subtotal</th>
                <th class="cart-total last-item">Grandtotal</th>
              </tr>
              </thead><!-- /thead -->
              <tfoot>
              <tr>
                <td colspan="7">
                  <div class="shopping-cart-btn">
							<span class="">
								<a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
							</span>
                  </div><!-- /.shopping-cart-btn -->
                </td>
              </tr>
              </tfoot>
              <tbody>
              <?php if (!empty($_SESSION['cart'])) {
              $grand_total = 0;
                  foreach ($_SESSION['cart'] as $id => $item) {
                if(isset($item['image'])) {
                $img_url = '../../frontend/web/uploads/'.$item['image'];
              } else {
                  $img_url = '';
                }
                  ?>
              <tr>
                <td class="romove-item"><a href="#" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                <td class="cart-image">
                  <a class="entry-thumbnail" href="#">
                    <img src="<?=$img_url?>" alt="">
                  </a>
                </td>
                <td class="cart-product-name-info">
                  <h4 class='cart-product-description'><a href="#"><?=$item['description']?></a></h4>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="rating rateit-small"></div>
                    </div>
                    <div class="col-sm-8">
                     <!-- <div class="reviews">
                        (06 Reviews)
                      </div>-->
                    </div>
                  </div><!-- /.row -->
               <!--   <div class="cart-product-info">
                    <span class="product-imel">IMEL:<span>084628312</span></span><br>
                    <span class="product-color">COLOR:<span>White</span></span>
                  </div>-->
                </td>
                <td class="cart-product-quantity">
                  <div class="quant-input">
                    <div class="arrows">
                      <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                      <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                    </div>
                    <input type="text" value="1">
                  </div>
                </td>
                <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?=$item['price']?> грн.</span></td>
                <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?=$grand_total+=$item['price']?> грн.</span></td>
              </tr>
<?php } ?>
<?php } ?>
              </tbody><!-- /tbody -->
            </table><!-- /table -->
          </div>
        </div><!-- /.shopping-cart-table -->				<div class="col-md-4 col-sm-12 estimate-ship-tax">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>
                <span class="estimate-title">Estimate shipping and tax</span>
                <p>Enter your destination to get shipping and tax.</p>
              </th>
            </tr>
            </thead><!-- /thead -->
            <tbody>
            <tr>
              <td>
                <div class="form-group">
                  <label class="info-title control-label">Country <span>*</span></label>
                  <select class="form-control unicase-form-control selectpicker">
                    <option>--Select options--</option>
                    <option>India</option>
                    <option>SriLanka</option>
                    <option>united kingdom</option>
                    <option>saudi arabia</option>
                    <option>united arab emirates</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="info-title control-label">State/Province <span>*</span></label>
                  <select class="form-control unicase-form-control selectpicker">
                    <option>--Select options--</option>
                    <option>TamilNadu</option>
                    <option>Kerala</option>
                    <option>Andhra Pradesh</option>
                    <option>Karnataka</option>
                    <option>Madhya Pradesh</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="info-title control-label">Zip/Postal Code</label>
                  <input type="text" class="form-control unicase-form-control text-input" placeholder="">
                </div>
                <div class="pull-right">
                  <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div><!-- /.estimate-ship-tax -->

        <div class="col-md-3 col-sm-12 estimate-ship-tax">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>
                <span class="estimate-title">Discount Code</span>
                <p>Enter your coupon code if you have one..</p>
              </th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>
                <div class="form-group">
                  <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                </div>
                <div class="clearfix pull-right">
                  <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                </div>
              </td>
            </tr>
            </tbody><!-- /tbody -->
          </table><!-- /table -->
        </div><!-- /.estimate-ship-tax -->

        <div class="col-md-5 col-sm-12 cart-shopping-total">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>
       <!--         <div class="cart-sub-total">
                  Subtotal<span class="inner-left-md">$600.00</span>
                </div>-->
                <div class="cart-grand-total">
                  Grand Total<span class="inner-left-md"><?=$grand_total?> грн.</span>
                </div>
              </th>
            </tr>
            </thead><!-- /thead -->
            <tbody>
            <tr>
              <td>
                <div class="cart-checkout-btn pull-right">
                  <button type="submit" class="btn btn-primary">PROCCED TO CHEKOUT</button>
                  <span class="">Checkout with multiples address!</span>
                </div>
              </td>
            </tr>
            </tbody><!-- /tbody -->
          </table><!-- /table -->
        </div><!-- /.cart-shopping-total -->			</div><!-- /.shopping-cart -->
    </div> <!-- /.row -->

</div>