<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

\cpn\chanpan\assets\bootbox\BootBoxAsset::register($this);
cpn\chanpan\assets\notify\NotifyAsset::register($this);

frontend\themes\cnred\assets\CNRedAssets::register($this);
$moduleID = (isset(Yii::$app->controller->module->id) && Yii::$app->controller->module->id != 'app-backend') ? Yii::$app->controller->module->id : '';
$controllerID = isset(Yii::$app->controller->id) ? Yii::$app->controller->id : '';
$actionID = isset(Yii::$app->controller->action->id) ? Yii::$app->controller->action->id : '';

\frontend\components\AppComponent::navbarHeaderLeftMenu($moduleID, $controllerID, $actionID);
\frontend\components\AppComponent::navbarHeaderRightMenu($moduleID, $controllerID, $actionID);
$baseUrl = $this->theme->baseUrl;;

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="9v_H1b0c-nzHnLSaRf83yfORpz-vU8V-IZZjR3HzX3Y" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
        
        <?php $this->head() ?>
        <link href="<?= $baseUrl; ?>/css/style.css" rel="stylesheet">
    </head>
    <body class="common-home ltr layout-1 pattern-6">
        <?php $this->beginBody() ?>

        <div id="wrapper" class="home-indicator-style-two">
            <!-- Header Area Start -->
            <header class="header-area header-2">
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 hidden-xs">
                                <div class="header-top-left">
                                    <ul>
                                        <li><a href="<?= yii\helpers\Url::toRoute('/')?>">Human Library</a></li>
                                      
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-8 hidden-xs">
                                <div class="header-top-right">
                                    <?php 
                                        echo yii\widgets\Menu::widget([
                                        'items' => isset(\Yii::$app->params['navbar-header-right']) ? \Yii::$app->params['navbar-header-right'] : [],
                                        'options' => ['class' => 'list-inline user-menu pull-right'],
                                        'encodeLabels' => false,
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-middle">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-3">
                                <div class="header-logo">
                                    <a href="<?= yii\helpers\Url::to(['/'])?>">
                                        <?php 
                                            $imagePath = isset(Yii::$app->params['storageUrl']) ? Yii::$app->params['storageUrl'] : '';
                                            $image = "{$imagePath}/images/store.png";
                                            $image = isset(\Yii::$app->params['logo']) ? \Yii::$app->params['logo'] : '';
                                        ?>
                                        <img src="http://storage.human.local/images/book.png" alt="" id="img-logo" />
                                    </a>
                                </div>
                            </div>  
                            <div class="col-sm-8 col-xs-6">
                                <?= $this->render('_search')?>
                            </div>
                            
                            <!-- Mobile Menu Start -->
                            <div class="mobile-menu-area">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="mobile-menu">
                                                <nav id="dropdown">
                                                    
                                                   <?php
                                                        echo yii\widgets\Menu::widget([
                                                            'items' => isset(\Yii::$app->params['navbar-header-left']) ? \Yii::$app->params['navbar-header-left'] : [],
                                                            'options' => ['class' => 'cnmenu'],
                                                            'encodeLabels' => false,
                                                        ]);
                                                    ?>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>		
                            <!-- Mobile Menu End -->
                        </div>
                    </div>
                </div>
                
            </header>
            <!-- Header Area End -->
            
            
            <div class="content" id="content">

                <div class="container">
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                <?= $content; ?>
                </div>
                
                <footer class="container footer">
                    <?php 
                       echo isset(\Yii::$app->params['footer'])?\Yii::$app->params['footer']:'<div class="text-center">&copy; copyright Human Library </div>'
                    ?>
                </footer>
            </div>
               	
        </div>	

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
