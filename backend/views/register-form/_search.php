<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RegisterFormSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="register-form-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'tel') ?>

    <?= $form->field($model, 'user_type') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
