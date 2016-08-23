<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\UserType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'user_type')->dropDownList(ArrayHelper::map(UserType::find()->all(), 'id', 'val')); ?>

    <?php //echo $form->field($model, 'first_name')->textInput(['placeholder' => 'Укажите имя']);

    echo $form->field($model, 'role')
        ->dropDownList([
            '0' => 'Зубной техник',
            '1' => 'Врач',
            '2' => 'Мед. директор',
            '3' => 'Бухгалтер',
            '4' => 'Админ'
        ], $param = ['options' =>[ $model->role => ['Selected' => true]]]
    );
    ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
