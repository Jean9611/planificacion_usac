<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Asignacion2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asignacion2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_instancia')->dropDownList(ArrayHelper::map(app\models\Instancia::find()->all(),'id_curso','semestre', 'seccion'), ['prompt'=>'Seleccione la seccion']) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
