<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ลงทะเบียน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading"><?= Html::encode($this->title) ?></div>
        <div class="panel-body">
            <div class="site-signup">  
                <p>โปรดกรอกฟิลด์ต่อไปนี้เพื่อลงทะเบียน:</p>

                <div class="row">
                    <div class="col-lg-12">
                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                        <?= $form->field($model, 'email') ?>
                        <?= $form->field($model, 'password')->passwordInput() ?>
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
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <?= Html::submitButton('ลงทะเบียน', ['class' => 'btn btn-success btn-block btn-lg', 'name' => 'signup-button btn-block']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>