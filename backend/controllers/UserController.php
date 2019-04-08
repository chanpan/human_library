<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
     
    public function actionIndex()
    {
        if(!\backend\classes\CNUser::can_admin()){
            return $this->redirect(['/site/access-denine']);
        }
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!\backend\classes\CNUser::can_admin()){
            return $this->redirect(['/site/access-denine']);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!\backend\classes\CNUser::can_admin()){
            return $this->redirect(['/site/access-denine']);
        }
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            $post = \Yii::$app->request->post('User');
            $model->role = \appxq\sdii\utils\SDUtility::array2String($post['role']);
            //\appxq\sdii\utils\VarDumper::dump($post);
            //explode(" ",$str)  string to array
            //implode(',', $pieces) //array to string
            if($model->save()){
                \Yii::$app->session->setFlash('success', "เพิ่มผู้ใช้ {$model->firstname} {$model->lastname} สำเร็จ");
                return $this->redirect(['index']);
            }
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(!\backend\classes\CNUser::can_admin()){
            return $this->redirect(['/site/access-denine']);
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $post = \Yii::$app->request->post('User');
            $model->role = \appxq\sdii\utils\SDUtility::array2String($post['role']);
            if($model->save()){
                \Yii::$app->session->setFlash('success', "เพิ่มผู้ใช้ {$model->firstname} {$model->lastname} สำเร็จ");
                return $this->redirect(['index']);
            }
        }
         $model->role = \appxq\sdii\utils\SDUtility::string2Array($model->role);
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!\backend\classes\CNUser::can_admin()){
            return $this->redirect(['/site/access-denine']);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(!\backend\classes\CNUser::can_admin()){
            return $this->redirect(['/site/access-denine']);
        }
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
