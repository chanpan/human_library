<?php
    use yii\helpers\Url;
    $this->title = 'รายละเอียดกิจกรรมการบรรยาย';
    \cpn\chanpan\assets\cnlightbox\CNLightBoxAsset::register($this);
    $storage = isset(Yii::$app->params['storageUrl']) ? Yii::$app->params['storageUrl'] : '';
    $id = Yii::$app->request->get('id');

?>
<div >
<a href="<?= Url::to(['/site/index'])?>" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</a>
<?php if(isset(\Yii::$app->session['user_id'])): ?>
    <a class="btn btn-success"  href="<?= yii\helpers\Url::to(['/site/register-form?event_id='.$id])?>" class="btn btn-success">ลงทะเบียน</a>
<?php endif; ?>
</div>
<br/>
<div>
<h2> <?= isset($model->title) ? $model->title : '' ?></h2><hr/>
</div>
<div class="row">
    
    <div class="col-md-8">
        <h4>รายละเอียดกิจกรรมการบรรยาย</h4>
        <div><?= isset($model->detail) ? $model->detail : '' ?></div>
    </div>
    <div class="col-md-4">
        <div id="aniimated-thumbnials">
            <h4>รูปภาพ/วีดีโอกิจกรรมการบรรยาย</h4>
            <?php if($files):?>
                <?php foreach ($files as $k => $v): ?>
            <?php
                        $file_type_image = ['jpeg', 'jpg', 'gif', 'png'];
                        $file_type_video = ['mp4', 'avi', 'gif', 'mov'];
                        $file_type = explode('.', $v['file_name']);
                        ?>
               <?php if (in_array(end($file_type), $file_type_image)): ?> 
                    <a href="<?= $storage . '/files/' . $v['file_name'] ?>">
                        <div class="col-md-3 folder_dynamic" style="margin-bottom:15px;" data-id="<?= $v['id'] ?>" id="folder_dynamic_<?= $v['id'] ?>">
                            <div class="row folder_dynamic_items"  data-id="<?= $v['id'] ?>" style="padding:5px;">
                                <img src="<?= $storage . '/files/' . $v['file_name'] ?>" class='img img-responsive' style='height: 80px;'> 
                            </div>
                        </div>
                    </a>

                <?php endif; ?>    
            <?php endforeach; ?>
            <?php endif; ?>
            
        </div>

        <div id="">
                <h4>วีดีโอ</h4>
                <?php foreach ($files as $k => $v): ?>
                    <?php
                    $file_type_image = ['jpeg', 'jpg', 'gif', 'png'];
                    $file_type_video = ['mp4', 'avi', 'gif', 'mov'];
                    $file_type = explode('.', $v['file_name']);
                    ?>
                    <?php if (in_array(end($file_type), $file_type_video)): ?>
                    <video style="width:100%" controls="">
                                        <source src="<?= $storage . '/files/' . $v['file_name'] ?>" type="video/<?= end($file_type) ?>">
                    </video>
                    <?php endif; ?>  
                <?php endforeach; ?>
            </div>
    </div>
</div>

<div class="clearfix">
    
</div>

<?php richardfan\widget\JSRegister::begin(); ?>
<script>
    $('#aniimated-thumbnials').lightGallery({
        thumbnail: true
    });
</script>
<?php richardfan\widget\JSRegister::end(); ?>
