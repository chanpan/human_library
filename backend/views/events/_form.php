<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-6">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'autofocus'=>true])->hint('ชื่อกิจกรรมต้องไม่เกิน 100 ตัวอักษร') ?>
            <?= $form->field($model, 'detail')->widget(dosamigos\ckeditor\CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'preset' => 'full', //basic,standard,full  
                    'clientOptions' => [
                        'filebrowserUploadUrl' => \yii\helpers\Url::to(['/ck-editor/upload']),
                    ]
                ]) ?>
            <?= $form->field($model, 'event_type')->hiddenInput()->label(FALSE); ?>
            <?= $form->field($model, 'forder')->textInput() ?>
        
            <?php 
                //echo $model->file;
                if($model->file){
                    $url = isset(\Yii::$app->params['storageUrl'])?\Yii::$app->params['storageUrl']:'';
                    echo Html::img("{$url}/files/{$model->file}", ['class'=>'img img-responsive' , 'style'=>'width:100px;']);
                }
            ?>
            <?= $form->field($model, 'file')->fileInput() ?>
            <div class="form-group text-center">
                <?= Html::a("ยกเลิก", ['/events'], ['class'=>'btn btn-danger'])?>
                <?= Html::submitButton("บันทึก", ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>
