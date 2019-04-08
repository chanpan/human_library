<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = Yii::$app->name;
$url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
?>