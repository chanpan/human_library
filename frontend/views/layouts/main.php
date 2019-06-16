<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top nav-blue',
        ],
    ]);
    $menuItems = [
//        ['label' => 'Human Library', 'url' => ['/site/index']],
        ['label' => "<img src='".yii\helpers\Url::to(['@web/img/event.png'])."' style='width: 25px;'> กิจกรรม", 'url' => ['/site/event']],
        ['label' => "<img src='".yii\helpers\Url::to(['@web/img/news.png'])."' style='width: 25px;'> ข่าวประกาศ", 'url' => ['/site/news']],
        //['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (!isset(\Yii::$app->session['user_id'])) {
        $menuItems[] = ['label' => 'เข้าสู่ระบบ', 'url' => ['/site/login']];
        $menuItems[] = ['label' => 'ลงทะเบียน', 'url' => ['/site/signup']];
    } else {
//        $menuItems[] = ['label' => 'ลงทะเบียนเข้าร่วมกิจกรรม', 'url' => ['/site/register-form']];
        $menuItems[] = ['label' => "<img src='".yii\helpers\Url::to(['@web/img/form.png'])."' style='width: 25px;'>  แบบประเมินผลออนไลน์", 'url' => ['/site/assessment-form']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . backend\classes\CNUser::get_fullname_by_user_id(\Yii::$app->session['user_id']). ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels'=>false
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        
        <h3>จำนวนการเข้าชมเว็บไซต์
            <?php 
                $count = \common\models\ViewCount::findOne(1);
                echo $count->count;
            ?>
            ครั้ง
        </h3> 
         
        
    </div>
</footer>

    
    <?php appxq\sdii\widgets\CSSRegister::begin();?>
    <style>
        .nav-blue{
            background-color: #2196F3;
            border-color: #2196F3;
        }
        .nav-blue .navbar-brand {
            color: #fff;
        }
        .nav-blue .navbar-nav > .active > a, .nav-blue .navbar-nav > .active > a:hover, .nav-blue .navbar-nav > .active > a:focus {
            color: #fff;
            background-color: #1476c3;
        }
        .nav-blue .navbar-nav > li > a {
            color: #ffffff;
        }
        .nav-blue .btn-link {
            color: #ffffff;
        }
    </style>
    <?php appxq\sdii\widgets\CSSRegister::end();?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
