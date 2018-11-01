<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActividadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actividades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="col-lg-7">
        <p>
                <?= Html::a('Crear actividad', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="col-lg-5">
        <p><a class="btn btn-default" href="?r=competencia">Administrar competencias</a>
        <a class="btn btn-default" href="?r=indicador">Administrar indicadores</a></p>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_actividad',
            'nombre',
            'descripcion',
            'recursos',
            [
                'header' => 'Competencia',
                'attribute' => 'competencia.nombre',
            ],
            [
                'header' => 'Perfil',
                'attribute' => 'competencia.perfil.nombre',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
