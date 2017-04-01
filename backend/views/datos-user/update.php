<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DatosUser */

$this->title = 'Actualización de datos: ' . $model->nombres;
$this->params['breadcrumbs'][] = ['label' => 'Datos Users', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Datos del usuario';
?>
<div class="datos-user-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
