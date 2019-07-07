<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;
use Yii;
/**
 * Description of FilesController
 *
 * @author chanpan
 */
class FilesController extends \yii\web\Controller {
    public function beforeAction($action)
    {
      $actions = ['index','create','update','delete','delete-all','view','upload'];
      
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
    
    
    private function getMaxForder(){
        
        $user_id = \backend\classes\CNUser::get_user_id();
        $max = \backend\models\Files::find()->where('created_by=:created_by',[':created_by'=>$user_id])->orderBy(['forder'=>SORT_ASC])->one();
        if($max){
             $max_order = (int)$max['forder']-1;
             if($max_order == 0){
                 $max_order = 100000;
             }
             return $max_order;
        }
        return 100000;
    }
    public function actionUpload() {
       
        ini_set('post_max_size', '11164M');
        ini_set('upload_max_filesize', '11164M');
        $error_arr = [];
        $model = new \backend\models\Files();
        if (\Yii::$app->request->isPost) {
            $files = \yii\web\UploadedFile::getInstancesByName('name');
            $path = Yii::getAlias('@storage') . "/web/files/";
            $event_id = \Yii::$app->request->post('event_id');
            foreach ($files as $k => $file) {
                $new_file_name = date('Ymd_His') . '_' . rand(10, 1000);
                $model->id = time().rand(10, 1000);
                $model->file_name = "{$new_file_name}.{$file->extension}";
                $model->file_name_origin = $file->name;
                $model->forder = $this->getMaxForder();
                $model->created_by = \backend\classes\CNUser::get_user_id();  //get id user on login
                $model->event_id = $event_id;
                if ($file->saveAs("{$path}/{$new_file_name}.{$file->extension}")) {
                    if (!$model->save()) {
                        $error_arr[$k] = ['file_name' => $file->name, 'message' => $model->errors];
                    }
                }
            }//end foreach
            if(!empty($error_arr)){
                return \yii\helpers\Json::encode($error_arr);
            }
            
            return \cpn\chanpan\classes\CNMessage::getSuccess('Upload file success', $error_arr);
        }
        
        $event_id = \Yii::$app->request->get('event_id');
        return $this->renderAjax('upload', [
                    'model' => $model,
                    'event_id' => $event_id
        ]);
    }
    
    public function actionDelete() {
        
        $path = Yii::getAlias('@storage') . "/web/files/";
        $id = \Yii::$app->request->post('id', '');
        //return \yii\helpers\Json::encode(['id'=>$id]);
        $model = \backend\models\Files::findOne($id);
        if($model->delete()){
            @unlink("{$path}/{$model->file_name}");
            return \cpn\chanpan\classes\CNMessage::getSuccess('Success');
        }else{
            return \cpn\chanpan\classes\CNMessage::getError("Error");
        }
        
    }

}
