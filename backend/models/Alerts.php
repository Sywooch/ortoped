<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%alerts}}".
 *
 * @property string $id
 * @property string $doctor_id_to
 * @property string $doctor_id_from
 * @property string $date
 * @property integer $read_status
 * @property string $text
 */
class Alerts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%alerts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctor_id_to', 'doctor_id_from', 'date', 'read_status'], 'integer'],
            [['text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctor_id_to' => 'Doctor Id To',
            'doctor_id_from' => 'Doctor Id From',
            'date' => 'Date',
            'read_status' => 'Read Status',
            'text' => 'Text',
        ];
    }

    /**
     * @inheritdoc
     * @return AlertsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AlertsQuery(get_called_class());
    }
}
