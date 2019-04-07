<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assessment_form_l2".
 *
 * @property int $id รหัสแปบบประเมิน
 * @property int $p_id รหัสแบบประเมิน
 * @property string $one 1. ความรู้ที่ได้รับจากการเข้าร่วมเปิดอ่านหนังสือมีชีวิต (Living book)
 * @property string $two 2. เนื้อหาของหนังสือมีชีวิตมีความน่าสนใจ
 * @property string $three 3. หนังสือมีชีวิต (Living book) ถ่ายทอดเนื้อหาได้ชัดเจน
 * @property string $four 4. หนังสือมีชีวิต (Living book) ถ่ายทอดเนื้อหาได้อย่างน่าสนใจ
 * @property string $five 5. การจัดโครงการห้องสมุดมนุษย์ (Human Library) มีประโยชน์
 * @property string $six 6. การจัดโครงการห้องสมุดมนุษย์ (Human Library) มีความเหมาะสม
 * @property string $seven 7. บรรยากาศในการจัดงานในครั้งนี้มีความเหมาะสม
 * @property string $eight 8. สามารถนำความรู้ที่ได้รับไปประยุกต์ใช้ในการปฏิบัติงานและการดำเนินชีวิตประจำวันได้
 * @property string $nine 9. อยากให้มีการจัดกิจกรรมนี้อีก
 */
class AssessmentFormL2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assessment_form_l2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p_id', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'], 'required'],
            [['p_id'], 'integer'],
            [['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสแปบบประเมิน',
            'p_id' => 'รหัสแบบประเมิน',
            'one' => '1. ความรู้ที่ได้รับจากการเข้าร่วมเปิดอ่านหนังสือมีชีวิต (Living book)',
            'two' => '2. เนื้อหาของหนังสือมีชีวิตมีความน่าสนใจ',
            'three' => '3. หนังสือมีชีวิต (Living book) ถ่ายทอดเนื้อหาได้ชัดเจน',
            'four' => '4. หนังสือมีชีวิต (Living book) ถ่ายทอดเนื้อหาได้อย่างน่าสนใจ',
            'five' => '5. การจัดโครงการห้องสมุดมนุษย์ (Human Library) มีประโยชน์',
            'six' => '6. การจัดโครงการห้องสมุดมนุษย์ (Human Library) มีความเหมาะสม',
            'seven' => '7. บรรยากาศในการจัดงานในครั้งนี้มีความเหมาะสม',
            'eight' => '8. สามารถนำความรู้ที่ได้รับไปประยุกต์ใช้ในการปฏิบัติงานและการดำเนินชีวิตประจำวันได้',
            'nine' => '9. อยากให้มีการจัดกิจกรรมนี้อีก',
        ];
    }
}
