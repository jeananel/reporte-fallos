<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fallos */

$this->title = 'Update Fallos: ' . $model->idFallos;
$this->params['breadcrumbs'][] = ['label' => 'Fallos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFallos, 'url' => ['view', 'id' => $model->idFallos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fallos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
