<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompetenciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Competencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competencia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Competencia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_competencia',
            'nombre',
            'descripcion',
            [
                'header' => 'Perfil',
                'attribute' => 'perfil.nombre',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
