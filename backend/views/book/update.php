<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Book */

$this->title = 'แก้ไข การบรรยาย: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'การบรรยาย', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
