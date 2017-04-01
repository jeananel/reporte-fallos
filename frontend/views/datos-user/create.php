<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DatosUser */

$this->title = 'Completar datos personales de usuario';
$this->params['breadcrumbs'][] = ['label' => 'Datos Personales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->nombres;
?>
<div class="datos-user-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
