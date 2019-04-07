<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Events */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'กิจกรรม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$btn_upload_file = 'cn_btn_upload_file';
$modal_update = 'modal_update_files';
$url_create_file = \yii\helpers\Url::to(["/files/upload?event_id={$model->id}"]);
\yii\web\YiiAsset::register($this);
?>
<div class="events-view">
    <a href="#" id="btn-go-back" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</a>
    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="row">
        <div class="col-md-12" id="files-list">
            <div class="col-md-2 text-right">
                <button title="<?= Yii::t('app','Create Folder')?>" class="add-show-form <?= $btn_upload_file ?>" style="    width: 100%;
    height: 159px;
    border: 2px #c2c2c2;
    border-style: dashed;
    border-radius: 5px;
    font-size: 30pt;"> 
                        <i class="glyphicon glyphicon-plus"></i>
                </button>
            </div>
           <?php if($files): ?>
                <?php foreach($files as $k=>$v):?>
                    <?= $this->render('_items_files',['v'=>$v])?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</div>

<?= appxq\sdii\widgets\ModalForm::widget([
    'id' => $modal_update,
    //'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
    //'size'=>'modal-lg',
]);
?>

<?php richardfan\widget\JSRegister::begin();?>
<script>
    $('#btn-go-back').on('click', function(){
        go_back();
    });
    function go_back() {
        window.history.back();
    }
    $('.<?= $btn_upload_file?>').click(function(){
         let url = '<?= $url_create_file?>';
         loadModal(url);
         return false;
    });
    function loadModal(url) {
        $('#<?= $modal_update?> .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
        $('#<?= $modal_update?>').modal('show')
        .find('.modal-content')
        .load(url);
    }
</script>
<?php richardfan\widget\JSRegister::end();?>