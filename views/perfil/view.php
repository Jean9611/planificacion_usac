<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Perfil */

$this->title = $model->id_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_perfil], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_perfil], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <a class="btn btn-default" href="/duplicar_perfil.php?id=<?php echo $this->title; ?>">Duplicar</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_perfil',
            'nombre',
            'descripcion',
            'id_instancia',
        ],
    ]) ?>

</div>
