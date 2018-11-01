<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Asignacion1 */

$this->title = 'Asignar catedratico';
$this->params['breadcrumbs'][] = ['label' => 'Asignacion1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignacion1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
