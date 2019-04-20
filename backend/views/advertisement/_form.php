<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Advertisement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-6">
<div class="advertisement-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php
    //echo $model->file;
    if ($model->photo) {
        $url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
        echo Html::img("{$url}/files/{$model->photo}", ['class' => 'img img-responsive', 'style' => 'width:100px;']);
    }
    ?>
    <?= $form->field($model, 'photo')->fileInput() ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->widget(dosamigos\ckeditor\CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'preset' => 'full', //basic,standard,full  
                    'clientOptions' => [
                        'filebrowserUploadUrl' => \yii\helpers\Url::to(['/ck-editor/upload']),
                    ]
                ]) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

    </div>
</div>
