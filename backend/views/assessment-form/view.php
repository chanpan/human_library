<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AssessmentForm */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'แบบประเมิน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="assessment-form-view">

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
         <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Level1', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
         <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Level2', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
           [
                'format'=>'raw',
                'attribute'=>'explanation',
                'value'=>function($model){
                    return $model->explanation;
                }
            ], 
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
            'create_by',
        ],
    ]) ?>
    
    <?= $model->detail; ?>

</div>
