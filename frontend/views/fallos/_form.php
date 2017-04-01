<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Fallos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fallos-form">

    <?php $form = ActiveForm::begin(); ?>


 <?= $form->field($model, 'descripcion')->textarea(['maxlength' => true, 'rows' => '6']) ?>

    <?= $form->field($model, 'idDispositivo')->widget(\kartik\select2\Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Dispositivo::find()->where(['idDepartamento'=>\common\models\DatosUser::findOne(['idUser'=>Yii::$app->user->getId()])->idDepartamento])->all(), 'idDispositivo', function ($model, $defaultValue) {
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
        <?= Html::submitButton($model->isNewRecord ? 'Reportar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
