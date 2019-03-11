<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ลงทะเบียน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>โปรดกรอกฟิลด์ต่อไปนี้เพื่อลงทะเบียน:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'confirm_password')->passwordInput() ?>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <?= $form->field($model, 'firstname')->textInput() ?>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <?= $form->field($model, 'lastname')->textInput() ?>
                </div>
            </div>

            <?= $form->field($model, 'tel')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('ลงทะเบียน', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
