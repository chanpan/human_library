<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Info */

$this->title = 'เพิ่ม ข้อมูลผู้จัดทำ';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลผู้จัดทำ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
