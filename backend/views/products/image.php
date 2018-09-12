<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'image')->widget(\kartik\file\FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
  ]);?>

  <div class="form-group">
  </div>

  <?php ActiveForm::end(); ?>

</div>
