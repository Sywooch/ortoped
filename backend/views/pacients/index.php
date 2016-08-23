<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PacientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pacients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pacients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pacients', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'doctor_id',
            'order_id',
            'vp_id',
            'code',
            // 'age',
            // 'date',
            // 'gender',
            // 'status',
            // 'alert_date',
            // 'alert_msg',
            // 'firstname',
            // 'lastname',
            // 'thirdname',
            // 'type_paid',
            // 'var_paid',
            // 'phone',
            // 'diagnosis',
            // 'result',
            // 'files',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
