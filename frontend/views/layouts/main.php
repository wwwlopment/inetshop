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
use frontend\assets\ModernAsset;
use common\widgets\Alert;



$upsell = Products::find()->limit(10)->all();
$hot = Products::find()->limit(5)->all();
ModernAsset::register($this);

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


    <!--//for-mobile-apps -->
    <!--Custom Theme files -->
    <!--//end-smooth-scrolling-->
  <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<?= Breadcrumbs::widget([
  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<?= Alert::widget() ?>
<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
