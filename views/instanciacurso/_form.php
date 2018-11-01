<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Instancia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instancia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semestre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_curso')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
