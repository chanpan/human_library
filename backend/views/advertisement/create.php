<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Advertisement */

$this->title = 'เพิ่ม ข่าวประชาสัมพันธ์';
$this->params['breadcrumbs'][] = ['label' => 'ข่าวประชาสัมพันธ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
