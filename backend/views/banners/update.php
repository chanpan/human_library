<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Banners */

$this->title = Yii::t('app', 'แก้ไข ภาพ Slide');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ภาพ Slide'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'แก้ไข');
?>
<div class="banners-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
