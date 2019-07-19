<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h3 class="text-center">ลงทะเบียนเข้าร่วมกิจกรรมการบรรยาย</h3>
<?php if($status):?>
<div class="col-md-6 col-md-offset-3">
    <h3>สถานะ: ลงทะเบียนแล้ว</h3>
    <div>ชื่อ: <?= $model->name; ?></div>
    <div>เบอร์โทรศัพท์: <?= $model->tel; ?></div>
    <div>ประเภทผู้ใช้: <?= $model->user_type; ?></div>
    <div>หน่วยงาน: <?= $model->department; ?></div>
    <div>อีเมล์: <?= $model->email; ?></div>
    <div>วันที่ลงทะเบียน: <?= appxq\sdii\utils\SDdate::mysql2phpDate($model->create_date); ?></div>
</div>
<?php else:?>
<div class="col-md-6 col-md-offset-3">
    <a href="<?= yii\helpers\Url::to(['/site/event-detail?id='.$model->event_id])?>" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> </i> ย้อนกลับ</a>



    <div class="register-form-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'event_id')->hiddenInput()->label(false) ?>    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
    <?php 
        $items = [
          'ผู้บริหาร'=>'ผู้บริหาร',
          'อาจารย์'=>'อาจารย์',
          'บุคลากร'=>'บุคลากร ',
          'นักศึกษา'=>'นักศึกษา',
          'อื่นๆ'=>'อื่นๆ',
        ];
    ?>
    <?= $form->field($model, 'user_type')->dropDownList($items, ['prompt'=>'เลือกประเภทผู้ใช้']) ?>
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
    <?= $form->field($model, 'department')->dropDownList($items, ['prompt'=>'เลือกประเภทหน่วยงาน']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
<?php endif; ?>