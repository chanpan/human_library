<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    
    public function actionIndex()
    {
       if(\backend\classes\CNUser::isGuast()){
           return $this->redirect(['/site/login']);
       }
       $roles = \backend\classes\CNUser::can_admin(Yii::$app->session['user_id']);
       //\appxq\sdii\utils\VarDumper::dump($roles);
       return $this->render('index');
    }
    public function actionAccessDenine()
    {
       return $this->render('access-denine');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (isset(Yii::$app->session['user_id'])) {
            return $this->goHome();
        }
        $error = '';
        $model = new LoginForm();
        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post('LoginForm');
            $username = $data['username'];
            $password = $data['password'];

            $user = \backend\models\User::find()->where('username=:username AND password=:password',[
                ':username'=>$username,
                ':password'=>$password
            ])->one();
            if($user){
                Yii::$app->session['user_id']=$user['id'];
                return $this->goHome();
            }
            $error = 'กรุณาตรวจสอบ Username หรือ Password';
        }  
        return $this->render('login', [
                    'model' => $model,
                    'error' => $error
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        unset(Yii::$app->session['user_id']);

        return $this->redirect(['/site/login']);
    }
}
