<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Indicador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_indicador')->dropDownList(['1' => 'Conocer', '2' => 'Hacer' , '3' => 'Ser'],['prompt'=>'Seleccionar tipo de indicador']); ?>

    <?= $form->field($model, 'evaluacion')->textInput() ?>

    <?= $form->field($model, 'id_actividad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
