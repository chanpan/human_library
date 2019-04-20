<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ภาพ Slide');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banners-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a(Yii::t('app', 'เพิ่ม ภาพ Slide'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['contentOptions'=>['style'=>'width:100px;text-align:center;margin:0 auto'],'class' => 'yii\grid\SerialColumn'],

            [
                'contentOptions'=>['style'=>'width:100px;text-align:center;margin:0 auto'],
                'format'=>'raw',
                'attribute'=>'photo',
                'value'=>function($model){
                    if ($model->photo) {
                        $url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
                        return Html::img("{$url}/files/{$model->photo}", [
                            'class' => 'img img-responsive',
                            'style'=>'width:50px;margin:0 auto;'
                            ]);
                    }
                }
            ],
            [
                'contentOptions'=>['style'=>'width:100px;text-align:center;margin:0 auto'],
                'format'=>'raw',
                'attribute'=>'forder',
                'value'=>function($model){
                    return $model->forder;
                }
            ],        
             

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',
                'headerOptions'=>['style'=>'width:100px;text-align:center;']
        ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
