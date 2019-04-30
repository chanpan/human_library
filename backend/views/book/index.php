<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การบรรยาย';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a("<i class='glyphicon glyphicon-plus'></i> เพิ่ม การบรรยาย", ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            [
                'format'=>'raw',
                'attribute'=>'date',
                'value'=>function($model){
                        return isset($model->date)?appxq\sdii\utils\SDdate::mysql2phpDate($model->date):'';
                }
            ],        
	    [
		'attribute'=>'time_start',
		'value'=>function($model){ 
			return isset($model->time_start)?$model->time_start:''; 
		}
	    ],            
            'title',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
