<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AsignacionUsuarioCurso */

$this->title = 'Create Asignacion Usuario Curso';
$this->params['breadcrumbs'][] = ['label' => 'Asignacion Usuario Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignacion-usuario-curso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
