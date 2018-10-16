<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
  'modules' => [
    'treemanager' =>  [
      'class' => '\kartik\tree\Module',
      // other module settings, refer detailed documentation
    ],
  ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
   /*     'search' => [
          'class' => 'himiklab\yii2\search\Search',
          'models' => [
            'common\models\Products',
          ],
        ],*/
        'authManager'  => [
          'class'        => 'yii\rbac\DbManager',
        ],
    ],
];
