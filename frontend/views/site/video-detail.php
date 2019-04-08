<?php
    $this->title = $model->file_name;
    $storage = isset(Yii::$app->params['storageUrl']) ? Yii::$app->params['storageUrl'] : '';
    $file_type_video = ['mp4', 'avi', 'gif', 'mov'];
    $file_type = explode('.', $model['file_name']);
?>
<h3><?= $this->title; ?></h3>
<video style="width:100%;" controls="">
    <source src="<?= $storage . '/files/' . $model['file_name'] ?>" type="video/<?= end($file_type) ?>">
</video>
<hr>

<?php 
    $id = Yii::$app->request->get('id','');
    $model = common\models\ViewCountVideo::find()->where(['video_id'=> $id])->one();
    if(!$model){
        $model = new common\models\ViewCountVideo();
        $model->id = time();
        $model->count = 1;
        $model->video_id = $id;
        $model->save();
    }else{
         $model->video_id = $id;
         $model->count += 1;
         $model->save();
    }
?>
<h3>จำนวนการเข้าชม <?= isset($model->count)?$model->count:0?> คน</h3>