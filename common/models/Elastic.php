<?php


namespace common\models;

use yii\elasticsearch\ActiveRecord;
use yii\elasticsearch\Query;


class Elastic extends ActiveRecord {

  //protected $client;


    public static function index(){
        return "elasticsearch";
    }

   public static function type(){
        return "product";
    }

    public static function mapping() {

      return [
            static::type() => [

                'properties' => [
                    'id'             => ['type' => 'long'],
                    'title'           => ['type' => 'string'],
                    'price'    => ['type' => 'float'],
                    'vendor' => ['type' => 'string'],
                    'created_at'     => ['type' => 'long'],
                    'updated_at'     => ['type' => 'long'],
                    'available'         => ['type' => 'boolean'],
                    'description'         => ['type' => 'long'],
                    'image'         => ['type' => 'string'],
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

/**
     * Delete this model's index
     */
    public static function deleteIndex()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->deleteIndex(static::index(), static::type());
    }

    public static function updateRecord($product_id, $columns){
       try{
            $record = self::get($product_id);
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



    public static function deleteRecord($product_id)
    {
        try{
            $record = self::get($product_id);
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


        $record->id   = $products->id;
        $record->title = $products->title;
        $record->category_id = $products->category_id;
        $record->price = $products->price;
        $record->vendor = $products->vendor;
        $record->description = $products->description;
        $record->image = $products->image;
        $record->available = $products->available;

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