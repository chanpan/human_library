<?php

namespace frontend\components; 
use Yii;
use yii\base\Component;
use yii\web\UnauthorizedHttpException;

class AppComponent extends Component {
    
    public function init() {
        parent::init(); 
       
        Yii::setAlias('storageUrl', isset(Yii::$app->params['storageUrl'])?Yii::$app->params['storageUrl']:'');
        Yii::setAlias('backendUrl', isset(Yii::$app->params['backendUrl'])?Yii::$app->params['backendUrl']:'');
        Yii::setAlias('frontendUrl', isset(Yii::$app->params['frontendUrl'])?Yii::$app->params['frontendUrl']:'');
//        //$params = \common\modules\cores\classes\CoreQuery::getOptionsParams();
//        Yii::$app->params = \yii\helpers\ArrayHelper::merge(Yii::$app->params, $params);
        self::logo();
//         
//        \frontend\classes\KNThemes::getThemes();
       
    }
    
    public static function logo() { 
        $logo = isset(\Yii::$app->params['logo'])?\Yii::$app->params['logo']:'';
        return \Yii::$app->params['logo'] = $logo;
    }
    
    
    public static function navbarHeaderLeftMenu($moduleID, $controllerID, $actionID) {
         
        
    }
    public static function navbarHeaderRightMenu($moduleID, $controllerID, $actionID) {
        //\appxq\sdii\utils\VarDumper::dump($moduleID);
        
        if (isset(\Yii::$app->session['user_id'])) {
            $fname = isset(\Yii::$app->user->identity->profile->firstname) ? \Yii::$app->user->identity->profile->firstname : '';
            $lname = isset(\Yii::$app->user->identity->profile->lastname) ? \Yii::$app->user->identity->profile->lastname : '';
            $fullName = \backend\classes\CNUser::get_fullname_by_user_id(\Yii::$app->session['user_id']);
            
        }
        $navbar = \Yii::$app->params['navbar-header-right'] = [
            ['label' => "<img src='".yii\helpers\Url::to(['@web/img/home.png'])."' style='width: 25px;'> หน้าหลัก", 'url' => ['/site/index']],
            ['label' => "<img src='".yii\helpers\Url::to(['@web/img/event.png'])."' style='width: 25px;'> กิจกรรมการบรรยาย", 'url' => ['/site/event']],

            ['label' => "<img src='".yii\helpers\Url::to(['@web/img/news.png'])."' style='width: 25px;'> ข่าวประกาศ", 'url' => ['/site/news']],
            ['label' => "<img src='".yii\helpers\Url::to(['@web/img/form.png'])."' style='width: 25px;'>  แบบประเมินผลออนไลน์", 'url' => ['/site/assessment-form'],'visible' => isset(\Yii::$app->session['user_id'])],
            ['label' => isset($fullName) ? "Logout({$fullName})" : 'ข้อมูลส่วนตัว', 
                'options'=>[
                    'class'=>'menu-item wish-list'
                ], 
                'url' => ['/site/logout'], 
                'visible' => isset(\Yii::$app->session['user_id']) , 
                'active'=>($moduleID == 'user' && $controllerID == 'settings') ? true : false],
                    
            ['label' => 'สมัครใหม่', 'url' => ['/site/signup'], 'options'=>['class'=>'menu-item wish-list'] ,'active'=>($moduleID == 'user' && $actionID == 'register') ? true : false,'visible' => !isset(\Yii::$app->session['user_id'])],
            ['label' => 'เข้าสู่ระบบ', 'url' => ['/site/login'], 'options'=>['class'=>'menu-item wish-list'], 'active'=>($moduleID == 'user' && $actionID == 'login')?true:false,'visible' => !isset(\Yii::$app->session['user_id'])],
        ];
        return $navbar;
    } 
    
}
