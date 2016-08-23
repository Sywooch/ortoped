<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\components\ChatWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Главная', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {


        $menuItems[] = ['label' => 'Клиники', 'url' => ['/clinics/index']];

        $menuItems[] = ['label' => 'Персонал', 'url' => ['/doctors/index']];

        $menuItems[] = ['label' => 'Пациенты', 'url' => ['/pacients/index']];

        $menuItems[] = ['label' => 'Изделия', 'url' => ['/objects/index']];

        $menuItems[] = ['label' => 'Заказы', 'url' => ['/orders/index']];

        $menuItems[] = ['label' => 'Планы', 'url' => ['/plans/index']];

        $menuItems[] = [
            'label' => 'Сообщения',
            'url' => ['/alerts/index'],
            //'template' => 'test{label}<span class="glyphicon glyphicon-trash">0</span>'."\n",
            /*'options' => [
                'class' => 'dropdown',
            ],*/
            /*'items' => [
                ['label' => 'Inside1', 'url' => 'category/17'],
                ['label' => 'Inside2', 'url' => 'category/24'],
            ]*/
        ];

        if(Yii::$app->user->identity->role == 4) { // только админ

            $menuItems[] = ['label' => 'Баннеры', 'url' => ['/banners/index']];

            $menuItems[] = ['label' => 'Users', 'url' => ['/user/index']]; // админ пользователи

        }

        if(Yii::$app->user->identity->role != 4) {
            $menuItems[] = ['label' => 'Кабинет', 'url' => ['/doctors/update?id=' . Yii::$app->user->id]]; // админ пользователи
        }
        $alerts_count =0;


        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';

    }
    if((!is_null(Yii::$app->session['id_clinic']) && !Yii::$app->user->isGuest) || Yii::$app->user->identity->role == 4){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
    }else{
        if(!Yii::$app->user->isGuest || Yii::$app->user->identity->role <> 4)
        \Yii::$app->getSession()->setFlash('error', 'Выберите клинику');
        $menuItems1[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
        if(!Yii::$app->user->isGuest || Yii::$app->user->identity->role <> 4)
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems1,
        ]);
    }

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?= ChatWidget::widget() ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
