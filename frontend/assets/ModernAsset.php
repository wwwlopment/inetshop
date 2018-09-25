<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ModernAsset extends AssetBundle
{



  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $css = [
    'css/bootstrap.css',
    'css/style.css',
    'css/animate.min.css',
  ];
  public $js = [
    'js/jquery-1.11.1.min.js',
    'js/jquery.countdown.min.js',
    'js/jquery.matchHeight.js',
    'js/modernizr.custom.js',
    'js/simpleCart.min.js',
    'js/wow.min.js',
    'js/my_new.js',
    'js/move-top.js',
    'js/easing.js',
    'js/my_new2.js',
    'js/main.js',
    'js/my_new3.js',
    'js/bootstrap.js',
    'js/imagezoom.js',
    'js/move-top.js',
    'js/jquery.flexslider.js',

  ];
  public $depends = [
    'yii\web\YiiAsset',
   // 'yii\bootstrap\BootstrapAsset',
  ];

}
