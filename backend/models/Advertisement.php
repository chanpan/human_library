<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "advertisement".
 *
 * @property int $id รหส
 * @property string $title หัวข้อข่าวประชาสัมพันธ์
 * @property string $detail รายละเอียดประชาสัมพันธ์
 * @property int $create_by สร้างโดย
 * @property string $create_date สร้างวันที่
 */
class Advertisement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertisement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'detail'], 'required'],
            [['detail'], 'string'],
            [['create_by'], 'integer'],
            [['create_date','photo'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหส',
            'title' => 'หัวข้อข่าวประชาสัมพันธ์',
            'detail' => 'รายละเอียดประชาสัมพันธ์',
            'create_by' => 'สร้างโดย',
            'create_date' => 'สร้างวันที่',
            'photo'=>'รูปภาพข่าว'
        ];
    }
}
