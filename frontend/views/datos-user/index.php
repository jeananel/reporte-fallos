<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DatosUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos de usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-user-index">

 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDatos',
            'apellidos',
            'nombres',
            'fecha_nacimiento',
            'genero',
            // 'direccion_principal',
            // 'telefono',
            // 'idUser',
            // 'idDepartamento',
            // 'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Create Datos User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>    
</div>
