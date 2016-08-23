<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchUser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            [
                     'attribute' => 'role',
                     'format' => 'text',
                     'label' => 'Тип',
                     'content'=>function($model){
                         $roles = [
                             '0' => 'Зубной техник',
                             '1' => 'Врач',
                             '2' => 'Мед. директор',
                             '3' => 'Бухгалтер',
                             '4' => 'Админ'
                         ];
                         return  $roles[ $model->role ];
                     }
                 ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            // 'email_confirm_token:email',
            //'email:email',
            //'status',
            // [
            //     'attribute' => 'created_at',
            //     'format' => 'text',
            //     'label' => 'Дата создания',
            //     'label' => 'Дата обновления',
            //     'content'=>function($model, $key, $index, $column){
            //         return  date('Y-m-d', $index);
            //     }
            // ],
            // [
            //     'attribute' => 'updated_at',
            //     'format' => 'text',
            //     'label' => 'Дата обновления',
            //     'content'=>function($model, $key, $index, $column){
            //         return  date('Y-m-d', $index);
            //     }
            // ],
            [
                'attribute'=>'Активен',
                'format'=>'text', // Возможные варианты: raw, html
                'content'=>function($data){
                    /*$user = \common\models\User::findOne(Yii::$app->user->id);
                    if( $data->status == 0 && $user->role==1 ) {
                        // если не опубликован и пользователь админ
                        return Html::a(
                            'Опубликовать',
                            '/user-info/publish?id=' . $data->id );
                    }else{
                    }*/
                    return ($data->status == 1) ? 'Да' : 'Нет';
                },
                'filter' => Html::activeDropDownList($searchModel,
                    'status',
                    [
                        '1' => 'Да',
                        '0' => 'Нет',
                    ],
                    [
                        'class' => 'form-control',
                        'prompt' => 'Все'
                    ]),
                'options' => ['style' => ['width' => '100px']],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        $update_link = '/admin/doctors/update?id='.$model->id;
                        return Html::a(
                        '<span class="glyphicon glyphicon-pencil"></span>',
                        $update_link);
                    },
                    'delete' => function ($url,$model,$key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
