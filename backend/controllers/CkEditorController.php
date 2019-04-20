<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;
use yii\web\UploadedFile;
use Yii;
/**
 * Description of CkEditorController
 *
 * @author chanpan
 */
class CkEditorController extends \yii\web\Controller {
    public function actionUpload() {
       // \appxq\sdii\utils\VarDumper::dump(\Yii::getAlias('@storage'));
        $uploadedFile = UploadedFile::getInstanceByName('upload');
        //\appxq\sdii\utils\VarDumper::dump($uploadedFile->tempName);
        $mime = \yii\helpers\FileHelper::getMimeType($uploadedFile->tempName);
        //\appxq\sdii\utils\VarDumper::dump($mime);
        $file = time() . "_" . $uploadedFile->name;

        $user_id = Yii::$app->user->getId();
        $storage_url = isset(Yii::$app->params['storageUrl'])?Yii::$app->params['storageUrl']:'';
        
        $url = $storage_url.'/uploads/' . $user_id . '/' . $file;
        $uploadPath = Yii::getAlias('@storage') . '/web/uploads/' . $user_id . '/' . $file;

        if (!is_dir(Yii::getAlias('@storage') . '/web/uploads/' . $user_id)) { //ถ้ายังไม่มี folder ให้สร้าง folder ตาม user id
            mkdir(Yii::getAlias('@storage') . '/web/uploads/' . $user_id);
        }

        //ตรวจสอบ
        if ($uploadedFile == null) {
            $message = "ไม่มีไฟล์ที่ Upload";
        } else if ($uploadedFile->size == 0) {
            $message = "ไฟล์มีขนาด 0";
        } else if ($mime != "image/jpeg" && $mime != "image/png" && $mime != "image/gif") {
            $message = "รูปภาพควรเป็น JPG หรือ PNG";
        } else if ($uploadedFile->tempName == null) {
            $message = "มีข้อผิดพลาด";
        } else {
            $message = "";
            $move = $uploadedFile->saveAs($uploadPath);
            if (!$move) {
                $message = "ไม่สามารถนำไฟล์ไปไว้ใน Folder ได้กรุณาตรวจสอบ Permission Read/Write/Modify";
            }
        }
        $funcNum = $_GET['CKEditorFuncNum'];
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    }

}
