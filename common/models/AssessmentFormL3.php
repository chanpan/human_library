<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assessment_form_l3".
 *
 * @property int $id รหัสแปบบประเมิน
 * @property int $p_id รหัสแปบบประเมินหลัก
 * @property string $one ข้อเสนอแนะเพิ่มเติมอื่น ๆ (โปรดระบุ)
 * @property string $two หัวข้อที่ท่านสนใจที่จะร่วมกิจกรรมครั้งต่อไป (โปรดระบุ)
 */
class AssessmentFormL3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assessment_form_l3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p_id'], 'integer'],
            [['one', 'two'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสแปบบประเมิน',
            'p_id' => 'รหัสแปบบประเมินหลัก',
            'one' => 'ข้อเสนอแนะเพิ่มเติมอื่น ๆ (โปรดระบุ)',
            'two' => 'หัวข้อที่ท่านสนใจที่จะร่วมกิจกรรมครั้งต่อไป (โปรดระบุ)',
        ];
    }
}
