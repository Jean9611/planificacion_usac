<?php

	function get_curso_info($instancia){
		$query = "SELECT c.id_curso as id_curso, curso, seccion, u.username, u.nombre as nombre, u2.nombre, i.id_instancia
		FROM Curso c, Instancia i, Usuario u, asignacion_usuario_curso a, asignacion_usuario_instancia ai, Usuario u2
		WHERE c.id_curso = i.id_curso 
			AND c.id_curso = a.id_curso 
			AND u.username = a.username
			AND i.id_instancia = $instancia
			AND i.id_instancia = ai.id_instancia
			AND ai.username = u2.username
			ORDER BY i.id_instancia desc limit 1";
	    $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'root', 'jean11');

	    $sentencia = $mbd->prepare($query);
	    $sentencia->execute();
	    while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
	    	return $fila;
	    }
	}

	function get_perfil($instancia){
		$query = "SELECT descripcion, id_perfil FROM Perfil WHERE id_instancia = $instancia";
	    $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'root', 'jean11');
	    $sentencia = $mbd->prepare($query);
	    $sentencia->execute();
	    while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
	    	return $fila;
	    }
	}

	function get_competencias($perfil){
		$query = "SELECT nombre, descripcion FROM Competencia WHERE id_perfil = $perfil";
	    $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'root', 'jean11');

	    $sentencia = $mbd->prepare($query);
	    $sentencia->execute();
	    $salida = "";
	    $primera = 1;
	    while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			if($primera == 1){
			    $salida .= "<b>".$fila[0].": </b> ".$fila[1];
			    $primera = 0;
			}else{
		    	    $salida .= "<br/><br/><b>".$fila[0].": </b> ".$fila[1];
			}
	    }
	    return $salida;
	}

	

	function get_actividades($perfil){
		$query = "SELECT Competencia.nombre, Competencia.id_competencia FROM Competencia WHERE Competencia.id_perfil = $perfil";
	    $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'root', 'jean11');

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
		$query = "SELECT Actividad.nombre, Actividad.descripcion, Actividad.recursos FROM Actividad WHERE Actividad.id_competencia = $competencia";
	    $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'root', 'jean11');
	    $sentencia = $mbd->prepare($query);
	    $sentencia->execute();
	    $salida = "";
	    $primera = 1;
	    while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
	    	$salida .= "<tr>";
	    	if($primera == 1){
	    		$count_actividad = get_actividades_count($competencia);
	    		$salida .= "<th rowspan=\"$count_actividad\">".$nombre."</th>";
	    		$primera = 0;
	    	}
	    	$salida .= "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td>";
	    	$salida .= "</tr>";
	    }
	    return $salida;
	}

	

	function get_actividades_count($competencia){
		$query = "SELECT count(*) FROM Actividad WHERE Actividad.id_competencia = $competencia";
	    $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'root', 'jean11');

	    $sentencia = $mbd->prepare($query);
	    $sentencia->execute();
	    while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			return $fila[0];
	    }
	    return 1;
	}


	function generar_reporte($instancia){
		$schema = file_get_contents('reporte_diseño.html');
		$curso = get_curso_info($instancia);
		$schema = str_replace("{%cod_curso%}", $curso[0], $schema);
		$schema = str_replace("{%curso%}", $curso[1], $schema);
		$schema = str_replace("{%seccion%}", $curso[2], $schema);
		$schema = str_replace("{%catedratico%}", $curso[4], $schema);
		$schema = str_replace("{%tutor%}", $curso[5], $schema);

		$perfil = get_perfil($curso[6]);
		$schema = str_replace("{%perfil%}", $perfil[0], $schema);

		$competencias = get_competencias($perfil[1]);
		$schema = str_replace("{%competencias%}", $competencias, $schema);

		$actividades = get_actividades($perfil[1]);
		$schema = str_replace("{%actividades%}", $actividades, $schema);
		echo $schema;
	}

	$instancia = $_GET['id'];
	generar_reporte($instancia);
?>
