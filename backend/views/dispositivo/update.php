<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Dispositivo */

$this->title = 'Actualizar Dispositivo: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Dispositivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->idDispositivo]];
$this->params['breadcrumbs'][] = 'Actualizando dispositivo';
?>
<div class="dispositivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
