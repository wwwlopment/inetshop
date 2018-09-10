<?php

use frontend\modules\search\SearchAssets;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$query = yii\helpers\Html::encode($query);

$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['/site']];
$this->title = "Результаты поиска по запросу \"$query\"";
$this->params['breadcrumbs'][] = $this->title;

SearchAssets::register($this);
$this->registerJs("jQuery('.search').highlight('{$query}');");
?>

<div class="row">
  <div class="col-md-6 col-md-offset-2">

    <?php
    if (!empty($hits)):
      foreach ($hits as $hit):
        ?>
        <h3><a href="<?//= yii\helpers\Url::to($hit->url, true) ?>"><?= $hit->title ?></a></h3>
        <p class="search"><?//= $hit->body ?></p>
        <hr />
      <?php
      endforeach;
    else:
      ?>
      <div class="alert alert-danger"><h3>По запиту "<?= $query ?>" нічого не знайдено!</h3></div>
    <?php
    endif;

    echo LinkPager::widget([
      'pagination' => $pagination,
    ]);
    ?>


  </div>
  <div class="col-md-3">

   <!-- <?/*//= $this->render('_search_form', ['text' => "{$query}"]) */?>-->

  <!--  <?/*= app\components\SectionsWidget::widget() */?>
    <hr>
    --><?/*= app\components\TagsWidget::widget() */?>
  </div>
</div>