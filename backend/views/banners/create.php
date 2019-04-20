<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Banners */

$this->title = Yii::t('app', 'เพิ่ม ภาพ Slide');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ภาพ Slide'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
