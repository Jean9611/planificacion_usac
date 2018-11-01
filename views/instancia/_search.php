<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstanciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instancia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_instancia') ?>

    <?= $form->field($model, 'seccion') ?>

    <?= $form->field($model, 'semestre') ?>

    <?= $form->field($model, 'id_curso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
