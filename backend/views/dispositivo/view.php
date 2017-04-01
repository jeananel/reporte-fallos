<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Dispositivo */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Dispositivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dispositivo-view">





    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idDispositivo',
            'serie',
            'nombre',
            'marca',
             [
                'attribute'=>'idDepartamento',
                'value'=> $model->idDepartamento0->nombre         
            ],
             [
                'attribute'=>'created_by',
                'value'=> $model->createdBy->username         
            ],
            'created_at',
             [
                'attribute'=>'updated_by',
                'value'=> $model->updatedBy->username         
            ],            
           
            'updated_at',
        ],
    ]) ?>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idDispositivo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idDispositivo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
