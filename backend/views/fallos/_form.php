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

    <?= $form->field($model, 'descripcion')->textarea(['maxlength' => true, 'rows' => '6', 'disabled'=>true]) ?>

    <?= $form->field($model, 'respuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'atendido' => 'Atendido', 'no atendido' => 'No atendido', ], ['prompt' => '']) ?>

    

    <?= $form->field($model, 'idDispositivo')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Dispositivo::find()->all(), 'idDispositivo', function ($model, $defaultValue) {
                return $model->nombre . ' - ' . $model->serie;
            }),
                    'disabled' => true,
    'language' => 'es',
    'options' => ['placeholder' => 'Seleccione el departamento ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]) 
    ?>
    
    
    
    <div class="form-group">
        <?php
                    if ($model->estado == 'no atendido'){
                         echo Html::submitButton($model->isNewRecord ? 'Create' : 'Resolver', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ;
                    } else {
                        echo  '<h3><span class="label label-info">El problema ya fue atendido!</span><h3>';
                    }
                   
                    ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
