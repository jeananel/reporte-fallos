<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DatosUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos de usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-user-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $index, $widget, $grid) {
            if ($model->estado == 'validado') {
                return ['class' => 'info'];
            } else {
                return ['class' => 'warning'];
            }
        },          
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idDatos',
            'apellidos',
            'nombres',
            'fecha_nacimiento',
            'genero',
            // 'direccion_principal',
            // 'telefono',
            // 'idUser',
            // 'idDepartamento',
             'estado',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{confirmar}',
                'buttons' => [
                'confirmar' => function ($url, $model, $key) {
                    return Html::a ( '<span class="glyphicon glyphicon-ok-circle"> Confirmar Datos</span>', ['datos-user/update', 'id' => $model->idDatos] );
                },
                ],
            ],                        
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{ver}',
                'buttons' => [
                'ver' => function ($url, $model, $key) {
                    return Html::a (   '<span class="glyphicon glyphicon-list"> Ver Información</span>', ['datos-user/view', 'id' => $model->idDatos] );
                },
                ],
            ], 
        ],
    ]); ?>
  
</div>
