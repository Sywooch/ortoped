<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PlansSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plans-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Plans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'version',
            'ready',
            'ver_confirm',
            'correct',
            // 'approved',
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
            // 'doctor_id',
            // 'pacient_id',
            // 'order_id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
