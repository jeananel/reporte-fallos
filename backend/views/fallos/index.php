<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FallosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fallos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fallos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $index, $widget, $grid) {
            if ($model->estado == 'no atendido') {
                return ['class' => 'danger'];
            } else {
                return ['class' => 'success'];
            }
        },           
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'idFallos',
            'descripcion',
            //'respuesta',
            'estado',
            [
                'attribute' => 'idDispositivo',
                'value' => function ($model, $key, $index, $column) {
                    return $model->idDispositivo0->nombre . ' - ' . $model->idDispositivo0->serie;
                },
            ],
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',
            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{fallo}',
                'buttons' => [
                'fallo' => function ($url, $model, $key) {
                    return Html::a ( '<span class="glyphicon glyphicon-thumbs-up"> Dar soporte</span>', ['fallos/update', 'id' => $model->idFallos] );
                },
                ],
            ],                        
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{soporte}',
                'buttons' => [
                'soporte' => function ($url, $model, $key) {
                    return Html::a (   '<span class="glyphicon glyphicon-info-sign"> Ver fallo</span>', ['fallos/view', 'id' => $model->idFallos] );
                },
                ],
            ], 
        ],
    ]);
    ?>
</div>
  
