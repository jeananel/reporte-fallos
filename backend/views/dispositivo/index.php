<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DispositivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dispositivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dispositivo-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idDispositivo',
            
            'nombre',
            'marca',
            'serie',
            [
              'attribute' => 'idDepartamento',
              'value' => 'idDepartamento0.nombre'
            ],
            //'idDepartamento',
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',

            //['class' => 'yii\grid\ActionColumn'],
[
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view} {update}',

],            
        ],
    ]); ?>
    <p style=" text-align: center">
        <?= Html::a('Registrar Dispositivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>    
</div>
