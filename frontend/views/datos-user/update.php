<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DatosUser */

$this->title = 'Update Datos User: ' . $model->idDatos;
$this->params['breadcrumbs'][] = ['label' => 'Datos Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDatos, 'url' => ['view', 'id' => $model->idDatos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="datos-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
