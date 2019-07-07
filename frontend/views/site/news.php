<?php
    use yii\widgets\ListView;
    $this->title ='ข่าวเเละประกาศ';
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2><?= $this->title; ?></h2> <hr/>
    </div>
</div>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemOptions' => [ 
        'class' => 'col-md-8 col-md-offset-2',
        'style'=>'margin-bottom:10px;border-bottom:1px solid #eeeeee;    padding-bottom: 10px;'
    ],
    'options' => [
        'tag' => 'div',
        'class' => 'row',
    ],
    'layout' => "{items}\n<div class='col-md-8 col-md-offset-2'>{pager}</div>",
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_new_items',['model' => $model]);
        // or just do some echo
        // return $model->title . ' posted by ' . $model->author;
    },
    'pager' => [
        'firstPageLabel' => 'first',
        'lastPageLabel' => 'last',
        'nextPageLabel' => 'next',
        'prevPageLabel' => 'previous',
        'maxButtonCount' => 3,
    ],        
]); 
?>