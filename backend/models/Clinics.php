<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%clinics}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $adress
 * @property string $phone
 * @property string $contacts_admin
 * @property string $email
 * @property double $model_price
 * @property double $elayner_price
 * @property double $attachment_price
 * @property double $checkpoint_price
 * @property double $reteiner_price
 * @property double $model_discount
 * @property double $elayner_discount
 * @property double $attachment_discount
 * @property double $checkpoint_discount
 * @property double $reteiner_discount
 */
class Clinics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%clinics}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_price', 'elayner_price', 'attachment_price', 'checkpoint_price', 'reteiner_price', 'model_discount', 'elayner_discount', 'attachment_discount', 'checkpoint_discount', 'reteiner_discount'], 'number'],
            [['title', 'adress', 'phone', 'contacts_admin'], 'string', 'max' => 128],
            [['email'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'adress' => 'Adress',
            'phone' => 'Phone',
            'contacts_admin' => 'Contacts Admin',
            'email' => 'Email',
            'model_price' => 'Model Price',
            'elayner_price' => 'Elayner Price',
            'attachment_price' => 'Attachment Price',
            'checkpoint_price' => 'Checkpoint Price',
            'reteiner_price' => 'Reteiner Price',
            'model_discount' => 'Model Discount',
            'elayner_discount' => 'Elayner Discount',
            'attachment_discount' => 'Attachment Discount',
            'checkpoint_discount' => 'Checkpoint Discount',
            'reteiner_discount' => 'Reteiner Discount',
        ];
    }

    /**
     * @inheritdoc
     * @return ClinicsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClinicsQuery(get_called_class());
    }
}
