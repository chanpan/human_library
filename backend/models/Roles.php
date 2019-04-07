<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property int $id รหัสบทบาท
 * @property string $name ชื่อบทบาท
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'],'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสบทบาท',
            'name' => 'ชื่อบทบาท',
        ];
    }
}
