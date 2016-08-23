<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%plans}}".
 *
 * @property integer $id
 * @property string $version
 * @property integer $ready
 * @property string $ver_confirm
 * @property string $correct
 * @property string $approved
 * @property integer $count_models
 * @property integer $count_elayners
 * @property integer $count_attachment
 * @property integer $count_checkpoint
 * @property integer $count_reteiners
 * @property integer $count_models_vp
 * @property integer $count_elayners_vp
 * @property integer $count_attachment_vp
 * @property integer $count_checkpoint_vp
 * @property integer $count_reteiners_vp
 * @property integer $doctor_id
 * @property integer $pacient_id
 * @property integer $order_id
 * @property integer $level_1_doctor_id
 * @property integer $level_2_doctor_id
 * @property integer $level_3_doctor_id
 * @property integer $level_4_doctor_id
 * @property integer $level_5_doctor_id
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
class Plans extends \yii\db\ActiveRecord
{
    public $fileList;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%plans}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ready', 'count_models', 'count_elayners', 'count_attachment', 'count_checkpoint', 'count_reteiners', 'count_models_vp', 'count_elayners_vp', 'count_attachment_vp', 'count_checkpoint_vp', 'count_reteiners_vp', 'doctor_id', 'pacient_id', 'order_id', 'level_1_doctor_id', 'level_2_doctor_id', 'level_3_doctor_id', 'level_4_doctor_id', 'level_5_doctor_id', 'level_1_status', 'level_2_status', 'level_3_status', 'level_4_status', 'level_5_status'], 'integer'],
            [['level_1_result', 'level_2_result', 'level_3_result', 'level_4_result', 'level_5_result', 'comments'], 'string'],
            [['comments'], 'required'],
            [['version', 'ver_confirm', 'correct', 'approved'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'version' => 'Version',
            'ready' => 'Ready',
            'ver_confirm' => 'Ver Confirm',
            'correct' => 'Correct',
            'approved' => 'Approved',
            'count_models' => 'Count Models',
            'count_elayners' => 'Count Elayners',
            'count_attachment' => 'Count Attachment',
            'count_checkpoint' => 'Count Checkpoint',
            'count_reteiners' => 'Count Reteiners',
            'count_models_vp' => 'Count Models Vp',
            'count_elayners_vp' => 'Count Elayners Vp',
            'count_attachment_vp' => 'Count Attachment Vp',
            'count_checkpoint_vp' => 'Count Checkpoint Vp',
            'count_reteiners_vp' => 'Count Reteiners Vp',
            'doctor_id' => 'Doctor ID',
            'pacient_id' => 'Pacient ID',
            'order_id' => 'Order ID',
            'level_1_doctor_id' => 'Level 1 Doctor ID',
            'level_2_doctor_id' => 'Level 2 Doctor ID',
            'level_3_doctor_id' => 'Level 3 Doctor ID',
            'level_4_doctor_id' => 'Level 4 Doctor ID',
            'level_5_doctor_id' => 'Level 5 Doctor ID',
            'level_1_status' => 'Level 1 Status',
            'level_2_status' => 'Level 2 Status',
            'level_3_status' => 'Level 3 Status',
            'level_4_status' => 'Level 4 Status',
            'level_5_status' => 'Level 5 Status',
            'level_1_result' => 'Level 1 Result',
            'level_2_result' => 'Level 2 Result',
            'level_3_result' => 'Level 3 Result',
            'level_4_result' => 'Level 4 Result',
            'level_5_result' => 'Level 5 Result',
            'comments' => 'Comments',
            'files' => 'Files',
        ];
    }
}
