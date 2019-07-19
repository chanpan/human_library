<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id รหัสกิจกรรม
 * @property string $title ชื่อกิจกรรม
 * @property string $detail รายละเอียดกิจกรรม
 * @property int $create_at สร้างโดย
 * @property string $create_date สร้างวันที่
 * @property int $update_at แก้ไขโดย
 * @property string $update_date แก้ไขเมื่อวันที่
 * @property int $rstat สถานะ
 * @property int $forder เรียงลำดับ
 * @property int $event_type ประเภทกิจกรรม
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['create_at', 'update_at', 'rstat', 'forder', 'event_type'], 'integer'],
            [['detail'], 'string'],
            [['create_date', 'update_date','time_start'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['id'], 'unique'],
            [['file'], 'file','maxFiles' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสกิจกรรม',
            'title' => 'ชื่อกิจกรรม',
            'detail' => 'รายละเอียดกิจกรรม',
            'create_at' => 'สร้างโดย',
            'create_date' => 'สร้างวันที่',
            'update_at' => 'แก้ไขโดย',
            'update_date' => 'แก้ไขเมื่อวันที่',
            'rstat' => 'สถานะ',
            'forder' => 'เรียงลำดับ',
            'event_type' => 'ประเภทกิจกรรม',
            'file'=>'ภาพขนาดเล็ก',
            'time_start'=>'เวลา'
        ];
    }
}
