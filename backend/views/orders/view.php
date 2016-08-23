<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::button(Yii::t('app', 'Print'), ['class' => 'btn btn-default print-btn', 'data-url'=>Url::to(['orders/print', 'id' => $model->id])]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'num',
            'group_id',
            'doctor_id',
            'clinics_id',
            'pacient_code',
            'date_paid',
            'type_paid',
            'status_paid',
            'status_object',
            'order_status',
            'admin_check',
            'status_agreement',
            'status',
            'scull_type',
            'type',
            'price',
            'discount',
            'sum_paid',
            'count_models',
            'count_elayners',
            'count_attachment',
            'count_checkpoint',
            'count_reteiners',
            'count_models_vp',
            'count_elayners_vp',
            'count_attachment_vp',
            'count_checkpoint_vp',
            'count_reteiners_vp',
            'count_models_vc',
            'count_elayners_vc',
            'count_attachment_vc',
            'count_checkpoint_vc',
            'count_reteiners_vc',
            'count_models_nc',
            'count_elayners_nc',
            'count_attachment_nc',
            'count_checkpoint_nc',
            'count_reteiners_nc',
            'level_1_doctor_id',
            'level_2_doctor_id',
            'level_3_doctor_id',
            'level_4_doctor_id',
            'level_5_doctor_id',
            'level_1_status',
            'level_2_status',
            'level_3_status',
            'level_4_status',
            'level_5_status',
            'level_1_result:ntext',
            'level_2_result:ntext',
            'level_3_result:ntext',
            'level_4_result:ntext',
            'level_5_result:ntext',
            'comments:ntext',
            'files',
        ],
    ]) ?>

</div>
