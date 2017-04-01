<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Departamento */

$this->title = 'Update Departamento: ' . $model->idDepartamento;
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Actualización de departamento';
?>
<div class="departamento-update">

    <h1><?= $model->nombre ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
