<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Roles */

$this->title = 'แก้ไข บทบาท: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'บทบาท', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
