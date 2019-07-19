<?php 
    use yii\helpers\Html;
//    \kartik\file\FileInputAsset::register($this);
    kartik\file\FileInputAsset::register($this);
?>
<div class="modal-body">
   
    <div class="file-loading">
        <input id="input-700" name="name[]" type="file" multiple accept="">
    </div>
</div>
<div class="modal-footer">
    <div class="pull-right">
        <?= Html::submitButton(Yii::t('app','Close'),['class'=>'btn btn-danger btn-block btnClose', 'data-dismiss'=>'modal']) ?>
    </div>
</div>
<?php \richardfan\widget\JSRegister::begin();?>
<script>
    $('.btnSubmit').prop('disabled', true); 
    
    $("#input-700").fileinput({        
        uploadUrl: "<?= yii\helpers\Url::to(['/files/upload'])?>",
        minFileCount:0,
        maxFileCount:1000,
        showUpload:false,
        showRemove:false,
        uploadExtraData: function() {
            return {
                event_id: '<?= $event_id?>',
            };
        },
        //ajaxSettings: { headers: { Authorization: 'Bearer ' + localStorageService.get('authorizationData').token } }    
    }).on("filebatchselected", function(event, files) {
        $("#input-700").fileinput("upload");
        $('.btnClose').prop('disabled', true);
    }).on('filebatchuploadcomplete', function (event, data, previewId, index) {
          let result = {message:'Upload success', status:'success'};
          <?= \appxq\sdii\helpers\SDNoty::show('result.message', 'result.status') ?>
          height_modal();
          $('.btnClose').prop('disabled', false);
           
    }).on('filebatchuploaderror', function (event, data, previewId, index) {
          let result = {message:'Upload error', status:'error'};
          <?= \appxq\sdii\helpers\SDNoty::show('result.message', 'result.status') ?>
          height_modal();
          $('.btnClose').prop('disabled', false);
    });
    $(document).on('hide.bs.modal','#modal_update_files', function () {
      setTimeout(function(){
          location.reload();
      },1000);
    //Do stuff here
   }); 
   
   height_modal = function(){
       $(document).find('#modal_update_folder').modal('hide');    
   }
</script>
<?php \richardfan\widget\JSRegister::end();?>

