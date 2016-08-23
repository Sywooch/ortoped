<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pacients */

$this->title = 'Update Pacients: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pacients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pacients-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
