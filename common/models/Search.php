<?php

namespace common\models;

use common\models\Elastic;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\elasticsearch\ActiveDataProvider;

use yii\elasticsearch\Connection;
use yii\elasticsearch\Query;

use yii\elasticsearch\QueryBuilder;

/**

 * ArticlesSearch represents the model behind the search form about `app\models\Articles`.

 */

class Search extends ElasticProducts

{



  public function Searches($value)

  {
    $searchs      = $value['search'];
    //$client = new Client();
    $hosts = ['127.0.0.1:9200'];              // Replace with your host
$client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                    ->setHosts($hosts)      // Set the hosts
                    ->build();              // Build the client object
$params['index'] = 'inetshop';
$params['type'] = 'products';
$params['body']['query']['match']['title'] = $searchs;

return $client->search($params);

//var_dump($result);die();
//$result = Products::find()->where(['description'=>'%'.$searchs.'%'])->all();
/*$result = ElasticProducts::find()->andFilterWhere(['like', 'title', $searchs])->all();
    var_dump($result);die();
    $query = new Query();
       $match   = [
      "fuzzy_like_this" => [
       // "fields" => ["title", "description"],
       // "like_text" => $searchs,
        "like_text" => $searchs,
       // "max_query_terms" => 12
      ],
         ];*/
    //$queryParts = ["fuzzy_like_this" => ["fields" => ["title"], "like_text" => $searchs, "max_query_terms" => 4]];

/*    $query->from(ElasticProducts::index(), ElasticProducts::type())->limit(10);
$query->query = $match;*/
  //$result = $query->search($this->getConnection());
   // $this->assertEquals(3, $result['hits']['total']);

    //$query->query = $match;
   // $query->query(['title'=>$searchs]);
   // $query->source('*');
 //$query->where(['fuzzy_like_this'=>$searchs]);


//build and execute the query
/*    $command = $query->createCommand();
    $rows = $command->search(); // this way you get the raw output of elasticsearch.

   print_r($rows);die();*/

/*    $params   = [
      "fuzzy_like_this" => [
       // "fields" => ["title", "description"],
       // "like_text" => $searchs,
        "like_text" => $searchs,
       // "max_query_terms" => 12
      ],
 //'match_all'=> $searchs,
    ];



$model = ElasticProducts::find()->query($params)->all();
var_dump($model);die();*/


/*    $query        = new Query();

     $db           = ElasticProducts::getDb();
   // var_dump($db);die();
    $queryBuilder = new QueryBuilder($db);

    $match   = [
      "fuzzy_like_this" => [
       // "fields" => ["title", "description"],
       // "like_text" => $searchs,
        "like_text" => $searchs,
       // "max_query_terms" => 12
      ],
 //'match_all'=> $searchs,
    ];

    $query->query = $match;

    $build        = $queryBuilder->build($query);
   // var_dump($build);die();

    $re           = $query->search($db, $build);

    var_dump($re);die();

 // Connection->$autodetectCluster = false;

   // public $autodetectCluster = true;

//    $query->all();
//$query = $query->search();*/
/*
    $dataProvider = new ActiveDataProvider([

      'query'      => $query,

      'pagination' => ['pageSize' => 10],
/*      'sort' => [
          'defaultOrder' => [
              'created_at' => SORT_DESC,
              'title' => SORT_ASC,
          ]
      ],*/
    /*]);*/


 /*   $client = new \GuzzleHttp\Client();
    $result = $client->get('http://localhost:9200/inetshop/products/_search');
    echo $result->getBody()->getContents();*/

/*
    return $dataProvider;*/

  }

/*
  public function Search($value) {


       $searchs      = $value['search'];

    $query        = new Query();


    $params = [
      'match' => [
        'title' => $searchs,
      ]
    ];
    $model = ElasticProducts::find()->query($params)->all();

    //var_dump($model);die();
    $dataProvider = $model;
return $dataProvider;

  }*/

/*  public static function autocomplete($phrase, $type = 'common')
  {
    $phrase      = $phrase['search'];
    $query = new Query();
    $query->fields(self::getFields())
      ->query([
        "match" => [
          'name' => $phrase
        ]
      ])
      ->from('catalog', self::$_type)
      ->limit(10)
      ->all();
    $command = $query->createCommand();
    $result = $command->search();
$result =  Json::encode(self::converSearchResultToArray($result));
    return $result;
  }*/


/*public function search($params)
    {

      $searchs      = $params['search'];
        $elasticQuery = new Query();

        $dataProvider = new ArrayDataProvider();
      $params = [
        'match' => [
          'title' => $searchs,
        ]
      ];
        $this->setAttributes($params, false);
        $attributes = array_filter($this->attributes);



        if (!empty($attributes)) {

            $fields = ['title', 'description'];

            if (preg_match('/(?>^\d{5})/', $attributes['title'])) {
                $fields = ['deviceSerial'];
            }

            if (preg_match('/(?>^\d{2}\d?\d?$)/u', $attributes['title'])) {
                $fields = ['number^2', 'deviceSerial'];
            }

            $charArr = ArrayHelper::getColumn(Products::find()->all(), 'char');
            $char = implode('', $charArr);

            if (preg_match('/(?>^\d{2}\d?\d?[' . $char . ']$)/ui', $attributes['title'])) {
                $fields = ['number'];
            }

            $queryModel['multi_match'] = [
                'query' => $attributes['title'],
                'fields' => $fields
            ];

            $models = $elasticQuery->from('inetshop', 'products')->query(
                $queryModel
            )->all();

            $dataProvider->setModels($models);
        }

        return $dataProvider;
    }*/
}