<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\InfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลผู้จัดทำ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a("<i class='glyphicon glyphicon-plus'></i> เพิ่ม ข้อมูลผู้จัดทำ", ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'], 
            'name',
            //'detail:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
