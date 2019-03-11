<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\widgets\ActiveForm */
//auth_item
?>
<div class="row">
    <div class="col-md-6 col-xs-6 col-sm-6">
        
        <div class="well">
            <?= Html::a("<i class='glyphicon glyphicon-arrow-left'></i> ย้อนกลับ", ['/user/index'], ['class'=>'btn btn-default']);?>
            <br><br><hr/>
            <?php $form = ActiveForm::begin(); ?>
        <div class="form-group field-userform-username has-success">
            <label class="control-label" for="userform-username">ชื่อผู้ใช้งาน: </label>
            <?= $model->username ?>
        </div>
        <div class="form-group field-userform-username has-success">
            <label class="control-label" for="userform-username">อีเมล์: </label>
            <?= $model->email ?>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <?= $form->field($model, 'firstname')->textInput() ?>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <?= $form->field($model, 'lastname')->textInput() ?>
            </div>
        </div>
        <?= $form->field($model, 'tel')->textInput() ?>
            
        <?php 
        
            $items = Yii::$app->db->createCommand("SELECT * FROM auth_item")->queryAll();
            $items = yii\helpers\ArrayHelper::map($items, 'name', 'name');
            echo $form->field($model, 'role')->checkBoxList($items, ['class'=>'form-control']);

            
        ?>    
        <div class="form-group">
            <div class="text-right">
                 <?= Html::a('ยกเลิก', ['/user/index'], ['class'=>'btn btn-danger']);?>
                 <?= Html::submitButton('บันทึกการเปลี่ยนแปลง', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>