<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%banners}}".
 *
 * @property string $id
 * @property string $title
 * @property string $banner
 * @property integer $type
 * @property string $date
 * @property string $date_start
 * @property string $date_finish
 * @property integer $status
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banners}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'date', 'date_start', 'date_finish', 'status'], 'integer'],
            [['title', 'banner', 'text'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'banner' => 'Banner',
            'type' => 'Тип',
            'date' => 'Дата создания',
            'date_start' => 'Дата начала',
            'date_finish' => 'Дата завершения',
            'text' => 'Текст',            
            'status' => 'Статус',
        ];
    }

    /**
     * @inheritdoc
     * @return BannersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BannersQuery(get_called_class());
    }
}
