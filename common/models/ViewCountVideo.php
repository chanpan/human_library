<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "view_count_video".
 *
 * @property int $id
 * @property int $count จำนวนการเข้าชม
 * @property int $video_id รหัสวีดีโอ
 */
class ViewCountVideo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_count_video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'count', 'video_id'], 'integer'],
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
            'video_id' => 'รหัสวีดีโอ',
        ];
    }
}
