
<div class="main-menu">
    <nav>
        <?php
        echo yii\widgets\Menu::widget([
            'items' => isset(\Yii::$app->params['navbar-header-left']) ? \Yii::$app->params['navbar-header-left'] : [],
            'options' => ['class' => 'cnmenu'],
            'encodeLabels' => false,
        ]);
        ?>
    </nav>
</div>