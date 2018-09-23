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
    'css/flexslider.css',
    'css/animate.min.css',
  ];
  public $js = [
  //  '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
    'js/jquery-1.11.1.min.js',
    'js/jquery.countdown.min.js',
    'js/jquery.flexslider.js',
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
  ];
  public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
  ];

}
