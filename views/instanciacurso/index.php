<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstanciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instancias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instancia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Instancia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_instancia',
            'seccion',
            'semestre',
            'id_curso',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
