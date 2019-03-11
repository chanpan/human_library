<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Events */

$this->title = 'กิจกรรม : ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'กิจกรรม', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="events-update">

    <h1><?= Html::encode($this->title) ?></h1><hr/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
