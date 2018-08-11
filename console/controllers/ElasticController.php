<?php
//namespace @yii\console\controllers\;
namespace console\controllers;

use common\models\Products;
//use Yii;
use yii\console\Controller;
//use yii\elasticsearch\ActiveRecord;
//use yii\elasticsearch\Query;
//use yii\helpers\FileHelper;
//use yii\helpers\Json;


ini_set('memory_limit', '8048M');
ini_set('max_execution_time', 18000);


class ElasticController extends Controller
{

  /*public $cols = 'id,item_id,shop_category,title,description,url,seo_url,seo_url_old,old_price,click_count,is_top,
                other_data,vendor,provider,images,image,model,is_moved,price,category_id,
                delivery, delivery_price, sales_notes, type_prefix,
                discount, seo_padeg, seo_h1, is_parse, is_double, available, ponrav
                ';
  public $cols_vendor = ['id', 'title', 'first_letter', 'description',
    'counts', 'root_id', 'image', 'seo_h1', 'seo_title', 'seo_description', 'seo_url'];



  public function init()
  {
    $this->cols = $this->cols.$this->getAttributesBase(1);

    parent::init(); // TODO: Change the autogenerated stub
  }

  public function getAttributesBase($type=1)
  {
    $items = Filters::find()->select('name')->where(['is not', 'name', null])->column();
    if($type==1) {
      if($items){
        return ','.implode(",",$items);
      }
    }
    if($type==2){
      if($items) {
        return $items;
      }
    }

    return false;
  }

  public function actionAll()
  {

    $this->actionPushVendors();
    $this->actionPushFilterColumn();
    $this->actionPushBots();
//        $this->actionPushFilterColumnOld();
  }

  public function actionUpdate($provider=false, $hour=1)
  {

    if($provider)
      $count_items = ShopItems::find()->where('updated_at >= date_sub(now(), INTERVAL '.$hour.' HOUR)')->andWhere(['>', 'price', 0])->andWhere(['provider'=>$provider])->count();
    else
      $count_items = ShopItems::find()->where('updated_at >= date_sub(now(), INTERVAL '.$hour.' HOUR)')->andWhere(['>', 'price', 0])->count();

    echo $count_items."\n";
    $count_block = ceil($count_items / 1000);
    echo $count_block."\n";

    sleep(2);

    for ($i = 1; $i <= $count_block; $i++) {
      $offset = 1000 * ($i-1);

      if($provider){
        $items = ShopItems::find()->select($this->cols)->where('updated_at >= date_sub(now(), INTERVAL '.$hour.' HOUR)')->andWhere(['>', 'price', 0])->andWhere(['provider'=>$provider])->limit(1000)->offset($offset)->all();
      }else{
        $items = ShopItems::find()->select($this->cols)->where('updated_at >= date_sub(now(), INTERVAL '.$hour.' HOUR)')->andWhere(['>', 'price', 0])->limit(1000)->offset($offset)->all();
      }

      echo $offset."\n";

      foreach ($items as $item) {
        if(isset($item->category->title)) {
          $item->catname = $item->category->title;
        }else
          $item->catname = '';

        unset($item->category_id);
        ElaFilterSearch::addRecord($item);
      }
      unset($items);
    }

  }

  public function actionPushFilter($provider=false)
  {

    if($provider){
      $items = ShopItems::find()->where(['provider'=>$provider])->andWhere(['>', 'price', 0])->count();
    }else{
      $items = ShopItems::find()->andWhere(['>', 'price', 0])->count();
    }
    echo $items."\n";
    $count_block = ceil($items / 1000);
    echo $count_block."\n";

    sleep(2);

    for ($i = 1; $i <= $count_block; $i++) {
      $offset = 1000 * ($i-1);

      if($provider){
        $items = ShopItems::find()->select($this->cols)->where(['provider'=>$provider])->andWhere(['>', 'price', 0])->limit(1000)->offset($offset)->all();
      }else{
        $items = ShopItems::find()->select($this->cols)->andWhere(['>', 'price', 0])->limit(1000)->offset($offset)->all();
      }

      echo $offset."\n";
      foreach ($items as $item) {
        if(isset($item->category->title)) {
          $item->catname = $item->category->title;
        }else
          $item->catname = '';

        unset($item->category_id);
        ElaFilterSearch::addRecord($item);
      }
      unset($items);
    }

  }

  public function actionUpdateColumn($column)
  {
    $items = ShopItems::find()->where(['is not', $column, null])->andWhere(['!=', $column, ''])->count();

    echo $items."\n";
    $count_block = ceil($items / 5000);
    echo $count_block."\n";

    sleep(1);

    for ($i = 1; $i <= $count_block; $i++) {
      $offset = 5000 * ($i - 1);
      $items = ShopItems::find()->where(['is not', $column, null])->andWhere(['!=', $column, ''])->limit(5000)->offset($offset)->asArray()->all();

      echo $offset."\n"; $upcolumn=[];
      foreach ($items as $item) {
        $upcolumn[$column] = $item[$column];
        ElaFilterSearch::updateRecord($item['id'], $upcolumn);
      }
      unset($items);
    }
  }

  public function actionPushItem($id)
  {
    $items = ShopItems::find()->where(['id'=>$id])->all();
    foreach ($items as $item) {
      if(isset($item->category->title)) {
        $item->catname = $item->category->title;
      }else
        $item->catname = '';

      unset($item->category_id);
      var_dump(ElaFilterSearch::addRecord($item));

    }

  }

  public function actionUpdateCats($catids=false)
  {
    if($catids=='all') {
      $cats = ShopCategory::find()->select('id')->where(['lvl' => 0])->column();
      foreach ($cats as $cat) {
        if ($cat) {
          $this->actionBigPush($cat);
        }
      }
    }else{
      $this->actionBigPush($catids);
    }

  }*/

  public function actionBig(){

   // $this->actionAll();

    $output = shell_exec("curl -XPUT \"http://localhost:9200/".Products::index()."\" -d '{ \"settings\": { \"number_of_shards\":1, \"number_of_replicas\":0 } }'");
    echo $output."\n";

    Products::deleteIndex();
    Products::createIndex();
    Products::updateMapping();
    $output = shell_exec('curl -XPUT "http://localhost:9200/'.Products::index().'/_settings" -d \'{ "index" : { "max_result_window" : 5000000 } }\'');
    echo $output."\n";

    sleep(2);
   // $this->actionUpdateCats('all');
    //sleep(2);
 //   $this->actionDelDoc();

    echo "FINISH ELASTICSEARCH\n";

  }

  public function actionDelDoc()
  {
    $output = shell_exec("curl -XPOST 'http://localhost:9200/_forcemerge?only_expunge_deletes=true'");
    echo $output."\n";
  }

  }

