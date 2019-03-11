<?php 
    $storage = isset(Yii::$app->params['storageUrl'])?Yii::$app->params['storageUrl']:'';
?>
<div class="col-md-2 folder_dynamic" style="margin-bottom:15px;" data-id="<?= $v['id'] ?>" id="folder_dynamic_<?= $v['id'] ?>">
    <div class="row folder_dynamic_items"  data-id="<?= $v['id'] ?>" style="padding:5px;">
        <div style="width:100%;height:150px;background:url(<?= $storage.'/files/'.$v['file_name']?>) center;  background-size: cover;"></div>
    </div>
</div>
