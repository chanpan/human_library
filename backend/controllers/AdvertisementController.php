<?php

namespace backend\controllers;

use Yii;
use backend\models\Advertisement;
use backend\models\AdvertisementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdvertisementController implements the CRUD actions for Advertisement model.
 */
class AdvertisementController extends Controller
{
    public function beforeAction($action)
    {
      $actions = ['index','create','update','delete','delete-all','view'];
      
      if(in_array($action->id, $actions))
      {
          
         if(\backend\classes\CNUser::isGuast()){
             return $this->redirect(['/site/login']);
         }//ยังไม่ login
         
        if(!\backend\classes\CNUser::can_admin() && !\backend\classes\CNUser::can_manager()){
            return $this->redirect(['/site/access-denine']);
        }
         
      }
      return parent::beforeAction($action);
    }
    public function actionIndex()
    {
        
        $searchModel = new AdvertisementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advertisement model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->redirect(['index']);
        if(!\backend\classes\CNUser::can_admin() && !\backend\classes\CNUser::can_manager()){
            return $this->redirect(['/site/access-denine']);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Advertisement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Advertisement();

        if ($model->load(Yii::$app->request->post())) {
            $file = \yii\web\UploadedFile::getInstance($model, 'photo');
            
            if($file){
                $path = \Yii::getAlias('@storage') . '/web/files';
                $new_file_name = time() . '.' . $file->extension;
                $file->saveAs("{$path}/{$new_file_name}");
                $model->photo = $new_file_name;
            }
            $model->create_by = \backend\classes\CNUser::get_user_id();
            $model->create_date = date('Y-m-d H:i:s');
            if($model->save()){
                    \Yii::$app->session->setFlash('success', "เพิ่มข่าวประชาสัมพันธ์ {$model->title} สำเร็จ");
                    return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Advertisement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
         
        $model = $this->findModel($id);
        \Yii::$app->session['photo']=$model->photo; //session เก็บค่า file
        if ($model->load(Yii::$app->request->post())) {
            $model->create_by = \backend\classes\CNUser::get_user_id();
            $model->create_date = date('Y-m-d H:i:s');
            
            $file = \yii\web\UploadedFile::getInstance($model, 'photo');
            if($file){
                $path = \Yii::getAlias('@storage') . '/web/files';
                if(\Yii::$app->session['file'] != ''){
                    $file_name = \Yii::$app->session['user_image'];
                    @unlink("{$path}/{$file_name}");
                }
                $new_file_name = time() . '.' . $file->extension;
                $file->saveAs("{$path}/{$new_file_name}");
                $model->photo = $new_file_name;
            }else{
                $model->photo = \Yii::$app->session['user_image'];
            }
            
            if($model->save()){
                \Yii::$app->session->setFlash('success', "แก้ไขข่าวประชาสัมพันธ์ {$model->title} สำเร็จ");
                return $this->redirect(['index']);
        }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Advertisement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
         
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advertisement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advertisement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        
        if (($model = Advertisement::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
