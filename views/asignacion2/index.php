<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Asignacion2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignacion de tutores academicos a seccion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignacion2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="col-lg-8">
        <p>
                <?= Html::a('Crear asignacion', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="col-lg-4">
        <p><a class="btn btn-default" href="?r=instancia">Administrar secciones</a>
        <a class="btn btn-default" href="?r=usuario">Administrar tutores</a></p>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'instancia.curso.curso',
            'instancia.seccion',
            'instancia.semestre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
