<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = Yii::$app->name;
$url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
?>

<div class="row">
    
    <div class="col-md-8 col-md-offset-2">
        <?php yii\widgets\ActiveForm::begin(['method'=>'get']);?>
            <div class="input-group"> 
                <input class="form-control" name="search" placeholder="ค้นหาการบรรยายได้"> 
                <div class="input-group-btn"> 
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> ค้นหา</button> 
                </div> 
            </div> 
        <?php yii\widgets\ActiveForm::end();?>
        <?php if ($model): ?>
            <?php foreach ($model as $k => $v): ?>
                <?php if ($k % 2 == 0): ?>
                    <div class="media view-book" data-url="<?= Url::to(["/site/view?id={$v->id}"])?>"> 
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
                    <div class="media view-book" data-url="<?= Url::to(["/site/view?id={$v->id}"])?>"> 
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
<?php richardfan\widget\JSRegister::begin();?>
<script>
   $('.view-book').on('click', function(){
       let url = $(this).attr('data-url');
       location.href = url;
       return false; 
   });
</script>
<?php richardfan\widget\JSRegister::end();?>

<?php \appxq\sdii\widgets\CSSRegister::begin();?>
<style>
    
    .media{
        background: #f3f3f3;
    padding: 5px;
    border-radius: 5px;
    }
</style>
<?php \appxq\sdii\widgets\CSSRegister::end();?>
