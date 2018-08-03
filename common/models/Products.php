<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
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
class Products extends \yii\db\ActiveRecord
{

/*  public function behaviors()
  {
    return [
      TimestampBehavior::className(),
    ];
  }*/

/*  public function behaviors()
  {
    return [
      // Other behaviors
      [
        'class' => TimestampBehavior::className(),
        'created_at' => 'time_created',
        'updated_at' => false,
        'value' => new Expression('NOW()'),
      ],
    ];
  }*/
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['category_id', 'price', 'available'], 'integer'],
            [['description'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['vendor', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'category_id' => 'Category ID',
            'price' => 'Price',
            'vendor' => 'Vendor',
            'description' => 'Description',
            'image' => 'Image',
            'available' => 'Available',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

  public function saveImage($filename) {
    $this->image = '../../frontend/web/uploads/'.$filename;
    return $this->save(false);
  }
}
