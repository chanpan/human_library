 <?php 
    $this->title = 'รายละเอียดกิจกรรม';
    $storage = isset(Yii::$app->params['storageUrl'])?Yii::$app->params['storageUrl']:'';
 ?>
<h4><?= isset($model->title) ? $model->title : '' ?></h4>