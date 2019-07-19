<?php

use yii\helpers\Html;
use yii\helpers\Url;

$user_id = \backend\classes\CNUser::get_user_id();
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>กิจกรรมการบรรยาย</h3> <hr/>
        <?php foreach ($model as $k => $v): ?>
            <div class="row" style="margin-top:10px;">
                <a href="<?= Url::to(["/site/event-detail?id={$v->id}"]) ?>" style="color:#000;">
                    <div class="col-md-2 col-xs-2 col-xs-2">
                        <?php
                        if ($v->file) {
                            $url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
                            echo Html::img("{$url}/files/{$v->file}", [
                                'class' => 'img img-responsive',
                                'style' => 'width:100px;'
                            ]);
                        }
                        ?>  
                    </div>
                    <div class="col-md-8 col-xs-8 col-xs-8">
                        <div>
                            <h4><?= isset($v->title) ? $v->title : '' ?></h4>
                            <div>
                                <span><i class="glyphicon glyphicon-calendar"></i> วันที่เผยแพร่ :  <?= appxq\sdii\utils\SDdate::mysql2phpThDateTimeFull($v->create_date) ?></span>&nbsp;&nbsp;
                                <span><i class="glyphicon glyphicon-user"></i> โดย : <?= \backend\classes\CNUser::get_fullname_by_user_id($user_id) ?></span>
                            </div>
                            
                        </div>    
                    </div> 
                    <div class="col-md-12">
                        <hr/>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

    </div>
</div>