<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FallosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fallos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fallos-index">




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions' => function ($model, $index, $widget, $grid) {
            if ($model->estado == 'no atendido') {
                return ['class' => 'danger'];
            } else {
                return ['class' => 'success'];
            }
        },        
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idFallos',
            'descripcion',
            //'respuesta',
            'estado',
            [
                'attribute'=>'idDispositivo',
                    'value'=>function ($model, $key, $index, $column) {
                                        return $model->idDispositivo0->nombre . ' - ' . $model->idDispositivo0->serie;
                            },
                    
            ],            

            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',

                    [
                        'class' => yii\grid\ActionColumn::className(),'template'=>'{view}', 
                        //'visible' => Yii::$app->user->isGuest,
                    ]
        ],
    ]); ?>
    <p style=" text-align: center">
        <?= Html::a('Reportar fallo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
