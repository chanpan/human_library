<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = Yii::$app->name;
?>
<div class="text-center">
    <h2><?= $this->title; ?></h2>
</div><hr/>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="col-md-4 text-right">
            <button data-url="<?= Url::to(['/user/index'])?>" title="ผู้ใช้" class="add-show-form cn_btn_upload_file main-box"> 
                <i class="glyphicon glyphicon-user"></i>
            </button>
        </div>
        <div class="col-md-4 text-right">
            <button data-url="<?= Url::to(['/advertisement/index'])?>" title="ข่าวประชาสัมพันธ์" class="add-show-form cn_btn_upload_file main-box"> 
                <i class="glyphicon glyphicon-volume-up"></i>
            </button>
        </div>
        <div class="col-md-4 text-right">
            <button data-url="<?= Url::to(['/book/index'])?>" title="การบรรยาย" class="add-show-form cn_btn_upload_file main-box"> 
                <i class="glyphicon glyphicon-book"></i>
            </button>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="col-md-4 text-right">
            <button data-url="<?= Url::to(['/events/index'])?>" title="กิจกรรม" class="add-show-form cn_btn_upload_file main-box"> 
                <i class="glyphicon glyphicon-picture"></i>
            </button>
        </div>
        <div class="col-md-4 text-right">
            <button data-url="<?= Url::to(['/info/index'])?>" title="ข้อมูลผู้จัดทำ" class="add-show-form cn_btn_upload_file main-box"> 
                <i class="glyphicon glyphicon-credit-card"></i>
            </button>
        </div>
        <div class="col-md-4 text-right">
            <button data-url="<?= Url::to(['/assessment-form/index'])?>" title="การบรรยาย" class="add-show-form cn_btn_upload_file main-box"> 
                <i class="glyphicon glyphicon-align-center"></i>
            </button>
        </div>
    </div>
</div>

<?php richardfan\widget\JSRegister::begin();?>
<script>
    $('.main-box').on('click', function(){
       let url = $(this).attr('data-url');
       location.href = url;
       return false;
    });
</script>
<?php richardfan\widget\JSRegister::end();?>
<?php 
    $this->registerCss("
        .main-box{
            width: 100%;
            height: 159px;
            border: 2px #c2c2c2;
            border-style: dashed;
            border-radius: 5px;
            font-size: 50pt;
        }

    ")
?>