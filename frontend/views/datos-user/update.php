<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DatosUser */

$this->title = 'Actualizar datos de usuario: ' . $model->idUser0->username;


$this->params['breadcrumbs'][] = $model->idUser0->username;
?>
<div class="datos-user-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
