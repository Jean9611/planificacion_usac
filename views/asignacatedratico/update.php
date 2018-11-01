<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AsignacionUsuarioCurso */

$this->title = 'Update Asignacion Usuario Curso: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Asignacion Usuario Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'username' => $model->username, 'id_curso' => $model->id_curso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asignacion-usuario-curso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
