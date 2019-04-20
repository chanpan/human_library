<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
\cpn\chanpan\assets\bootbox\BootBoxAsset::register($this);
\cpn\chanpan\assets\notify\NotifyAsset::register($this);

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
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        
        ['label' => 'หน้าหลัก', 'url' => ['/site/index']],
        ['label' => 'ผู้ใช้', 'url' => ['/user/index']],
        ['label' => 'ข่าวประชาสัมพันธ์', 'url' => ['/advertisement/index']],
        ['label' => 'การบรรยาย', 'url' => ['/book/index']],
        ['label' => 'ภาพ Slide', 'url' => ['/banners/index']],
        ['label' => 'ภาพ/วีดีโอกิจกรรม', 'url' => ['/events/index']],
        [
            'label' => 'ข้อมูลทั่วไป',
            'items' => [
                 ['label' => 'ข้อมูลผู้จัดทำ', 'url' => ['/info/index']] 
            ],
        ],
        ['label' => 'แบบประเมิน', 'url' => ['/assessment-form/index']],
         
    ];
    if (!isset(\Yii::$app->session['user_id'])) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
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
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
