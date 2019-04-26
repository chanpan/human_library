<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = Yii::$app->name;
$storage = isset(Yii::$app->params['storageUrl'])?Yii::$app->params['storageUrl']:'';
 
?>
<div class="text-center">
    <h1><b><?= $this->title; ?></b></h1>
</div><hr/>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
            <button data-url="<?= Url::to(['/user/index'])?>" title="ผู้ใช้" class="add-show-form cn_btn_upload_file main-box"> 
                <img src="<?= "{$storage}/images/user.png"?>"/>
                <div class="box-text">ผู้ใช้</div>
            </button>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
            <button data-url="<?= Url::to(['/advertisement/index'])?>" title="ข่าวประกาศ" class="add-show-form cn_btn_upload_file main-box"> 
                <img src="<?= "{$storage}/images/new.png"?>"/>
                <div class="box-text">ข่าวประกาศ</div>
            </button>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
            <button data-url="<?= Url::to(['/book/index'])?>" title="การบรรยาย" class="add-show-form cn_btn_upload_file main-box"> 
                <img src="<?= "{$storage}/images/book.png"?>"/>
                <div class="box-text">การบรรยาย</div>
            </button>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
            <button data-url="<?= Url::to(['/events/index'])?>" title="กิจกรรม" class="add-show-form cn_btn_upload_file main-box"> 
                <img src="<?= "{$storage}/images/slider.png"?>"/>
                <div class="box-text">ภาพสไลด์</div>
            </button>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
            <button data-url="<?= Url::to(['/events/index'])?>" title="กิจกรรม" class="add-show-form cn_btn_upload_file main-box"> 
                <img src="<?= "{$storage}/images/image_and_video.png"?>"/>
                <div class="box-text">ภาพ/วีดีโอกิจกรรม</div>
            </button>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
            <button data-url="<?= Url::to(['/info/index'])?>" title="ข้อมูลผู้จัดทำ" class="add-show-form cn_btn_upload_file main-box"> 
                <img src="<?= "{$storage}/images/info.png"?>"/>
                <div class="box-text">ข้อมูลผู้จัดทำ</div>
            </button>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
            <button data-url="<?= Url::to(['/assessment-form/index'])?>" title="แบบประเมิน" class="add-show-form cn_btn_upload_file main-box"> 
                <img src="<?= "{$storage}/images/form.png"?>"/>
                <div class="box-text">แบบประเมิน</div>
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
            background: whitesmoke;
            transition: .5s ease;
        }
        .main-box:hover{
            background:#d8d8d8;
        }
        .box-text{
            font-size: 18px;font-weight: bold;
        }

    ")
?>