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

$this->title = 'Про нас';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="<?=\yii\helpers\Url::to(['/'])?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Про нас</li>
        </ol>
    </div>
</div>
<!--//breadcrumbs-->
<!--contact-->
<div class="contact">
    <div class="container">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title">Як нас<span> знайти </span></h3>
            <p> <a href="https://goo.gl/maps/QakkKNVaDon"> наприклад за цим посиланням </a> </p>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2452.662530801811!2d25.327409854255315!3d50.7471848524825!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472599ef6e1bd541%3A0x2ea2f2660661535a!2z0KTRltC70ZbRjyDihJYxINC00LjRgtGP0YfQvtGXINC_0L7Qu9GW0LrQu9GW0L3RltC60Lg!5e0!3m2!1suk!2sua!4v1538682213154" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
</div>

