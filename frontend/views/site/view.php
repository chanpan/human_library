<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = Yii::$app->name;
$url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
?>
<div>

    <a href="<?= Url::to(['/site/index'])?>" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</a>
    <a href="<?= Url::to(['/site/register-form'])?>" class="btn btn-success">ลงทะเบียน</a>
</div>
 <br/>
<div class="row">
    <div class="col-md-3"><img class="media-object img-circle" data-src="holder.js/64x64" 
                 src="<?= "{$url}/files/{$model->user_image}" ?>" data-holder-rendered="true" style="width: 100px; height: 100px;border: 3px solid #009688;"> </div>
    <div class="col-md-9"> 
        <h3 ><?= isset($model->title) ? $model->title : ''; ?></h3> 
        <h4 style="margin-top: 3px;"> เรื่อง : เล่าขานตำนานเมืองสกลนคร </h4>
        <h4 style="margin-top: 3px;">ชื่อผู้บรรยาย <?= $model->user_name; ?></h4>
        <h4 style="margin-top: 3px;">เวลาจัดการการบรรยาย <?= isset($model->date) ? appxq\sdii\utils\SDdate::mysql2phpThDateTimeFull($model->date) : ''; ?></h4>
    </div>              
</div>
<hr/>
<div>
    <?= isset($model->detail)?$model->detail:''?>
</div>