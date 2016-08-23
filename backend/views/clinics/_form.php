<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Clinics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clinics-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contacts_admin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_price')->textInput() ?>

    <?= $form->field($model, 'elayner_price')->textInput() ?>

    <?= $form->field($model, 'attachment_price')->textInput() ?>

    <?= $form->field($model, 'checkpoint_price')->textInput() ?>

    <?= $form->field($model, 'reteiner_price')->textInput() ?>

    <?= $form->field($model, 'model_discount')->textInput() ?>

    <?= $form->field($model, 'elayner_discount')->textInput() ?>

    <?= $form->field($model, 'attachment_discount')->textInput() ?>

    <?= $form->field($model, 'checkpoint_discount')->textInput() ?>

    <?= $form->field($model, 'reteiner_discount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
