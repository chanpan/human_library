<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>

<div class="col-md-2">
    <?php 
        if ($model->photo) {
            $url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
            echo Html::img("{$url}/files/{$model->photo}", [
                        'class' => 'img img-responsive img-rounded',
                        'style' => 'width:100px;'
            ]);
        }
    ?>
</div>
<div class="col-md-10">
    <div><?= $model->title; ?></div>
    <div>
        <span><i class="glyphicon glyphicon-calendar"></i> วันที่เผยแพร่ : <?= appxq\sdii\utils\SDdate::mysql2phpThDateTime($model->create_date)?></span>
        <span><i class="glyphicon glyphicon-user"></i> โดย : <?= backend\classes\CNUser::get_fullname_by_user_id($model->create_by)?></span>
    </div>
    <div>
       <a href="<?= Url::to(['/site/news-detail?id='.$model->id])?>"> อ่านเพิ่มเติม</a>
    </div>
</div>
