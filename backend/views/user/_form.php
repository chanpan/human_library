<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-6">
    <div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        
    <?php 
        $items = backend\models\Roles::find()->all();
        $items = \yii\helpers\ArrayHelper::map($items, 'id', 'name');
    ?>    
    <?= $form->field($model, 'role')->checkboxList($items) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
