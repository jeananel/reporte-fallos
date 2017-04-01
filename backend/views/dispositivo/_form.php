<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Dispositivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dispositivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'idDepartamento')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Departamento::find()->all(), 'idDepartamento', 'nombre'),
    'language' => 'es',
    'options' => ['placeholder' => 'Seleccione el departamento ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]) 
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
