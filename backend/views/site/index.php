<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Выберите клинику</h1>

        <p class="lead"></p>


    </div>
    <?= Yii::$app->session->getFlash('error'); ?>
    <div class="body-content">

        <div class="row">

            <?foreach($clinics as $clinic):?>
            <div class="col-lg-2">
                <h2><?=$clinic['title'];?></h2>

                <p><a class="btn btn-default" href="?id_clinic=<?=$clinic['id'];?>">Выбрать</a></p>
            </div>
            <?endforeach;?>

        </div>

    </div>
</div>
