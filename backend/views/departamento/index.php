<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamento-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'idDepartamento',
            'nombre',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
            ],            
        ],
    ]);
    ?>
    <p style=" text-align: center">
        <?= Html::a('Crear Departamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>    
</div>
