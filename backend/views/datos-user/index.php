<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DatosUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Datos User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
</div>
