<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Info */

$this->title = 'แก้ไข ข้อมูลผู้จัดทำ: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลผู้จัดทำ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
