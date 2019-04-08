<?php
/* @var $this yii\web\View */

$this->title = Yii::$app->name;
$url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
//                        return Html::img("{$url}/files/{$model->user_image}", [
//                            'class' => 'img img-responsive',
//                            'style'=>'width:50px;'
//                            ]);
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <?php if ($model): ?>
            <?php foreach ($model as $k => $v): ?>
                <?php if ($k % 2 == 0): ?>
                    <div class="media"> 
                        <div class="media-left"> 
                            <a href="#"> 
                                <img alt="64x64" class="media-object img-circle" data-src="holder.js/64x64" 
                                     src="<?= "{$url}/files/{$v->user_image}" ?>" data-holder-rendered="true" style="width: 100px; height: 100px;border: 3px solid #009688;"> 
                            </a> 
                        </div> 
                        <div class="media-body"> 
                            <h3 class="media-heading"><?= isset($v->title) ? $v->title : ''; ?></h3> 
                            <h4 style="margin-top: 3px;"> เรื่อง : เล่าขานตำนานเมืองสกลนคร </h4>
                            <h4 style="margin-top: 3px;">ชื่อผู้บรรยาย <?= $v->user_name; ?></h4>
                            <h4 style="margin-top: 3px;">เวลาจัดการการบรรยาย <?= isset($v->date) ? appxq\sdii\utils\SDdate::mysql2phpThDateTimeFull($v->date) : ''; ?></h4>
                        </div> 
                    </div>
                    <hr/>
                <?php else: ?>
                    <div class="media"> 
                        <div class="media-body"> 
                            <h3 class="media-heading"><?= isset($v->title) ? $v->title : ''; ?></h3> 
                            <h4 style="margin-top: 3px;"> เรื่อง : เล่าขานตำนานเมืองสกลนคร </h4>
                            <h4 style="margin-top: 3px;">ชื่อผู้บรรยาย <?= $v->user_name; ?></h4>
                            <h4 style="margin-top: 3px;">เวลาจัดการการบรรยาย <?= isset($v->date) ? appxq\sdii\utils\SDdate::mysql2phpThDateTimeFull($v->date) : ''; ?></h4>
                        </div> 
                        <div class="media-right"> 
                            <a href="#"> 
                                <img alt="64x64" class="media-object img-circle" data-src="holder.js/64x64" 
                                     src="<?= "{$url}/files/{$v->user_image}" ?>" data-holder-rendered="true" style="width: 100px; height: 100px;border: 3px solid #009688;"> 
                            </a> 
                        </div> 
                    </div>
                    <hr/>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>

        <?php endif; ?>

    </div>
</div>
<?php \appxq\sdii\widgets\CSSRegister::begin();?>
<style>
    
    .media{
        background: #f3f3f3;
    padding: 5px;
    border-radius: 5px;
    }
</style>
<?php \appxq\sdii\widgets\CSSRegister::end();?>
