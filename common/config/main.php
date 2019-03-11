<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@cpn/chanpan' => '@common/lib/yii2-chanpan',
        '@appxq/sdii' => '@common/lib/yii2-sdii',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'th',
    'timeZone' => 'Asia/Bangkok',
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],//rbac
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
