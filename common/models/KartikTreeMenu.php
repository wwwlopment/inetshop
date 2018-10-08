<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "kartik_tree_menu".
 *
 * @property string $id
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $lvl
 * @property string $name
 * @property string $url
 * @property string $icon
 * @property integer $icon_type
 * @property integer $active
 * @property integer $selected
 * @property integer $disabled
 * @property integer $readonly
 * @property integer $visible
 * @property integer $collapsed
 * @property integer $movable_u
 * @property integer $movable_d
 * @property integer $movable_l
 * @property integer $movable_r
 * @property integer $removable
 * @property integer $removable_all
 */
class KartikTreeMenu extends \kartik\tree\models\Tree
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'tree';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['lft', 'rgt', 'lvl', 'url', 'icon_type', 'active', 'selected',
        'disabled', 'readonly', 'visible', 'collapsed', 'movable_u',
        'movable_d', 'movable_l', 'movable_r', 'removable', 'removable_all'], 'integer'],
      [['name'], 'required'],
      [['name'], 'string', 'max' => 60],
      //[['url'], 'string', 'max' => 100],
      [['icon'], 'string', 'max' => 255],
      [['root', 'id', 'lft', 'rgt', 'lvl'], 'safe']

    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'root' => 'Root',
      'lft' => 'Lft',
      'rgt' => 'Rgt',
      'lvl' => 'Lvl',
      'name' => 'Name',
      'url' => 'Url',
      'icon' => 'Icon',
      'icon_type' => 'Icon Type',
      'active' => 'Активный',
      'selected' => 'Selected',
      'disabled' => 'Disabled',
      'readonly' => 'Readonly',
      'visible' => 'Visible',
      'collapsed' => 'Collapsed',
      'movable_u' => 'Movable U',
      'movable_d' => 'Movable D',
      'movable_l' => 'Movable L',
      'movable_r' => 'Movable R',
      'removable' => 'Removable',
      'removable_all' => 'Removable All',
    ];
  }

  public function getAssocList()
  {
    $models = $this->findAll(array('order'=>'name ASC'));
    return Html::activeDropDownList($models, 'id', 'name');
  }
}