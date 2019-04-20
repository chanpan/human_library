<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id รหัสการบรรยาย
 * @property string $title หัวข้อการบรรยาย
 * @property string $detail รายละเอียดการบรรยาย
 * @property string $user_name ชื่อผู้บรรยาย
 * @property string $user_image รูปภาพผู้บรรยาย
 * @property string $date เวลาจัดการการบรรยาย
 * @property int $create_by สร้างโดย
 * @property string $create_date สร้างเมื่อ
 * @property int $forder ลำดับที่
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','detail','user_name'], 'required'],
            [['detail'], 'string'],
            [['date', 'create_date','time_start','time_stop','location'], 'safe'],
            [['create_by', 'forder'], 'integer'],
            [['title', 'user_name', 'user_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสการบรรยาย',
            'title' => 'หัวข้อการบรรยาย',
            'detail' => 'รายละเอียดการบรรยาย',
            'user_name' => 'ชื่อผู้บรรยาย',
            'user_image' => 'รูปภาพผู้บรรยาย',
            'date' => 'วันที่จัดการการบรรยาย',
            'create_by' => 'สร้างโดย',
            'create_date' => 'สร้างเมื่อ',
            'forder' => 'ลำดับที่',
            'location'=>'สถานที่จัดงาน',
            'time_start'=>'เวลาจัดกิจกรรม'
        ];
    }
}
