<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property int $id
 * @property string $photo รูปภาพ
 * @property string $detail รายละเอียด
 * @property int $forder ลำดับที่
 * @property int $create_by สร้างโดย
 * @property string $create_date สร้างเมื่อวันที่
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['forder', 'create_by'], 'integer'],
            [['create_date'], 'safe'],
            [['photo', 'detail', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'รูปภาพ',
            'detail' => 'รายละเอียด',
            'forder' => 'ลำดับที่',
            'create_by' => 'สร้างโดย',
            'create_date' => 'สร้างเมื่อวันที่',
	    'url'=>'Url',
        ];
    }
}
