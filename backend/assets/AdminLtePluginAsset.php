<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminLtePluginAsset extends AssetBundle
{
  public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components';
  public $js = [
    'datatables.net-bs/js/dataTables.bootstrap.min.js',
    // more plugin Js here
  ];
  public $css = [
    'datatables.net-bs/css/dataTables.bootstrap.css',
    // more plugin CSS here
  ];
  public $depends = [
    'dmstr\web\AdminLteAsset',
  ];
}
