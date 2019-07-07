<?php

?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div>
            <a class="" href="<?= \yii\helpers\Url::to(['/site/news'])?>"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</a>
        </div>
        <br/><label><?= $model->title; ?></label><hr/>
        <div style="overflow: hidden;">
            <?= $model->detail; ?>
        </div>
    </div>
</div> 
 