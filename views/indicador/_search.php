<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IndicadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_indicador') ?>

    <?= $form->field($model, 'tipo_indicador') ?>

    <?= $form->field($model, 'evaluacion') ?>

    <?= $form->field($model, 'id_actividad') ?>

    <?= $form->field($model, 'carnet') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
