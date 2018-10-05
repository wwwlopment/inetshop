<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchProducts */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">
<div class="container-fluid page-container">
    <div class="row">
    <div class="col-md-12 col-sm-12">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<?php
        // VIEW - views/product/index.php
        use kartik\tree\TreeView;
        use common\models\Tree;

        echo TreeView::widget([
        // single query fetch to render the tree
        // use the Product model you have in the previous step
        'query' => Tree::find()->addOrderBy('root, lft'),
        'headingOptions' => ['label' => 'Products'],
        'fontAwesome' => false,     // optional
        'isAdmin' => false,         // optional (toggle to enable admin mode)
        'displayValue' => 1,        // initial display value
        'softDelete' => true,       // defaults to true
        'cacheSettings' => [
        'enableCache' => true   // defaults to true
        ]
        ]);
        ?>
    </div>
</div>
</div>
</div>
