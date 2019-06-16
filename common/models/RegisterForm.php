<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "register_form".
 *
 * @property int $id
 * @property int $user_id รหัสผู้ใช้
 * @property string $name ชื่อนามสกุล
 * @property string $tel เบอร์โทรศัพท์
 * @property string $user_type ประเภทผู้ใช้
 * @property string $department หน่วยงาน
 * @property string $email อีเมล์
 */
class RegisterForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'register_form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'department','user_type','tel','email'], 'required'],
            [['user_id','event_id'], 'integer'],
            [['name', 'department'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 10],
            [['user_type', 'email'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'รหัสผู้ใช้',
            'name' => 'ชื่อนามสกุล',
            'tel' => 'เบอร์โทรศัพท์',
            'user_type' => 'ประเภทผู้ใช้',
            'department' => 'หน่วยงาน',
            'email' => 'อีเมล์',
        ];
    }
}
