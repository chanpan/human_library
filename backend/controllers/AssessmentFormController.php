<?php

namespace backend\controllers;

use Yii;
use common\models\AssessmentForm;
use backend\models\AssessmentFormSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssessmentFormController implements the CRUD actions for AssessmentForm model.
 */
class AssessmentFormController extends Controller
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
        
        $searchModel = new AssessmentFormSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssessmentForm model.
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
     * Creates a new AssessmentForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new AssessmentForm();

        if ($model->load(Yii::$app->request->post())) {
            $model->create_date = date('Y-m-d H:i:s');
            $model->create_by = \backend\classes\CNUser::get_user_id();
            if($model->save()){
                return $this->redirect(['index']);
            }
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    public function actionCreateLevel1()
    {
         
        $model = new \common\models\AssessmentFormL1();
        return $this->render('create-level1', [
            'model'=>$model
        ]);
    }

    /**
     * Updates an existing AssessmentForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
       
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssessmentForm model.
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
     * Finds the AssessmentForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssessmentForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
       
        if (($model = AssessmentForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
