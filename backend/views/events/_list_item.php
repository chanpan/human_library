<?php

use yii\helpers\Html;
use yii\helpers\Url;

$user_id = \backend\classes\CNUser::get_user_id();
?>
<div class="row" style="margin-top:10px;">
    <a href="<?= Url::to(["/events/view?id={$model->id}"])?>" style="color:#000;">
        <div class="col-md-2 col-xs-2 col-xs-2 text-center">
            <?php
            if ($model->file) {
                $url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
                echo Html::img("{$url}/files/{$model->file}", [
                    'class' => 'img img-responsive',
                    'style'=>'width:100px;margin:0 auto'
                    ]);
            }
            ?>  
        </div>
        <div class="col-md-8 col-xs-8 col-xs-8">
            <div>
                <h4><?= isset($model->title) ? $model->title : '' ?></h4>
                <div>
                    <span><i class="glyphicon glyphicon-calendar"></i> วันที่เผยแพร่ :  <?= appxq\sdii\utils\SDdate::mysql2phpThDateTimeFull($model->create_date) ?></span>&nbsp;&nbsp;
                    <span><i class="glyphicon glyphicon-user"></i> โดย : <?= \backend\classes\CNUser::get_fullname_by_user_id($user_id) ?></span>
                    <span class="pull-right">
                        <a href="<?= \yii\helpers\Url::to(["/events/update?id={$model->id}"]) ?>" ><i class="glyphicon glyphicon-pencil"></i> แก้ไข</a> |
                        <a href="<?= \yii\helpers\Url::to(["/events/update?id={$model->id}"]) ?>" ><i class="glyphicon glyphicon-trash"></i> ลบ</a>
                    </span>
                </div>
                <hr/>
                <div><?= isset($model->detail) ? $model->detail : '' ?></div>
            </div>    
        </div> 
        <div class="col-md-12">
            <hr/>
        </div>
    </a>
</div>

