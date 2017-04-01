<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DatosUser */


$this->params['breadcrumbs'][] = ['label' => 'Datos de usuario', 'url' => ['index']];

?>
<div class="datos-user-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
