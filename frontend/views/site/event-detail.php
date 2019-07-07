<?php
$this->title = 'รายละเอียดกิจกรรม';
\cpn\chanpan\assets\cnlightbox\CNLightBoxAsset::register($this);
$storage = isset(Yii::$app->params['storageUrl']) ? Yii::$app->params['storageUrl'] : '';
?>
<?php if(!Yii::$app->user->isGuest): ?>
<div class="pull-right">
    <a href="<?= yii\helpers\Url::to(['/site/register-form?event_id='.$model->id])?>" class="btn btn-success">ลงทะเบียน</a>
</div>
<?php endif; ?>
<label><?= isset($model->title) ? $model->title : '' ?></label>
<div id="aniimated-thumbnials">
    <h3>รูปภาพ</h3>
    <?php if($files):?>
        <?php foreach ($files as $k => $v): ?>
    <?php
                $file_type_image = ['jpeg', 'jpg', 'gif', 'png'];
                $file_type_video = ['mp4', 'avi', 'gif', 'mov'];
                $file_type = explode('.', $v['file_name']);
                ?>
   <?php if (in_array(end($file_type), $file_type_image)): ?> 
    <a href="<?= $storage . '/files/' . $v['file_name'] ?>">
        <img src="<?= $storage . '/files/' . $v['file_name'] ?>" style="display: none;"/>
        <div class="col-md-2 folder_dynamic" style="margin-bottom:15px;" data-id="<?= $v['id'] ?>" id="folder_dynamic_<?= $v['id'] ?>">
            <div class="row folder_dynamic_items"  data-id="<?= $v['id'] ?>" style="padding:5px;">
                
                
                    <div style="width:100%;height:150px;background:url(<?= $storage . '/files/' . $v['file_name'] ?>) center;  background-size: cover;"></div>
                 
                    
                

            </div>
        </div>
    </a>
    <?php endif; ?>    
    <?php endforeach; ?>
    <?php endif; ?>
</div>

<div class="clearfix">
    
</div>
<div id="">
    <h3>วีดีโอ</h3>
    <?php foreach ($files as $k => $v): ?>
        <?php
        $file_type_image = ['jpeg', 'jpg', 'gif', 'png'];
        $file_type_video = ['mp4', 'avi', 'gif', 'mov'];
        $file_type = explode('.', $v['file_name']);
        ?>
        <?php if (in_array(end($file_type), $file_type_video)): ?>
        <a href="<?= $storage . '/files/' . $v['file_name'] ?>">
            <div class="col-md-2 folder_dynamic" style="margin-bottom:15px;" data-id="<?= $v['id'] ?>" id="folder_dynamic_<?= $v['id'] ?>">
                <div class="row folder_dynamic_items"  data-id="<?= $v['id'] ?>" style="padding:5px;">
                    <a target="_BLANK" href="<?= \yii\helpers\Url::to(['/site/video-detail?id='.$v['id']])?>">
                        <video style="width:100%;height:150px;" >
                            <source src="<?= $storage . '/files/' . $v['file_name'] ?>" type="video/<?= end($file_type) ?>">
                            Your browser does not support HTML5 video.
                        </video>
                    </a>    
                </div>
            </div>
        </a>
        <?php endif; ?>  
    <?php endforeach; ?>
</div>
<?php richardfan\widget\JSRegister::begin(); ?>
<script>
    $('#aniimated-thumbnials').lightGallery({
        thumbnail: true
    });
</script>
<?php richardfan\widget\JSRegister::end(); ?>
