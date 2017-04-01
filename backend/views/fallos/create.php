<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Fallos */

$this->title = 'Soporte';
$this->params['breadcrumbs'][] = ['label' => 'Fallos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fallos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
