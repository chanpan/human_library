<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RegisterForm */

$this->title = 'Create Register Form';
$this->params['breadcrumbs'][] = ['label' => 'Register Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
