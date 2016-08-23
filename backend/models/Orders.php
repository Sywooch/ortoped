<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%orders}}".
 *
 * @property string $id
 * @property string $date
 * @property string $num
 * @property string $group_id
 * @property string $doctor_id
 * @property string $clinics_id
 * @property string $pacient_code
 * @property string $date_paid
 * @property integer $type_paid
 * @property integer $status_paid
 * @property integer $status_object
 * @property integer $order_status
 * @property integer $admin_check
 * @property integer $status_agreement
 * @property integer $status
 * @property integer $scull_type
 * @property integer $type
 * @property double $price
 * @property double $discount
 * @property double $sum_paid
 * @property string $count_models
 * @property string $count_elayners
 * @property string $count_attachment
 * @property string $count_checkpoint
 * @property string $count_reteiners
 * @property string $count_models_vp
 * @property string $count_elayners_vp
 * @property string $count_attachment_vp
 * @property string $count_checkpoint_vp
 * @property string $count_reteiners_vp
 * @property string $count_models_vc
 * @property string $count_elayners_vc
 * @property string $count_attachment_vc
 * @property string $count_checkpoint_vc
 * @property string $count_reteiners_vc
 * @property string $count_models_nc
 * @property string $count_elayners_nc
 * @property string $count_attachment_nc
 * @property string $count_checkpoint_nc
 * @property string $count_reteiners_nc
 * @property string $level_1_doctor_id
 * @property string $level_2_doctor_id
 * @property string $level_3_doctor_id
 * @property integer $level_4_doctor_id
 * @property string $level_5_doctor_id
 * @property integer $level_1_status
 * @property integer $level_2_status
 * @property integer $level_3_status
 * @property integer $level_4_status
 * @property integer $level_5_status
 * @property string $level_1_result
 * @property string $level_2_result
 * @property string $level_3_result
 * @property string $level_4_result
 * @property string $level_5_result
 * @property string $comments
 * @property string $files
 */
class Orders extends \yii\db\ActiveRecord
{

    public $fileList;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['num', /*'group_id', */'doctor_id', 'clinics_id', /*'pacient_code', 'date_paid', 'type_paid', 'status_paid',
                'status_object', 'order_status', 'admin_check', 'status_agreement', 'status', 'scull_type', 'type',
                'count_models', 'count_elayners', 'count_attachment', 'count_checkpoint', 'count_reteiners',
                'count_models_vp', 'count_elayners_vp', 'count_attachment_vp', 'count_checkpoint_vp',
                'count_reteiners_vp', 'count_models_vc', 'count_elayners_vc', 'count_attachment_vc',
                'count_checkpoint_vc', 'count_reteiners_vc', 'count_models_nc', 'count_elayners_nc',
                'count_attachment_nc', 'count_checkpoint_nc', 'count_reteiners_nc',*/ /*'level_1_doctor_id',
                'level_2_doctor_id', 'level_3_doctor_id', 'level_4_doctor_id', 'level_5_doctor_id', *//*'level_1_status',
                'level_2_status', 'level_3_status', 'level_4_status', 'level_5_status', 'level_1_result',
                'level_2_result', 'level_3_result', 'level_4_result', 'level_5_result',*/ 'comments'], 'required'],
            [['num', 'group_id', 'doctor_id', 'clinics_id', 'pacient_code', 'date_paid', 'type_paid', 'status_paid', 'status_object', 'order_status', 'admin_check', 'status_agreement', 'status', 'scull_type', 'type', 'count_models', 'count_elayners', 'count_attachment', 'count_checkpoint', 'count_reteiners', 'count_models_vp', 'count_elayners_vp', 'count_attachment_vp', 'count_checkpoint_vp', 'count_reteiners_vp', 'count_models_vc', 'count_elayners_vc', 'count_attachment_vc', 'count_checkpoint_vc', 'count_reteiners_vc', 'count_models_nc', 'count_elayners_nc', 'count_attachment_nc', 'count_checkpoint_nc', 'count_reteiners_nc', 'level_1_doctor_id', 'level_2_doctor_id', 'level_3_doctor_id', 'level_4_doctor_id', 'level_5_doctor_id', 'level_1_status', 'level_2_status', 'level_3_status', 'level_4_status', 'level_5_status'], 'integer'],
            [['price', 'discount', 'sum_paid'], 'number'],
            [['level_1_result', 'level_2_result', 'level_3_result', 'level_4_result', 'level_5_result', 'comments'], 'string'],
            [['comments'], 'required'],
            [['files'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата заказа',
            'num' => 'Номер заказа',
            'group_id' => 'Связанный заказ',
            'doctor_id' => 'Doctor ID',
            'clinics_id' => 'Клиника',
            'pacient_code' => 'Код пациента',
            'date_paid' => 'Дата полной оплаты',
            'type_paid' => 'Тип оплаты',
            'status_paid' => 'Статус оплаты',
            'status_object' => 'Статус заказа',
            'order_status' => 'Состояние заказа',
            'admin_check' => 'Утверждено админом',
            'status_agreement' => 'Состояние договора',
            'status' => 'Состояние заказа',
            'scull_type' => 'Челюсть',
            'type' => 'Тип',
            'price' => 'Цена',
            'discount' => 'Скидка',
            'sum_paid' => 'Сумма к оплате',
            'count_models' => 'Всего моделей',
            'count_elayners' => 'Count Elayners',
            'count_attachment' => 'Count Attachment',
            'count_checkpoint' => 'Count Checkpoint',
            'count_reteiners' => 'Count Reteiners',
            'count_models_vp' => 'Count Models Vp',
            'count_elayners_vp' => 'Count Elayners Vp',
            'count_attachment_vp' => 'Count Attachment Vp',
            'count_checkpoint_vp' => 'Count Checkpoint Vp',
            'count_reteiners_vp' => 'Count Reteiners Vp',
            'count_models_vc' => 'Count Models Vc',
            'count_elayners_vc' => 'Count Elayners Vc',
            'count_attachment_vc' => 'Count Attachment Vc',
            'count_checkpoint_vc' => 'Count Checkpoint Vc',
            'count_reteiners_vc' => 'Count Reteiners Vc',
            'count_models_nc' => 'Count Models Nc',
            'count_elayners_nc' => 'Count Elayners Nc',
            'count_attachment_nc' => 'Count Attachment Nc',
            'count_checkpoint_nc' => 'Count Checkpoint Nc',
            'count_reteiners_nc' => 'Count Reteiners Nc',
            'level_1_doctor_id' => 'Level 1 Doctor ID',
            'level_2_doctor_id' => 'Level 2 Doctor ID',
            'level_3_doctor_id' => 'Level 3 Doctor ID',
            'level_4_doctor_id' => 'Level 4 Doctor ID',
            'level_5_doctor_id' => 'Level 5 Doctor ID',
            'level_1_status' => 'Статус уровня 1',
            'level_2_status' => 'Статус уровня 2',
            'level_3_status' => 'Статус уровня 3',
            'level_4_status' => 'Статус уровня 4',
            'level_5_status' => 'Статус уровня 5',
            'level_1_result' => 'Описание результата уровня 1',
            'level_2_result' => 'Описание результата уровня 2',
            'level_3_result' => 'Описание результата уровня 3',
            'level_4_result' => 'Описание результата уровня 4',
            'level_5_result' => 'Описание результата уровня 5',
            'comments' => 'Комментарий к заказу',
            'files' => 'Файлы моделей к заказу',
        ];
    }

    /**
     * @inheritdoc
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }
}
