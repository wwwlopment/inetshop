<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'elasticsearch' => [
              'class' => 'yii\elasticsearch\Connection',
              'nodes' => [
                  ['http_address' => '127.0.0.1:9200'],
                  // configure more hosts if you have a cluster
              ],
        ],
        'authManager'  => [
          'class'        => 'yii\rbac\DbManager',
        ],
    ],
];
