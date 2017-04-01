<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fallos */

$this->title = 'RESOLVER FALLO';
$this->params['breadcrumbs'][] = ['label' => 'Fallos', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Dando soporte técnico';
?>
<div class="fallos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
