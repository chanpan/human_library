<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "view_count".
 *
 * @property int $id
 * @property int $count จำนวนการเข้าชม
 */
class ViewCount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_count';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'count'], 'integer'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'count' => 'จำนวนการเข้าชม',
        ];
    }
}
