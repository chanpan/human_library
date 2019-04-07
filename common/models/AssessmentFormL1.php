<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assessment_form_l1".
 *
 * @property int $id รหัส
 * @property int $p_id รหัสฟอร์มแบบประเมิน
 * @property string $sex เพศ
 * @property string $status สถานะ
 * @property string $status_other อื่นๆ
 * @property string $department หน่วยงานที่สังกัด
 * @property string $department_other อื่นๆ
 */
class AssessmentFormL1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assessment_form_l1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p_id'], 'integer'],
            [['sex'], 'string', 'max' => 20],
            [['status'], 'string', 'max' => 50],
            [['status_other', 'department', 'department_other'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'p_id' => 'รหัสฟอร์มแบบประเมิน',
            'sex' => 'เพศ',
            'status' => 'สถานะ',
            'status_other' => 'อื่นๆ',
            'department' => 'หน่วยงานที่สังกัด',
            'department_other' => 'อื่นๆ',
        ];
    }
}
