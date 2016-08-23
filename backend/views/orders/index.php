<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'num',
            'group_id',
            'doctor_id',
            // 'clinics_id',
            // 'pacient_code',
            // 'date_paid',
            // 'type_paid',
            // 'status_paid',
            // 'status_object',
            // 'order_status',
            [
                'attribute' => 'order_status',
                'format' => 'text',
                //'label' => 'Тип',
                'content'=>function($model){
                    $roles = [
                        '0' => 'Не отправлен',
                        '1' => 'Заказ отправлен',
                    ];
                    return  $roles[ $model->order_status];
                }
            ],
            // 'admin_check',
            // 'status_agreement',
            // 'status',
            // 'scull_type',
            // 'type',
            // 'price',
            // 'discount',
            // 'sum_paid',
            // 'count_models',
            // 'count_elayners',
            // 'count_attachment',
            // 'count_checkpoint',
            // 'count_reteiners',
            // 'count_models_vp',
            // 'count_elayners_vp',
            // 'count_attachment_vp',
            // 'count_checkpoint_vp',
            // 'count_reteiners_vp',
            // 'count_models_vc',
            // 'count_elayners_vc',
            // 'count_attachment_vc',
            // 'count_checkpoint_vc',
            // 'count_reteiners_vc',
            // 'count_models_nc',
            // 'count_elayners_nc',
            // 'count_attachment_nc',
            // 'count_checkpoint_nc',
            // 'count_reteiners_nc',
            // 'level_1_doctor_id',
            // 'level_2_doctor_id',
            // 'level_3_doctor_id',
            // 'level_4_doctor_id',
            // 'level_5_doctor_id',
            // 'level_1_status',
            // 'level_2_status',
            // 'level_3_status',
            // 'level_4_status',
            // 'level_5_status',
            // 'level_1_result:ntext',
            // 'level_2_result:ntext',
            // 'level_3_result:ntext',
            // 'level_4_result:ntext',
            // 'level_5_result:ntext',
            // 'comments:ntext',
            // 'files',

            ['class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {apply} {print} {update} {delete}',
                        'buttons' => [
                            'apply' => function($url, $model, $key) {
                                if($model->order_status==0)
                                    return Html::a(
                                        Html::tag('span',null,['class'=>'glyphicon glyphicon-share'])
                                        ,null
                                        ,['href'=>Url::to(['orders/apply', 'id' => $model->id]),
                                            'class' => 'print-btn',
                                            'data-url'=>Url::to(['orders/apply', 'id' => $model->id])
                                        ]
                                    );
                            },
                            'print' => function($url, $model, $key) {
                                return Html::a(
                                    Html::tag('span',null,['class'=>'glyphicon glyphicon-print'])
                                    ,null
                                    ,['href'=>Url::to(['orders/print', 'id' => $model->id]),//'javascript:void(0)',
                                        'class' => 'print-btn',
                                        'data-url'=>Url::to(['orders/print', 'id' => $model->id])
                                    ]
                                );
                            }]
                        ],
        ],
    ]); ?>
</div>
