<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'กิจกรรมการบรรยาย';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="text-left">
        <?= Html::a("<i class='glyphicon glyphicon-plus'></i>  เพิ่มกิจกรรม", ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= 
        \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'list-wrapper',
                'id' => 'list-wrapper',
            ],
            'layout' => "{items}\n{summary}\n{pager}",
            'itemView' => '_list_item',    
        ]); 
    ?>
    <?php Pjax::end(); ?>
</div>
