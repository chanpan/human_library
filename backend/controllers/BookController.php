<?php

namespace backend\controllers;

use Yii;
use backend\models\Book;
use backend\models\BookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
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
        
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
       
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Book();

        if ($model->load(Yii::$app->request->post())) {
            
            $file = \yii\web\UploadedFile::getInstance($model, 'user_image');
            if($file){
                $path = \Yii::getAlias('@storage') . '/web/files';
                $new_file_name = time() . '.' . $file->extension;
                $file->saveAs("{$path}/{$new_file_name}");
                $model->user_image = $new_file_name;
            }
            $model->create_date = date('Y-m-d H:i:s');
            $model->create_by = \backend\classes\CNUser::get_user_id();
            if($model->save()){
                \Yii::$app->session->setFlash('success', "เพิ่มการบรรยาย {$model->title} สำเร็จ");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);
        \Yii::$app->session['user_image']=$model->user_image; //session เก็บค่า file
        if ($model->load(Yii::$app->request->post())) {
            
            $file = \yii\web\UploadedFile::getInstance($model, 'user_image');
            if($file){
                $path = \Yii::getAlias('@storage') . '/web/files';
                if(\Yii::$app->session['file'] != ''){
                    $file_name = \Yii::$app->session['user_image'];
                    @unlink("{$path}/{$file_name}");
                }
                $new_file_name = time() . '.' . $file->extension;
                $file->saveAs("{$path}/{$new_file_name}");
                $model->user_image = $new_file_name;
            }else{
                $model->user_image = \Yii::$app->session['user_image'];
            } 
            
            $model->create_date = date('Y-m-d H:i:s');
            $model->create_by = \backend\classes\CNUser::get_user_id();
            if($model->save()){
                \Yii::$app->session->setFlash('success', "แก้ไขการบรรยาย {$model->title} สำเร็จ");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Book model.
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
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
