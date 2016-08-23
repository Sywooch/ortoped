<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%pacients}}".
 *
 * @property string $id
 * @property string $doctor_id
 * @property string $order_id
 * @property string $vp_id
 * @property string $code
 * @property string $age
 * @property string $date
 * @property integer $gender
 * @property integer $status
 * @property string $alert_date
 * @property string $alert_msg
 * @property string $firstname
 * @property string $lastname
 * @property string $thirdname
 * @property integer $type_paid
 * @property integer $var_paid
 * @property string $phone
 * @property string $diagnosis
 * @property string $result
 * @property string $files
 */
class Pacients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pacients}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'doctor_id', 'order_id', 'vp_id', 'code', 'age', 'date', 'gender', 'status', 'alert_date', 'type_paid', 'var_paid'], 'integer'],
            [['alert_msg'], 'string', 'max' => 256],
            [['firstname', 'lastname', 'thirdname'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 128],
            [['diagnosis', 'result'], 'string', 'max' => 1024],
            [['files'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctor_id' => 'Doctor ID',
            'order_id' => 'Order ID',
            'vp_id' => 'Vp ID',
            'code' => 'Code',
            'age' => 'Age',
            'date' => 'Date',
            'gender' => 'Gender',
            'status' => 'Status',
            'alert_date' => 'Alert Date',
            'alert_msg' => 'Alert Msg',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'thirdname' => 'Thirdname',
            'type_paid' => 'Type Paid',
            'var_paid' => 'Var Paid',
            'phone' => 'Phone',
            'diagnosis' => 'Diagnosis',
            'result' => 'Result',
            'files' => 'Files',
        ];
    }

    /**
     * @inheritdoc
     * @return PacientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PacientsQuery(get_called_class());
    }
}
