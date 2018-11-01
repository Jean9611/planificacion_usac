<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Asignacion1 */

$this->title = 'Modificar asignacion: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Asignacion1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'username' => $model->username, 'id_curso' => $model->id_curso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asignacion1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
