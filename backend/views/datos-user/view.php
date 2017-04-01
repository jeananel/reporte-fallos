<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DatosUser */

$this->title = $model->idDatos;
$this->params['breadcrumbs'][] = ['label' => 'Datos de usuario', 'url' => ['index']];

?>
<div class="datos-user-view">





    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idDatos',
            'apellidos',
            'nombres',
            'fecha_nacimiento',
            'genero',
            'direccion_principal',
            'telefono',
            'idUser',
            'idDepartamento',
            'estado',
        ],
    ]) ?>

</div>
