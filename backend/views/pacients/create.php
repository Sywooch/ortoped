<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pacients */

$this->title = 'Create Pacients';
$this->params['breadcrumbs'][] = ['label' => 'Pacients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pacients-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
