<?php
$this->title = 'รายละเอียดกิจกรรม';
\cpn\chanpan\assets\cnlightbox\CNLightBoxAsset::register($this);
$storage = isset(Yii::$app->params['storageUrl']) ? Yii::$app->params['storageUrl'] : '';
?>
<h4><?= isset($model->title) ? $model->title : '' ?></h4>
<div id="aniimated-thumbnials">
    <h3>รูปภาพ</h3>
    <?php foreach ($files as $k => $v): ?>
    <a href="<?= $storage . '/files/' . $v['file_name'] ?>">
        <img src="<?= $storage . '/files/' . $v['file_name'] ?>" style="display: none;"/>
        <div class="col-md-2 folder_dynamic" style="margin-bottom:15px;" data-id="<?= $v['id'] ?>" id="folder_dynamic_<?= $v['id'] ?>">
            <div class="row folder_dynamic_items"  data-id="<?= $v['id'] ?>" style="padding:5px;">
                <?php
                $file_type_image = ['jpeg', 'jpg', 'gif', 'png'];
                $file_type_video = ['mp4', 'avi', 'gif', 'mov'];
                $file_type = explode('.', $v['file_name']);
                ?>
                <?php if (in_array(end($file_type), $file_type_image)): ?>
                    <div style="width:100%;height:150px;background:url(<?= $storage . '/files/' . $v['file_name'] ?>) center;  background-size: cover;"></div>
                <?php elseif (in_array(end($file_type), $file_type_video)): ?>
                    
                <?php endif; ?>    

            </div>
        </div>
    </a>
    <?php endforeach; ?>
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
                    


                        <video style="width:100%;height:150px;" controls>
                            <source src="<?= $storage . '/files/' . $v['file_name'] ?>" type="video/<?= end($file_type) ?>">
                            Your browser does not support HTML5 video.
                        </video>


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
