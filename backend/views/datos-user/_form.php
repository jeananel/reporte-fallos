<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model common\models\DatosUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datos-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'fecha_nacimiento')->widget(DateTimePicker::className(), [
                    'pluginOptions' => [
                        'value' => new \yii\db\Expression('NOW()'),
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ])
                ?> 

    <?= $form->field($model, 'genero')->dropDownList([ 'masculino' => 'Masculino', 'femenino' => 'Femenino', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'direccion_principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'idDepartamento')->widget(\kartik\select2\Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Departamento::find()->all(), 'idDepartamento', 'nombre'),
    'language' => 'es',
    'options' => ['placeholder' => 'Seleccione el departamento ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]) 
    ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'validado' => 'Validado', 'no validado' => 'No validado', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Confirmar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
