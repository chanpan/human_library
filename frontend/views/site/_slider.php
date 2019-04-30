<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <?php
    $image = \backend\models\Banners::find()->orderBy(['forder' => SORT_ASC])->all();
    $url = isset(\Yii::$app->params['storageUrl']) ? \Yii::$app->params['storageUrl'] : '';
    ?> 
    <ol class="carousel-indicators">
        <?php foreach ($image as $k => $v): ?>  
            <?php if ($k == 0): ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?= $k; ?>" class="active"></li>
            <?php else: ?>  
                <li data-target="#carousel-example-generic" data-slide-to="<?= $k; ?>"></li> 
            <?php endif; ?>
        <?php endforeach; ?>  
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox"> 
        <?php foreach ($image as $k => $v): ?>
            <?php if ($k == 0): ?>
                <div class="item active">
                <?php else: ?>      
                    <div class="item">
                    <?php endif; ?>
                    	<a href='<?= \yii\helpers\Url::to([$v['url']])?>' target='_BLANK'> <img src="<?= "{$url}/files/{$v->photo}"; ?>" alt="..."></a>
                    <div class="carousel-caption">

                    </div>
                </div>
            <?php endforeach; ?>  


        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br/>
