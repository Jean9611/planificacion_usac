<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Instancia */

$this->title = 'Modificar seccion: ' . $model->id_instancia;
$this->params['breadcrumbs'][] = ['label' => 'Instancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_instancia, 'url' => ['view', 'id' => $model->id_instancia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instancia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
