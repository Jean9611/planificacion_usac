<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Competencia */

$this->title = 'Create Competencia';
$this->params['breadcrumbs'][] = ['label' => 'Competencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
