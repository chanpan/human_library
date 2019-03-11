<?php
namespace backend\classes;
class CNUser {
    public static function get_fullname_by_user_id($user_id){
        $user = \common\models\User::findOne($user_id);
        if($user){
            $firstname = isset($user['firstname'])?$user['firstname']:'';
            $lastname = isset($user['lastname'])?$user['lastname']:'';
            return "{$firstname} {$lastname}";
        }
    }
    public static function get_user_id(){
        return isset(\Yii::$app->user->id)?\Yii::$app->user->id:'';
    }
}
