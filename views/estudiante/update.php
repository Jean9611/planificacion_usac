<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */

$this->title = 'Update Estudiante: ' . $model->carnet;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->carnet, 'url' => ['view', 'id' => $model->carnet]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudiante-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
