<?php

use yii\helpers\Html;
use kartik\tree\TreeView;
/* @var $this yii\web\View */
/* @var $searchModel backend\Models\KartikTreeMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kartik Tree Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kartik-tree-menu-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= TreeView::widget([
    // single query fetch to render the tree
    // use the Product model you have in the previous step
    'query' => \common\models\KartikTreeMenu::find()->addOrderBy('root, lft'),
    'headingOptions' => ['label' => 'Меню'],
    'fontAwesome' => true,     // font awesome icons instead of glyphicons
    'isAdmin' => true,         // optional (toggle to enable admin mode)
    'displayValue' => 1,        // initial display value
    'iconEditSettings' => [
      'show' => 'list',
      'listData' => [
        'folder' => 'Folder',
        'file' => 'File',
        'mobile' => 'Phone',
        'bell' => 'Bell',
      ],
    ],
    'softDelete' => false,       // Удаление пункта
    'cacheSettings' => [
      'enableCache' => true   // defaults to true
    ],
//        'nodeAddlViews' => [
//            \kartik\tree\Module::VIEW_PART_2 => '@backend/views/mainmenu/_form',
//        ]
  ]); ?>
</div>