<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
        'brandLabel' => Yii::$app->params['appName'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            //['label' => '<span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> Termo de Participação', 'url' => ['/site/about']],
            ['label' => '<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Ocorrências', 'url' => ['/department'],'visible' => Yii::$app->user->can("admin")],
            Yii::$app->user->isGuest ?
                ['label' => '<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Restrito', 'url' => ['/user/login']] : // or ['/user/login-email']
                    ['label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> '. Yii::$app->user->displayName,
                    'items' => 
                        [
                            ['label' => '<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Minha Conta', 'url' => ['/user/account']],
                            '<li class="divider"></li>',
                            ['label' => '<span class="glyphicon glyphicon-off" aria-hidden="true"></span> '.Yii::t('app', 'Sign Out'),
                                'url' => ['/user/logout'],
                                'linkOptions' => ['data-method' => 'post']],
                        ],
                    ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"><?=Yii::$app->params['appName'] ?> &copy; Sicoob Crediriodoce <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>