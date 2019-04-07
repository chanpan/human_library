<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssessmentFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แปบประเมิน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assessment-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a("<i class='glyphicon glyphicon-plus'></i>  สร้าง แบบประเมิน", ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
