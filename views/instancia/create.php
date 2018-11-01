<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Instancia */

$this->title = 'Crear seccion';
$this->params['breadcrumbs'][] = ['label' => 'Instancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instancia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
