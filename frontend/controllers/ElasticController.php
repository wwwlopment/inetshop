<?php


namespace frontend\controllers;


use common\models\Products;
use common\models\Search;
use common\models\Elastic;
use Yii;
use yii\web\Controller;

class ElasticController extends Controller
{

/*  public function actionElasticadd()
  {

    $elastic        = new elastic();
    $elastic->name  = 'ahmed';
    $elastic->email = 'ahmedkhan_847@hotmail.com';
    if ($elastic->insert()) {
      echo "Added Successfully";
    } else {
      echo "Error";
    }

  }*/

  public function actionElasticupd()
  {

    Products::createIndex();
/*$products = Products::find()->all();
    foreach ($products as $product) {
      $elastic = new elastic();
      $elastic->title = $product->title;
      $elastic->description = $product->description;
      $elastic->vendor = $product->vendor;
      $elastic->price = $product->price;
      $elastic->category_id = $product->category_id;
      if ($elastic->insert()) {
        echo "Added Successfully";
      } else {
        echo "Error";
      }

    }*/
  }

  public function actionIndex()
  {

    return $this->render('index');

  }

  public function actionSearch()
  {

    $elastic = new Search();
    $result  = $elastic->Searches(Yii::$app->request->queryParams);
    $query = Yii::$app->request->queryParams;
    //print_r($query['search']);die();
    return $this->render('search', [
      'searchModel'  => $elastic,
      'dataProvider' => $result,
      'query'        => $query['search'],
    ]);

  }


}