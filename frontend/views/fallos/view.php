<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Fallos */

$this->title = $model->idFallos;
$this->params['breadcrumbs'][] = ['label' => 'Fallos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Fallo de dispositivo';
?>
<div class="fallos-view">





    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idFallos',
            'descripcion',
            'respuesta',
            'estado',
             [
                'attribute'=>'idDispositivo',
                'value'=> $model->idDispositivo0->nombre          
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

</div>
