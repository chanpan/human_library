<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id รหัสไฟล์
 * @property int $event_id ชื่อกิจกรรม
 * @property string $file_name ชื่อไฟล์
 * @property string $file_name_origin ชื่อไฟล์ต้นฉบับ
 * @property int $forder เรียงลำดับไฟล์
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'event_id', 'forder','created_by'], 'integer'],
            [['file_name', 'file_name_origin'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสไฟล์',
            'event_id' => 'ชื่อกิจกรรม',
            'file_name' => 'ชื่อไฟล์',
            'file_name_origin' => 'ชื่อไฟล์ต้นฉบับ',
            'forder' => 'เรียงลำดับไฟล์',
        ];
    }
}
