<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm; 
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-6">
    <div class="book-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'detail')->widget(dosamigos\ckeditor\CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'preset' => 'full', //basic,standard,full  
                    'clientOptions' => [
                        'filebrowserUploadUrl' => \yii\helpers\Url::to(['/ck-editor/upload']),
                    ]
                ]) ?>
            <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
            
            <?php 
                //echo $model->file;
                if($model->user_image){
                    $url = isset(\Yii::$app->params['storageUrl'])?\Yii::$app->params['storageUrl']:'';
                    echo Html::img("{$url}/files/{$model->user_image}", ['class'=>'img img-responsive' , 'style'=>'width:100px;']);
                }
                
            ?>
           <?= $form->field($model, 'user_image')->fileInput() ?>
        <div class="row">
            <div class="col-md-6"><?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::class, [
                'language' => 'th',
                'dateFormat' => 'yyyy-MM-dd',
            ]) ?></div>
            <div class="col-md-6"><?= $form->field($model, 'time_start')
                    ->widget(\kartik\time\TimePicker::classname(), [
                        'pluginOptions' => [
                            'showSeconds' => true,
                            'showMeridian' => false,
                            'minuteStep' => 1,
                            'secondStep' => 5,
                        ]
                    ]);?></div>
        </div> 
            
            
        
        
            <?= $form->field($model, 'forder')->textInput(['type'=>'number']) ?>
        <?= $form->field($model, 'location')->textarea() ?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
