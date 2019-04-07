<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Book */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'การบรรยาย', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i> ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           [
                'format'=>'raw',
                'label'=>'รูปภาพผู้บรรยาย',
                'value'=>function($model){
                    if ($model->user_image) {
                        $url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
                        return Html::img("{$url}/files/{$model->user_image}", [
                            'class' => 'img img-responsive',
                            'style'=>'width:50px;'
                            ]);
                    }
                }
            ],
            'user_name',        
            'title',
            
            [
                'format'=>'raw',
                'attribute'=>'detail',
                'value'=>function($model){
                    return $model->detail;
                }
            ],  
            
            [
                'format'=>'raw',
                'attribute'=>'date',
                'value'=>function($model){
                    if ($model->date) {
                        return appxq\sdii\utils\SDdate::mysql2phpDateTime($model->date);
                    }
                    return '';
                }
            ],   
            'create_by',
            
            [
                'format'=>'raw',
                'attribute'=>'create_date',
                'value'=>function($model){
                    if ($model->create_date) {
                        return appxq\sdii\utils\SDdate::mysql2phpDateTime($model->create_date);
                    }
                    return '';
                }
            ],           
            'forder',
        ],
    ]) ?>

</div>
