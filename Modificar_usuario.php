<?php
	$conexion = new mysqli("localhost","root","","biblioteca_franco");
	
	$idu=$_POST['id_usuario'];
	$nombre=$_POST['nombre_usuario'];
	$apellido=$_POST['apellido_usuario'];
	$tlf=$_POST['telefono'];
	$ema=$_POST['correo'];
	$car=$_POST['carrera'];
	$gen=$_POST['genero'];
	$nac=$_POST['nacionalidad'];
	$tur=$_POST['turno'];

	//Agregar nuevo usuario
	$conexion->query("UPDATE usuario SET nombre_usuario='$nombre', apellido_usuario='$apellido', telefono='$tlf', correo='$ema' WHERE id_usuario=$idu");
		
	//Buscar IDS
	$query=$conexion->query("SELECT id_carrera FROM carrera_usuario WHERE carrera='$car'");
	$resultado=mysqli_fetch_assoc($query);

	$idcar=$resultado['id_carrera'];

	$query=$conexion->query("SELECT id_genero FROM genero_usuario WHERE genero='$gen'");
	$resultado=mysqli_fetch_assoc($query);

	$idgen=$resultado['id_genero'];

	$query=$conexion->query("SELECT id_nacionalidad FROM nacionalidad_usuario WHERE nacionalidad='$nac'");
	$resultado=mysqli_fetch_assoc($query);

	$idnac=$resultado['id_nacionalidad'];

	$query=$conexion->query("SELECT id_turno FROM turno_usuario WHERE turno='$tur'");
	$resultado=mysqli_fetch_assoc($query);

	$idtur=$resultado['id_turno'];


	//Actualizar dato
	$conexion->query("UPDATE carrera_usuario SET carrera='$car' WHERE id_carrera=$idcar");

	//Actualizar dato
	$conexion->query("UPDATE genero_usuario SET genero='$gen' WHERE id_genero=$idgen");

	//Actualizar dato
	$conexion->query("UPDATE nacionalidad_usuario SET nacionalidad='$nac' WHERE id_nacionalidad=$idnac");
	
	//Actualizar dato
	$conexion->query("UPDATE turno_usuario SET turno='$tur' WHERE id_turno=$idtur");

			echo "Usuario Modificado Exitosamente";
			?>
			<br/><a href="Consultar_usuario.php">Volver</a>
