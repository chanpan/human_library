<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assessment_form".
 *
 * @property int $id รหัส
 * @property string $title หัวข้อแปบประเมิน
 * @property string $explanation คำชี้แจง
 * @property string $create_date วันที่สร้าง
 * @property int $create_by สร้างโดย
 */
class AssessmentForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assessment_form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['explanation'], 'string'],
            [['create_date','detail'], 'safe'],
            [['create_by'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'title' => 'หัวข้อแปบประเมิน',
            'explanation' => 'คำชี้แจง',
            'create_date' => 'วันที่สร้าง',
            'create_by' => 'สร้างโดย',
        ];
    }
}
