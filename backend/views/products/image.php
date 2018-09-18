<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

  <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <?/*= $form->field($model, 'image')->widget(FileInput::classname(), [
    'attribute' => 'image',
    'options' => [
      'multiple' => false,
      'accept' => 'image/*',
      //'id'=>'unique-id-1',
    ],
    'pluginOptions' => [
      'showCaption' => true,
      'showRemove' => true,
      'showUpload' => true,
      'browseClass' => 'btn btn-primary btn-block',
      'allowedFileExtensions' => ['jpg','gif','png'],
      'overwriteInitial' => false,
      'resizeImages' => true,
    //  'maxFileCount'=>10,
    ],

  ]); */?>

    <?= $form->field($model, 'image')->widget(\kartik\file\FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
  ]);?>

  <div class="form-group">
  </div>

  <?php ActiveForm::end(); ?>

</div>
