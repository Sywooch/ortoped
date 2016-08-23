<?php

namespace backend\models;


use Yii;

use yii\web\IdentityInterface;
use backend\models\DoctorClinic;

/**
 * This is the model class for table "{{%doctors}}".
 *
 * @property string $id
 * @property string $clinic_id
 * @property string $age
 * @property integer $type
 * @property integer $edu
 * @property integer $gender
 * @property integer $status
 * @property string $passport
 * @property string $email
 * @property string $phone
 * @property string $regalies
 */
class Doctors extends \yii\db\ActiveRecord  implements IdentityInterface
{



    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }




    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%doctors}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clinic_id', 'age', 'type', 'edu', 'gender', 'status'], 'integer'],
            [['passport'], 'string', 'max' => 32],

            [['email'], 'string', 'max' => 64],
            [['phone'], 'string', 'max' => 16],
            [['regalies'], 'string', 'max' => 128],
            ['password', 'safe']
        ];
    }


    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clinic_id' => 'Клиника',
            'age' => 'Дата рождения',
            'type' => 'Тип',
            'edu' => 'Статус прохождения обучения',
            'gender' => 'Пол',
            'status' => 'Статус',
            'passport' => 'Паспортные данные',
            'email' => 'Email',
            'phone' => 'Телефон',
            'regalies' => 'Регалии',
            'password' => 'Новый пароль',
        ];
    }

    /**
     * @inheritdoc
     * @return DoctorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DoctorsQuery(get_called_class());
    }

    public function getClinics($asArray = true){
        //vd(Yii::$app->user->id);
        $id_doctor = Yii::$app->user->id;

        if($asArray){
            $clinics = DoctorClinic::find()->select('click_id')->where(['doctor_id' => $id_doctor])->asArray()->all();
        }else{
            $clinics = DoctorClinic::find()->where(['doctor_id' => $id_doctor])->all();
        }
        return $clinics;
    }

    public function getClinicsByDoctor($asArray = true){
        //vd(Yii::$app->user->id);
        $id_doctor = $this->id;

        if($asArray){
            $clinics = DoctorClinic::find()->select('click_id')->where(['doctor_id' => $id_doctor])->asArray()->all();
        }else{
            $clinics = DoctorClinic::find()->where(['doctor_id' => $id_doctor])->all();
        }
        return $clinics;
    }


    public function setClinics($values)
    {
        DoctorClinic::deleteAll('doctor_id = :doctor_id', [':doctor_id' => $this->id]);
        foreach($values as $u) {
            $modelCon = new DoctorClinic();
            $modelCon->click_id = $u;
            $modelCon->doctor_id = $this->id;
            if(!$modelCon->save()) {
               vd($modelCon->getErrors());
            }
        }
    }
}
