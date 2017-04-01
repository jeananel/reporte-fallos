<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Fallos */

$this->title = 'Registro de fallo';
$this->params['breadcrumbs'][] = ['label' => 'Fallos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fallos-create">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
