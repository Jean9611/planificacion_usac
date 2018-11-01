<?php

    /* @var $this yii\web\View */

    $this->title = 'My Yii Application';

    function get_curso_info($username){
        $query = "SELECT c.id_curso as id_curso, curso, seccion, u.username, u.nombre as nombre, u2.nombre, i.id_instancia
        FROM Curso c, Instancia i, Usuario u, asignacion_usuario_curso a, Usuario u2
        WHERE c.id_curso = i.id_curso 
            AND c.id_curso = a.id_curso 
            AND u.username = a.username
            AND u.username = '$username'
            ORDER BY i.id_instancia desc limit 1";
        $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'planificacion_user', 'jean11');

        $sentencia = $mbd->prepare($query);
        $sentencia->execute();
        while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            return $fila;
        }
    }

    function get_perfil($instancia){
        $query = "SELECT descripcion, id_perfil FROM Perfil WHERE id_instancia = $instancia";
        $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'planificacion_user', 'jean11');
        $sentencia = $mbd->prepare($query);
        $sentencia->execute();
        while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            return $fila;
        }
    }

    function get_actividades($perfil){
        $query = "SELECT Competencia.nombre, Competencia.id_competencia FROM Competencia WHERE Competencia.id_perfil = $perfil";
        $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'planificacion_user', 'jean11');

        $sentencia = $mbd->prepare($query);
        $sentencia->execute();
        $salida = "<table border=\"1\" width=\"100%\">";
        $salida .= "
            <tr>
              <th width=\"20%\">Competencia:</th>
              <th width=\"20%\">Actividad:</td>
              <th width=\"30%\">Descripción:</td>
              <th width=\"30%\">Recursos:</td>
            </tr>";
        while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            $actividad = get_actividades_competencia($fila[1], $fila[0]);
            $salida .= $actividad;
        }
        $salida .= "</table>";
        return $salida;
    }

    function get_actividades_competencia($competencia, $nombre){
        $query = "SELECT Actividad.nombre, Actividad.descripcion, Actividad.recursos, id_actividad FROM Actividad WHERE Actividad.id_competencia = $competencia";
        $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'planificacion_user', 'jean11');
        $sentencia = $mbd->prepare($query);
        $sentencia->execute();
        $salida = "";
        $primera = 1;
        while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            $salida .= "<tr>";
            if($primera == 1){
                $count_actividad = get_actividades_count($competencia);
                $salida .= "<th rowspan=\"$count_actividad\"><a href='index.php?r=competencia%2Fview&id=$competencia'>".$nombre."</a></th>";
                $primera = 0;
            }
            $salida .= "<td><a href='index.php?r=actividad%2Fview&id=$fila[3]'>".$fila[0]."</a></td><td>".$fila[1]."</td><td>".$fila[2]."</td>";
            $salida .= "</tr>";
        }
        if($salida == ""){
            $salida .= "<tr><th><a href='index.php?r=competencia%2Fview&id=$competencia'>".$nombre."</a></th>"."<td></td><td></td><td></td></tr>";
        }
        return $salida;
    }

    function get_actividades_count($competencia){
        $query = "SELECT count(*) FROM Actividad WHERE Actividad.id_competencia = $competencia";
        $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'planificacion_user', 'jean11');

        $sentencia = $mbd->prepare($query);
        $sentencia->execute();
        while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            return $fila[0];
        }
        return 1;
    }
    $user = $this->params['user'];
    $schema = file_get_contents('dashboard_diseño.html');
    $curso = get_curso_info($user);
    $perfil = get_perfil($curso[6]);
    $schema = str_replace("{%instancia%}", $curso[6], $schema);
    if($perfil){
        $actividades = get_actividades($perfil[1]);
        $schema = str_replace("{%actividades%}", $actividades, $schema);
        echo $schema;
    }else{
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
        <?php
    }
    ?>
