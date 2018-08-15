<?php


namespace frontend\controllers;


use common\models\Products;
use common\models\Search;
use common\models\Elastic;
use Yii;
use yii\web\Controller;

class ElasticController extends Controller
{



  public function actionIndex()
  {

    return $this->render('index');

  }

  public function actionSearch()
  {
    $elastic = new Search();
    //  $result  = $elastic->Searches(Yii::$app->request->queryParams);
      $result  = $elastic->Searches(Yii::$app->request->queryParams);
    $query = Yii::$app->request->queryParams;
    return $this->render('search', [
      'searchModel'  => $elastic,
      'dataProvider' => $result,
      'query'        => $query['search'],
    ]);

  }



}