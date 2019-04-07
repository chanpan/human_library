<?php 
    $storage = isset(Yii::$app->params['storageUrl'])?Yii::$app->params['storageUrl']:'';
?>
<div class="col-md-2 folder_dynamic" style="margin-bottom:15px;" data-id="<?= $v['id'] ?>" id="folder_dynamic_<?= $v['id'] ?>">
    <div class="row folder_dynamic_items"  data-id="<?= $v['id'] ?>" style="padding:5px;">
        <div class="pull-right">
            <button data-id="<?= $v['id']; ?>" class="btn btn-danger btn-del btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
        </div>
        <?php 
            $file_type_image = ['jpeg','jpg','gif','png'];
            $file_type_video = ['mp4','avi','gif','mov'];
            $file_type = explode('.', $v['file_name']);
              
        ?>
        <?php if(in_array(end($file_type), $file_type_image)):?>
            <div style="width:100%;height:150px;background:url(<?= $storage.'/files/'.$v['file_name']?>) center;  background-size: cover;"></div>
        <?php elseif (in_array(end($file_type), $file_type_video)): ?>
            <video style="width:100%;height:150px;" controls>
                <source src="<?= $storage.'/files/'.$v['file_name']?>" type="video/<?= end($file_type)?>">
                Your browser does not support HTML5 video.
            </video>
        <?php endif;?>    
            
    </div>
</div>
<?php \richardfan\widget\JSRegister::begin();?>
<script>
    $('.btn-del').on('click', function(){
        let id = $(this).attr('data-id'); //ดึงเอาค่าจาก data-id
//        alert(id);
        bootbox.confirm({
                message: "คุณต้องการยกเลิกรายการตรวจหรือไม่",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(result){
                        
                        let url = '<?= yii\helpers\Url::to(['/files/delete'])?>';
                        $.post(url ,{id:id}, function(res){
                            console.log(res);
                             if(res['status'] == 'success'){
                                $(`#folder_dynamic_${id}`).remove();
                             }
                        });
                    }
                }
            });
            return false;
    });
</script>
<?php \richardfan\widget\JSRegister::end();?>
