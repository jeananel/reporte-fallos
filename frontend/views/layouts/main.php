<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title>Reporte fallos</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'REPORTE DE FALLOS',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'my-navbar navbar-fixed-top',
        ],
    ]);
//    $menuItems = [
//        ['label' => 'Inicio', 'url' => ['/site/index']],
//        ['label' => 'Acerca de', 'url' => ['/site/about']],
//        ['label' => 'Contactos', 'url' => ['/site/contact']],
//    ];
//    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => 'Registrarse', 'url' => ['/user/registration/register ']];
//        $menuItems[] = ['label' => 'Ingresar', 'url' => ['/user/security/login']];
//    } else {
//        $menuItems[] = '<li>'
//            . Html::beginForm(['/user/security/logout '], 'post')
//            . Html::submitButton(
//                'Salir (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link logout']
//            )
//            . Html::endForm()
//            . '</li>';
//    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Acerca de', 'url' => ['/site/about'], 'visible'=> Yii::$app->user->isGuest],
            ['label' => 'Administracion', 'url' => ['/user/admin'] , 'visible'=> Yii::$app->user->can('administrador')],
                [
                     'label' => 'Opciones',
                    'visible'=> !Yii::$app->user->isGuest,
                     'items' => [
                          ['label' => 'Reportar fallos', 'url' => ['/fallos/index']],
                          //'<li class="divider"></li>',
                          //'<li class="dropdown-header">Sistema</li>',
                          //['label' => 'Datos personales', 'url' => [ \common\models\DatosUser::findOne(['idUser'=>Yii::$app->user->getId()]) ?  ['/datos-user/update',['id'=>Yii::$app->user->getId()]] : ['/datos-user/index']  ]],
                          //['label' => 'Fallos', 'url' => ['/fallos/index']],
                     ],
                 ],

                  (\common\models\DatosUser::findOne(['idUser'=>Yii::$app->user->getId()]))  ? (
                ['label' => 'Datos Personales', 'visible'=>!Yii::$app->user->isGuest ,'url' =>  yii\helpers\Url::to(['/datos-user/update', 'id'=>\common\models\DatosUser::findOne(['idUser'=>Yii::$app->user->getId()])->idDatos]) ]
            ) : (
                ['label' => 'Datos Personales','visible'=>!Yii::$app->user->isGuest, 'url' => ['/datos-user/create'] ]
            ),            
            
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Ingresar', 'url' => ['/user/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/user/logout'], 'post')
                . Html::submitButton(
                    'Salir (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
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
        <p class="pull-left">&copy; Sistema de reporte de fallos</p>

        <p class="pull-right"><?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
