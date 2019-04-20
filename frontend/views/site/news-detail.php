<?php

?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <a class="btn btn-default" href="<?= \yii\helpers\Url::to(['/site/news'])?>"><i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ</a>
        <h2><?= $model->title; ?></h2>
        <div style="overflow: hidden;">
            <?= $model->detail; ?>
        </div>
    </div>
</div> 
 