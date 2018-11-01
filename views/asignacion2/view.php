<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Asignacion2 */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Asignacion2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignacion2-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'username' => $model->username, 'id_instancia' => $model->id_instancia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'username' => $model->username, 'id_instancia' => $model->id_instancia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'id_instancia',
        ],
    ]) ?>

</div>
