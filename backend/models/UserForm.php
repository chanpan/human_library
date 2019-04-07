<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $firstname ชื่อ
 * @property string $lastname นามสกุล
 * @property string $tel เบอร์โทรศัพท์
 */
class UserForm extends \yii\db\ActiveRecord
{
    public $role, $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['role','password'],'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['firstname', 'lastname'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 10],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'firstname'=>'ชื่อ',
            'lastname'=>'นามสกุล',
            'password'=>'รหัสผ่าน',
            'username'=>'ชื่อผู้ใช้งาน',
            'email'=>'อีเมล์',
            'tel'=>'เบอร์โทรศัพท์',
            'confirm_password'=>'ยืนยันรหัสผ่าน',
            'role'=>'บทบาท'
        ];
    }
}
