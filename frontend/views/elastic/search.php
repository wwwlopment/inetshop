<?php
use yii\helpers\BaseStringHelper;
$this->title = 'Search';
?>
<div class="container-fluid">
  <h1>Search Result for <?php echo "<span class='label label-success'>" . $query . "</span>" ?></h1>
  <?php
//  $result = $dataProvider->getModels();
  $result = $dataProvider['hits']['hits'];
echo var_dump($result);die();
  foreach ($result as $key) {

    echo "<div class='row'>";

    echo "<div class='panel panel-default'>";

    foreach ($key['_source'] as $key => $value) {
//echo var_dump($key);die();





      if ($key == "title") {
        echo "<div class='panel-heading'><strong>" . $value['0'] . "</strong></div>";
      }
      if ($key == "description") {
        echo "<div class='panel-body'>" . BaseStringHelper::truncateWords($value['0'], 50, '...', true) . "<br>";
      }
      if ($key == "image") {
        echo '<img width="150px" src="' . $value['0'] . '"></div>';
      }

      if ($key == "id") {

       echo '<span class="label label-success" href="'.\yii\helpers\Url::to(['site/view', 'product_id' => $value['0']]).'">Купити</span>';

      //  echo '<span class="label label-success">' . $value['0'] . '</span></div>';
      }



    }
    echo "</div>";
    echo "</div>";

  }?>

</div>