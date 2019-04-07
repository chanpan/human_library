<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ใช้';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มผู้ใช้', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('เพิ่มบทบาท <i class="glyphicon glyphicon-arrow-right"></i> ', ['/roles/index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
//            'password',
            'email:email',
//            'status',
            //'created_at',
            //'updated_at',
            'firstname',
            'lastname',
            'tel',
            [
                'format'=>'raw',
                'attribute'=>'role',
                'value'=>function($model){
                    $role_name = '';
                    $roles = \appxq\sdii\utils\SDUtility::string2Array($model['role']);
                    $roles = backend\models\Roles::find()->where(['id'=>$roles])->all();
                    foreach($roles as $k=>$v){
                        $role_name .= "<label class='label label-default'>{$v['name']}</label> ";
                    }
                    return $role_name;
                    \appxq\sdii\utils\VarDumper::dump($role_name);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',
                'headerOptions'=>['style'=>'width:80px;text-align:center;']
            ],
        ],
    ]); ?>
</div>
