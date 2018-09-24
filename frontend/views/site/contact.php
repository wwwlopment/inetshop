<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */
?>
    <?php header('X-Frame-Options: ALLOW-FROM https://google.com.ua/'); ?>
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="<?=\yii\helpers\Url::to(['/'])?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Contact Us</li>
        </ol>
    </div>
</div>
<!--//breadcrumbs-->
<!--contact-->
<div class="contact">
    <div class="container">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title">Як нас<span> знайти </span></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>
        </div>

        <iframe class="wow zoomIn animated animated" data-wow-delay=".5s"  width="600" height="450" frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJQdUbbu-ZJUcRNnapTvdbzLQ&key=..." allowfullscreen></iframe>
<!--        <iframe class="wow zoomIn animated animated" data-wow-delay=".5s" src="https://goo.gl/maps/uywJgkm89sC2" allowfullscreen=""></iframe>-->
    </div>
</div>
<div class="address"><!--address-->
    <div class="container">
        <div class="address-row">
            <div class="col-md-6 address-left wow fadeInLeft animated" data-wow-delay=".5s">
                <div class="address-grid">
                    <h4 class="wow fadeIndown animated" data-wow-delay=".5s">DROP US A LINE </h4>
                    <form>
                        <input class="wow fadeIndown animated" data-wow-delay=".6s" type="text" placeholder="Name" required="">
                        <input class="wow fadeIndown animated" data-wow-delay=".7s" type="text" placeholder="Email" required="">
                        <input class="wow fadeIndown animated" data-wow-delay=".8s" type="text" placeholder="Subject" required="">
                        <textarea class="wow fadeIndown animated" data-wow-delay=".8s" placeholder="Message" required=""></textarea>
                        <input class="wow fadeIndown animated" data-wow-delay=".9s" type="submit" value="SEND">
                    </form>
                </div>
            </div>
            <div class="col-md-6 address-right">
                <div class="address-info wow fadeInRight animated" data-wow-delay=".5s">
                    <h4>ADDRESS</h4>
                    <p>123 San Sebastian, CG 09-123 Ba,Block(#456),Hill Towers 4567 New York City USA.</p>
                </div>
                <div class="address-info address-mdl wow fadeInRight animated" data-wow-delay=".7s">
                    <h4>PHONE </h4>
                    <p>+222 111 333 4444</p>
                    <p>+222 111 333 5555</p>
                </div>
                <div class="address-info wow fadeInRight animated" data-wow-delay=".6s">
                    <h4>MAIL</h4>
                    <p><a href="mailto:example@mail.com"> mail@example.com</a></p>
                    <p><a href="mailto:example@mail.com"> mail2@example.com</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

