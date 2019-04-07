<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Book */

$this->title = 'เพิ่ม การบรรยาย';
$this->params['breadcrumbs'][] = ['label' => 'การบรรยาย', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
