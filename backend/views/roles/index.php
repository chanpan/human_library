<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RolesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บทบาท';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ', ['/user/index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มบทบาท', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',
                'headerOptions'=>['style'=>'width:80px;text-align:center;']
            ],
        ],
    ]); ?>
</div>
