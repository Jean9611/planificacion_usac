<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido!</h1>

        <p class="lead">Desde esta herramienta te ayudaremos a que puedas planificar tus clases y laboratorios.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Administrar Usuarios</h2>

                <p>Administra los catedraticos y tutores academicos registrados en la plataforma o crea nuevos.</p>

                <p><a class="btn btn-default" href="?r=usuario">Admin usuarios</a></p>
            </div>
            <div class="col-lg-6">
                <h2>Administrar Cursos</h2>

                <p>Administra los cursos registrados en la plataforma o crea nuevos.</p>

                <p><a class="btn btn-default" href="?r=curso">Admin cursos</a></p>
            </div>
        </div>

    </div>
</div>
