<?php

namespace frontend\controllers;

use common\models\Categories;
use common\models\ElasticProducts;
use common\models\Products;
use DOMDocument;
use DOMXPath;
use yii\httpclient\XmlParser;
use yii\web\Controller;

class XmlController extends Controller {
  const PAGE_SIZE = 10;

  /**
   * @var string specifies the default action to be 'list'.
   */
  public $defaultAction = 'list';



 public function actionView() {
   var_dump(Categories::find()->count());
/*      $xml = simplexml_load_file('../../frontend/web/uploads/vygr.xml');
    if (!$xml) {
      echo(libxml_get_errors());
      return;
    }
    foreach ($xml->shop->offers->offer as $value) {
      var_dump($value);
    }*/

 }
  public function actionImport() {
    /*'title' => 'Title',
            'category_id' => 'Category ID',
            'price' => 'Price',
            'vendor' => 'Vendor',
            'description' => 'Description',
            'image' => 'Image',
            'available' => 'Available',*/
      libxml_use_internal_errors(true);
    $result='';
      $xml = simplexml_load_file('../../frontend/web/uploads/google_merchant_center.xml');
     // $x = new \SimpleXMLElement($xml);
    //  $xml = simplexml_load_file('../../frontend/web/uploads/odyag.xml');
    if (!$xml) {
      echo(libxml_get_errors());
      return;
    }
/*
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);*/

    if (!Categories::find()->where(['title'=> 'Різне'])->one()) {
    $category = new Categories();
    $category->title = 'Різне';
    $category->logo_class = '';
 //   $category->created_at = time();
    $category->save(false);
    $last_id = Categories::find()->count();
      } else {
      $last_id = Categories::find()->count()+1;
  //    echo 'Категорія зайнята';
   //    return;
    }

    //  var_dump($xpath->evaluate('//item'));
     // die();
 /*var_dump((string)$xml->channel->item);
      die();*/

    //  die();
    //var_dump($this->xml2array($xml)['channel']['item']); die();
    foreach ($xml->channel->item as $key => $value) {
     // var_dump(array_keys(json_decode(json_encode($value->children()), true)));
      //echo($value->children()->image_link);
      //die();



$product = new Products();
$product->title = $value->children()->title;
$product->category_id = $last_id;
$product->price = $value->children()->price;
$product->vendor = $value->vendorCode;
$product->description = $value->children()->description;
$product->image = $value->children()->image_link;
$product->available = 1;
//$product->created_at = time();/**/
//
//odyag
/*$description = '';
$product = new Products();
$product->title = $value->model;
$product->category_id = $last_id;
$product->price = $value->price;
$product->vendor = $value->vendor;
foreach ($value->param as $param) {
  $description .= $param . ' ';
      }
$product->description = $description . ' '. $value->description;
$product->image = $value->picture[0];
$product->available = $value->available;*/
//$product->created_at = time();

$product->save(false);



    }
/*
    'title' => 'Title',
            'logo_class' => 'Logo_class',*/





  }

  /**
   * Converting a SimpleXML Object to an Array
   */


public function xml2array($text) {
               $reg_exp = '/<(.*?)>(.*?)/';
               preg_match_all($reg_exp, $text, $match);

               foreach ($match[1] as $key=>$val) {
                   if ( preg_match($reg_exp, $match[2][$key]) ) {
                       $array[$val][] = $this->xml2array($match[2][$key]);
                   } else {
                       $array[$val] = $match[2][$key];
                   }
               }
               return $array;
            }




}
