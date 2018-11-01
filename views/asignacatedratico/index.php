<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsignacionUsuarioCursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignacion Usuario Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignacion-usuario-curso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Asignacion Usuario Curso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
