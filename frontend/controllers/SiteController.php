<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
      
    public function actionIndex()
    {
        $search = Yii::$app->request->get('search', ''); 
        $model =  \backend\models\Book::find();
        if($search != ''){
            $model = $model->where('title LIKE :title OR detail LIKE :detail',
                    [":title"=>"%{$search}%", ":detail"=>"%{$search}%"]);
        } 
        $model = $model->all(); 
        $this->save_view_count();
        
        
        $event = \backend\models\Events::find()->limit(50)->all(); 
        $news = \backend\models\Advertisement::find()->orderBy(['id'=>SORT_DESC])->limit(4)->all();
        $news2 = \backend\models\Advertisement::find()->orderBy(['id'=>SORT_DESC])->limit(50)->all();
        
        return $this->render('index', [
            'model'=>$model,
            'event'=>$event,
            'news'=>$news,
            'news2'=>$news2
        ]);
    }
public function actionView(){
    $id = Yii::$app->request->get('id', '');
     
    $model = \backend\models\Book::findOne($id);
    return $this->render('view',['model'=>$model]);
}
public function actionEvent(){
        $search = Yii::$app->request->get('search', '');
        $model = \backend\models\Events::find();
        if ($search != '') {
            $model = $model->where('title LIKE :title OR detail LIKE :detail', [":title" => "%{$search}%", ":detail" => "%{$search}%"]);
        }
        $model = $model->all();
        return $this->render('event', ['model' => $model]);
    }
public function actionEventDetail(){
    $id = Yii::$app->request->get('id', '');
    $model = \backend\models\Events::findOne($id);
    $files = \backend\models\Files::find()->where(['event_id'=>$id])->all();
    return $this->render('event-detail',['model'=>$model,'files'=>$files]);
}    
    /**
     * Logs in a user.
     *
     * @return mixed
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
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        unset(Yii::$app->session['user_id']);

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model= new \backend\models\User();
        if($model->load(Yii::$app->request->post())){
            $model->role = \appxq\sdii\utils\SDUtility::array2String(["3"]);
            if($model->save()){
                \Yii::$app->session->setFlash('success', "เพิ่มข้อมูลผู้ใช้ {$model->firstname} {$model->lastname} สำเร็จ");
                return $this->redirect(['/site/login']);
            }else{
                \Yii::$app->session->setFlash('success', "เพิ่มข้อมูลผู้ใช้ไม่สำเร็จ");
            }
        }
        return $this->render('signup',[
            'model'=>$model
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    public function actionRegisterForm(){
        //register-form
        $user_id = \backend\classes\CNUser::get_user_id();
        $model = \common\models\RegisterForm::find()->where(['user_id'=>$user_id])->one();
        $event_id = \Yii::$app->request->get('event_id', '');
        $status = true;
        if(!$model){
            $status = false;
            $model = new \common\models\RegisterForm();
        }
        $model->event_id = $event_id;
        if($model->load(Yii::$app->request->post())){
            $model->user_id = \backend\classes\CNUser::get_user_id();
            $model->create_date = date('Y-m-d H:i:s');
            if($model->save()){
               \Yii::$app->session->setFlash('success', 'ลงทะเบียนสำเร็จ'); 
            }
        }
         
        return $this->render('register-form', [
            'model' => $model,
            'user_id'=>$user_id,
            'status'=>$status
        ]);
    }
    public function actionAssessmentForm(){
        $id = Yii::$app->request->get('id', '');
        $model = \common\models\AssessmentForm::find()->all();
        if($id){
            $model = \common\models\AssessmentForm::findOne($id);
        }
        return $this->render('assessment-form', [
            'model'=>$model,
            'id'=>$id
        ]);
    }
    
    public function save_view_count(){
        $model = \common\models\ViewCount::findOne(1);
        $model->count += 1;
        $model->save();
    }
    public function actionVideoDetail(){
        $id = Yii::$app->request->get('id', '');
        $model = \backend\models\Files::findOne($id);
        return $this->render('video-detail', [
            'model'=>$model,
        ]);
    }
    public function actionNews(){
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query'=> \backend\models\Advertisement::find()->orderBy(['id'=>SORT_DESC]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('news',[
            'dataProvider'=>$dataProvider
        ]);
    }
    public function actionNewsDetail(){
        $id = Yii::$app->request->get('id');
        $model = \backend\models\Advertisement::findOne($id);
        return $this->render('news-detail',[
            'model'=>$model
        ]);
    }
    //
    //
}
