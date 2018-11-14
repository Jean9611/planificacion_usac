<?php

	function newPerfil($perfil_old){
		$query = "INSERT INTO Perfil (nombre, descripcion, id_instancia) SELECT CONCAT('Copia de ',nombre), descripcion, id_instancia FROM Perfil WHERE id_perfil = $perfil_old";
	    $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'planificacion_user', 'jean11');

	    $sentencia = $mbd->prepare($query);
	    $sentencia->execute();

		$query = "SELECT LAST_INSERT_ID();";

	    $sentencia = $mbd->prepare($query);
	    $sentencia->execute();
	    while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			return $fila[0];
	    }
	    return 1;
	}


	function duplicarCompetencias($perfil_old, $perfil){
		$query = "SELECT * FROM Competencia WHERE id_perfil = $perfil_old";
	    $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'planificacion_user', 'jean11');
	    $sentencia = $mbd->prepare($query);
	    $sentencia->execute();
	    while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			$query = "INSERT INTO Competencia (nombre, descripcion, id_perfil) VALUES ('".$fila[1]."', '".$fila[2]."', ".$perfil." )";
		    $sentencia = $mbd->prepare($query);
		    $sentencia->execute();

			$query = "SELECT LAST_INSERT_ID();";

		    $sentencia = $mbd->prepare($query);
		    $sentencia->execute();
		    while ($last = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
		    	duplicarActividad($fila[0], $last[0]);
		    }
	    }
	}


	function duplicarActividad($competencia_old, $competencia){
		$query = "INSERT INTO Actividad (nombre, descripcion, id_competencia) SELECT nombre, descripcion $competencia FROM Actividad where id_competencia = $competencia_old";
	    $mbd = new PDO('mysql:host=localhost;dbname=planificaciondb;charset=utf8;', 'planificacion_user', 'jean11');

	    $sentencia = $mbd->prepare($query);
	    $sentencia->execute();
	}


	function crearPerfil($perfil_old){
		$perfil = newPerfil($perfil_old);
		duplicarCompetencias($perfil_old, $perfil);
		return $perfil;
	}

	$perfil = $_GET['id'];
	$new_perfil = crearPerfil($perfil);
	header("Location: http://192.168.1.18/index.php?r=perfil%2Fupdate&id=$new_perfil");
	die();
?>
