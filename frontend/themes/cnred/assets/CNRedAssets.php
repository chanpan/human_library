<?php

namespace frontend\themes\cnred\assets;

use yii\web\AssetBundle;

class CNRedAssets extends AssetBundle{
    
    public $sourcePath = '@frontend/themes/cnred/assets';
    public $css = [
        'css/bootstrap-select.min.css',
        'css/animate.css',
        'css/jquery-ui.min.css',
        'css/jquery.simpleLens.css',
        'css/fancybox/jquery.fancybox.css',
        'css/meanmenu.min.css',
        'css/nivo-slider.css',
        'css/owl.carousel.css',
        'css/font-awesome.min.css',
        'css/style.css',
        'css/responsive.css',
        'css/custom.css'
    ];

    public $js = [
       'js/bootstrap-select.min.js', 
       'js/owl.carousel.min.js',
       'js/jquery-ui.min.js',
       'js/jquery.simpleLens.min.js',
       'js/jquery.fancybox.pack.js',
       'js/jquery.countdown.min.js',
       'js/jquery.nivo.slider.pack.js',
       'js/jquery.meanmenu.js',
       'js/wow.min.js',
       'js/jquery.scrollUp.min.js',
       'js/plugins.js',
       'js/main.js' 
    ];

    public $depends = [
//        'rmrevin\yii\fontawesome\AssetBundle',
        'yii\jui\JuiAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        '\cpn\chanpan\assets\slider\SliderMultipleImageAssets'
    ];
}
