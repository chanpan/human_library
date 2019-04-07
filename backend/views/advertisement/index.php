<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdvertisementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข่าวประชาสัมพันธ์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มข่าวประชาสัมพันธ์', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'detail:ntext',
           // 'create_by',
           // 'create_date',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',
                'headerOptions'=>['style'=>'width:100px;text-align:center;']
        ],
        ],
    ]); ?>
</div>
