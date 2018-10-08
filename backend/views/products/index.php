<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\KartikTreeMenu;

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
    <?php
    //$n = KartikTreeMenu::findOne(['id', '1']);
    // echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],
          ['class' => 'yii\grid\ActionColumn'],
          ['label'=>'Image','content' => function ($model) { return '<img width = "50px" src="'.$model->image.'">';}],
          [
            'attribute' => 'tree',
            'label' => 'Назва категорії',
            'value' => 'category.name',
          ],
          'category_id',

            'title',
          //$n->name,

            'price',
            'vendor',
          //  'description',
          //  'image',

          'available',
          'id',
        //    'updated_at',
       //     'created_at',


        ],
    ]); ?>
    </div>
</div>
</div>
</div>
