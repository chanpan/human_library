<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AssessmentForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assessment-form-form">

    <?php $form = ActiveForm::begin(['options'=>['layout' => 'vertical']]); ?>
        <?php 
            $items = ['ชาย'=>'ชาย', 'หญิง'=>'หญิง'];
        ?>
        <?= $form->field($model, 'sex')->radioList($items) ?>
    
        <?php 
            $items = ['ผู้บริหาร'=>'ผู้บริหาร', 'อาจารย์'=>'อาจารย์','บุคลากร'=>'บุคลากร', 'นักศึกษา'=>'นักศึกษา','อื่นๆ'=>'อื่นๆ'];
        ?>
        <?= $form->field($model, 'status')->radioList($items) ?>
        
        <?= $form->field($model, 'status_other')->textInput() ?>
    
        <?php 
            $items = [
                'คณะครุศาสตร์'=>'คณะครุศาสตร์',
                'คณะวิทยาศาสตร์และเทคโนโลยี'=>'คณะวิทยาศาสตร์และเทคโนโลยี',
                'คณะมนุษย์ศาสตร์และสังคมศาสตร์'=>'คณะมนุษย์ศาสตร์และสังคมศาสตร์', 
                'คณะวิทยาการจัดการ'=>'คณะวิทยาการจัดการ',
                'คณะเทคโนโลยีอุตสาหกรรม'=>'คณะเทคโนโลยีอุตสาหกรรม',
                'คณะเทคโนโลยีการเกษตร'=>'คณะเทคโนโลยีการเกษตร',
                'สำนักงานอธิการบดี'=>'สำนักงานอธิการบดี',
                'สถาบันวิจัยและพัฒนา'=>'สถาบันวิจัยและพัฒนา', 
                'บัณฑิตวิทยาลัย'=>'บัณฑิตวิทยาลัย',
                'สำนักส่งเสริมวิชาการและงานทะเบียน'=>'สำนักส่งเสริมวิชาการและงานทะเบียน',
                'สถาบันภาษา ศิลปะและวัฒนธรรม'=>'สถาบันภาษา ศิลปะและวัฒนธรรม', 
                'สำนักวิทยบริการและเทคโนโลยีสารสนเทศ'=>'สำนักวิทยบริการและเทคโนโลยีสารสนเทศ',
                'อื่นๆ'=>'อื่นๆ',
            ];
        ?>
        <?= $form->field($model, 'department')->radioList($items) ?>
        <?= $form->field($model, 'department_other')->textInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('ถัดไป', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
