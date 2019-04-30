<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Banners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banners-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php 
        if ($model->photo) {
            $url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
            echo Html::img("{$url}/files/{$model->photo}", ['class' => 'img img-responsive', 'style' => 'width:100px;']);
        }
    ?>
    <?= $form->field($model, 'photo')->fileInput() ?>
    <?=
    $form->field($model, 'detail')->widget(dosamigos\ckeditor\CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full', //basic,standard,full  
        'clientOptions' => [
            'filebrowserUploadUrl' => \yii\helpers\Url::to(['/ck-editor/upload']),
        ]
    ])
    ?>
    <?= $form->field($model, 'url')->textInput() ?>
    <?= $form->field($model, 'forder')->textInput() ?>
 
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
