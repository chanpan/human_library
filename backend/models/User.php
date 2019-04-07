<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username ชื่อผู้ใช้
 * @property string $password รหัสผ่าน
 * @property string $email อีเมล
 * @property int $status
 * @property int $created_at สร้างโดย
 * @property int $updated_at แก้ไขโดย
 * @property string $firstname ชื่อ
 * @property string $lastname นามสกุล
 * @property string $tel เบอร์โทรศัพท์
 * @property string $role บทบาท
 */
class User extends \yii\db\ActiveRecord
{
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
            [['username', 'password', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'firstname', 'lastname'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 32],
            [['tel'], 'string', 'max' => 10],
            [['role'], 'string', 'max' => 100],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'ชื่อผู้ใช้',
            'password' => 'รหัสผ่าน',
            'email' => 'อีเมล',
            'status' => 'Status',
            'created_at' => 'สร้างโดย',
            'updated_at' => 'แก้ไขโดย',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'tel' => 'เบอร์โทรศัพท์',
            'role' => 'บทบาท',
        ];
    }
}
