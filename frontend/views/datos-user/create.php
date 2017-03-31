<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DatosUser */

$this->title = 'Create Datos User';
$this->params['breadcrumbs'][] = ['label' => 'Datos Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
