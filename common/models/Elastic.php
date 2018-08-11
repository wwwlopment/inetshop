<?php


namespace common\models;

use Yii;

class Elastic extends \yii\elasticsearch\ActiveRecord
{

  /**
     * @return array This model's mapping
     */
    public static function mapping()
    {
        return [
            static::type() => [
                'properties' => [
                    'title'           => ['type' => 'string'],
                    'description'    => ['type' => 'string'],
                    'vendor' => ['type' => 'string'],
                    'price'     => ['type' => 'long'],
                    'category_id'     => ['type' => 'long'],
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
            'settings' => [  'index' => ['refresh_interval' => '1s'],/* ... */ ],
            'mappings' => static::mapping(),
            //'warmers' => [ /* ... */ ],
            //'aliases' => [ /* ... */ ],
            //'creation_date' => '...'
        ]);
    }


/*
  public function behaviors()
  {
    return array(
      'searchable' => array(
        'class' => 'YiiElasticSearch\SearchableBehavior',
      ),
    );
  }*/

  public function attributes()
  {

    return['title', 'description', 'vendor', 'price', 'category_id'];

  }
  public function getElasticIndex()
    {
        return 'myindex';
    }

  public function getElasticType()
  {
    return 'mymodel';
  }

}