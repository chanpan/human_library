<?php

namespace backend\controllers;

use Yii;
use backend\models\Events;
use backend\models\EventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventsController implements the CRUD actions for Events model.
 */
class EventsController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Events model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
         $files = \backend\models\Files::find()->where('event_id = :event_id', [':event_id'=>$id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'files'=>$files
        ]);
    }

    /**
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Events();
        $event_type = \Yii::$app->request->get('event_type', '1');
        if ($model->load(Yii::$app->request->post())) {
            $file = \yii\web\UploadedFile::getInstance($model, 'file');
            $model->id = time();
            $model->rstat = 1;
            $model->create_at = \backend\classes\CNUser::get_user_id();
            $model->update_at = \backend\classes\CNUser::get_user_id();;
            $model->create_date = date('Y-m-d H:i:s');
            $path = \Yii::getAlias('@storage') . '/web/files';
            $new_file_name = time() . '.' . $file->extension;
            $file->saveAs("{$path}/{$new_file_name}");
            $model->file = $new_file_name;
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', "เพิ่มกิจกรรม {$model->title} สำเร็จ");
                return $this->redirect(['index']);
            }
        }
        $model->event_type = $event_type;
        return $this->render('create', [
                    'model' => $model
        ]);
    }

    /**
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $event_type = \Yii::$app->request->get('event_type', '1');
        \Yii::$app->session['file']=$model->file; //session เก็บค่า file
        
        if ($model->load(Yii::$app->request->post())) {
            $file = \yii\web\UploadedFile::getInstance($model, 'file');
            
            $model->id = time();
            $model->rstat = 1;
            $model->update_at = isset(\Yii::$app->user->id) ? \Yii::$app->user->id : '';
            $model->update_date = date('Y-m-d H:i:s');
            if($file){
                $path = \Yii::getAlias('@storage') . '/web/files';
                
                if(\Yii::$app->session['file'] != ''){
                    $file_name = \Yii::$app->session['file'];
                    @unlink("{$path}/{$file_name}");
                    //\appxq\sdii\utils\VarDumper::dump($model);
                }
                
                $new_file_name = time() . '.' . $file->extension;
                $file->saveAs("{$path}/{$new_file_name}");
                $model->file = $new_file_name;
            }else{
                $model->file = \Yii::$app->session['file'];
            }
            if ($model->save()) {
                unset(\Yii::$app->session['file']); //clear session
                \Yii::$app->session->setFlash('success', "แก้ไขกิจกรรม {$model->title} สำเร็จ");
                return $this->redirect(['index']);
            }
        }
        $model->event_type = $event_type;
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Events model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
