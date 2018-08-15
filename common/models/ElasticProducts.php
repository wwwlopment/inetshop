<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\elasticsearch\ActiveRecord;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property int $category_id
 * @property int $price
 * @property string $vendor
 * @property string $description
 * @property string $image
 * @property int $available
 * @property string $updated_at
 * @property string $created_at
 */
//class Products extends \yii\db\ActiveRecord
class ElasticProducts extends ActiveRecord
{


  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      /**
      Правила. Важно указать. Иначе, данные не сохранятся.
      Я, поставил всем атрибутам правила как безопасные.
      В можете указать любые другие, которые вам необходимы.
       */
      [$this->attributes(), 'safe'],
    ];
  }




  /**
   * {@inheritdoc}
   */
  public function attributes()
  {
    /**
    Атрибуты. Важно указать. Иначе, данные не сохранятся.
     */
    return [
      'id',
      'title',
      'category_id',
      'price',
      'vendor',
      'description',
      'image',
      'available',
      'updated_at',
      'created_at',
    ];
  }




  /**
   * @return array This model's mapping
   */
  public static function mapping()
  {
    return [
      static::type() => [
        'properties' => [
          'id'           => ['type' => 'long'],
          'title'           => ['type' => 'string'],
          'description'    => ['type' => 'string'],
          'vendor' => ['type' => 'string'],
          'price'     => ['type' => 'long'],
          'category_id'     => ['type' => 'long'],
          'image'     => ['type' => 'string'],
          'available'     => ['type' => 'long'],
          //       'updated_at'     => ['type' => 'string'],
          //       'created_at'     => ['type' => 'string'],
        ]
      ],
    ];
  }


  /**
   * Set (update) mappings for this model
   */
  public static function updateMapping()
  {
    $db = static::getDb();
    $command = $db->createCommand();
    $command->setMapping(static::index(), static::type(), static::mapping());
  }

  /**
   * Delete this model's index
   */
  public static function deleteIndex()
  {
    $db = static::getDb();
    $command = $db->createCommand();
    $command->deleteIndex(static::index(), static::type());
  }


  /**
   * Create this model's index
   */

  public static function createIndex()
  {
    $db = static::getDb();
    $command = $db->createCommand();
    $command->createIndex(static::index(), [
      'settings' => [ 'index' => ['refresh_interval' => '1s'] ],
      'mappings' => static::mapping(),
      //'warmers' => [ /* ... */ ],
      //'aliases' => [ /* ... */ ],
      //'creation_date' => '...'
    ]);
  }

  public static function index()
  {
    return 'inetshop';
  }

  public static function type()
  {
    return 'products';
  }

  public static function updateRecord($products_id, $columns){
    try{
      $record = self::get($products_id);
      foreach($columns as $key => $value){
        $record->$key = $value;
      }

      return $record->update();
    }
    catch(\Exception $e){
      //handle error here
      return false;
    }
  }

  public static function deleteRecord($products_id)
  {
    try{
      $record = self::get($products_id);
      $record->delete();
      return 1;
    }
    catch(\Exception $e){
      //handle error here
      return false;
    }
  }

  public static function addRecord(Products $products){
    $isExist = false;

    try{
      $record = self::get($products->id);
      if(!$record){
        $record = new self();
        $record->setPrimaryKey($products->id);
      }
      else{
        $isExist = true;
      }
    }
    catch(\Exception $e){
      $record = new self();
      $record->setPrimaryKey($products->id);
    }

    $suppliers = [
      ['id' => '1', 'name' => 'ABC'],
      ['id' => '2', 'name' => 'XYZ'],
    ];

    $record->id   = $products->id;
    $record->title = $products->title;
    $record->vendor = $products->vendor;
    $record->available = $products->available;
    $record->image = $products->image;
    $record->price = $products->price;
    $record->status = 1;
    $record->suppliers = $suppliers;

    try{
      if(!$isExist){
        $result = $record->insert();
      }
      else{
        $result = $record->update();
      }
    }
    catch(\Exception $e){
      $result = false;
      //handle error here
    }

    return $result;
  }
}