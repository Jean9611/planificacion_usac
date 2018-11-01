<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Asignacion1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asignacion1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_curso')->dropDownList(ArrayHelper::map(app\models\Curso::find()->all(),'id_curso','curso'), ['prompt'=>'Seleccione el curso']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
