<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Indicador */

$this->title = 'Crear Indicador';
$this->params['breadcrumbs'][] = ['label' => 'Indicadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
