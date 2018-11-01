<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Asignacion1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignacion de catedraticos a cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignacion1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="col-lg-8">
        <p>
                <?= Html::a('Crear asignacion', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="col-lg-4">
        <p><a class="btn btn-default" href="?r=curso">Administrar cursos</a>
    	<a class="btn btn-default" href="?r=usuario">Administrar catedraticos</a></p>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'id_curso',
            'curso.curso',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
