<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property int $id รหัสผู้จัดทำ
 * @property string $name ชื่อผู้จัดทำ
 * @property string $detail รายละเอียดผู้จัดทำ
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detail'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสผู้จัดทำ',
            'name' => 'ชื่อผู้จัดทำ',
            'detail' => 'รายละเอียดผู้จัดทำ',
        ];
    }
}
