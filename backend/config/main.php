<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name'=>'InetShop',
    'basePath' => dirname(__DIR__),
    'homeUrl' => '/admin',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
      'elasticsearch' => [
        'class' => 'yii\elasticsearch\Connection',
        'nodes' => [
          ['http_address' => '127.0.0.1:9200'],
          // configure more hosts if you have a cluster
        ],
      ],
        'view' => [
          'theme' => [
            'pathMap' => [
              '@app/views' => '@app/views'
            ],
          ],
        ],
        'assetManager' => [
          'bundles' => [
            'backend\assets\AdminLteAsset' => [
              'skin' => 'skin-black',
            ],
          ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
          'baseUrl'=> '/admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [


            ],
        ],
    ],
    'params' => $params,
];
