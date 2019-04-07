<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Advertisement */

$this->title = 'แก้ไข ข่าวประชาสัมพันธ์: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ข่าวประชาสัมพันธ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="advertisement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
