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
       // \appxq\sdii\utils\VarDumper::dump(\Yii::$app->authManager->getRolesByUser(1));
        return $this->render('index');
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
        } else {
            return $this->render('login', [
                'model' => $model,
                'error'=>$error
            ]);
        }
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
