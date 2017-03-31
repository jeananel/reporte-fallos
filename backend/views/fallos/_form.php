<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Fallos */
/* @var $form yii\widgets\ActiveForm */
?>




<div class="fallos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'respuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'atendido' => 'Atendido', 'no atendido' => 'No atendido', ], ['prompt' => '']) ?>

    

    <?= $form->field($model, 'idDispositivo')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Dispositivo::find()->all(), 'idDispositivo', function ($model, $defaultValue) {
                return $model->nombre . ' - ' . $model->serie;
            }),
    'language' => 'es',
    'options' => ['placeholder' => 'Seleccione el departamento ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]) 
    ?>
    
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>