<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IndicadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indicadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicador-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="col-lg-10">
        <p>
                <?= Html::a('Crear indicador', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="col-lg-2">
        <p><a class="btn btn-default" href="?r=curso">Administrar actividad</a></p>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_indicador',
            'tipo_indicador',
            'evaluacion',
            'id_actividad',
            'carnet',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
