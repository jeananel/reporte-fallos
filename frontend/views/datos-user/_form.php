<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DatosUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datos-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_nacimiento')->textInput() ?>

    <?= $form->field($model, 'genero')->dropDownList([ 'masculino' => 'Masculino', 'femenino' => 'Femenino', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'direccion_principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idUser')->textInput() ?>

    <?= $form->field($model, 'idDepartamento')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'validado' => 'Validado', 'no validado' => 'No validado', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
