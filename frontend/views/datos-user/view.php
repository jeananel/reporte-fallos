<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DatosUser */

$this->title = $model->idDatos;
$this->params['breadcrumbs'][] = ['label' => 'Datos Users', 'url' => ['index']];

?>
<div class="datos-user-view">



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idDatos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idDatos], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
            //'idUser',
            //'idDepartamento',
            'estado',
        ],
    ]) ?>

</div>
