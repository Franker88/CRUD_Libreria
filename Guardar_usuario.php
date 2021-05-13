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
	$tip=$_POST['tipo_usuario'];
	$tur=$_POST['turno'];

	//Verificar existencia de usuario
	$query=$conexion->query("SELECT COUNT(id_usuario) AS Existen FROM usuario WHERE id_usuario='$idu'");
	$resultado=mysqli_fetch_assoc($query);

	$eu=$resultado['Existen'];

	if($eu==0){
		//Agregar nuevo usuario
		$conexion->query("INSERT INTO usuario(id_usuario,nombre_usuario,apellido_usuario,telefono,correo) values('$idu','$nombre','$apellido','$tlf','$ema')");
		
	}
	else{
		//Ya existe
		echo "Usuario ya existente";

		echo '<br/><a href="Añadir_usuario.php">Volver</a>';
	}

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

	$query=$conexion->query("SELECT id_tipo FROM tipo_usuario WHERE tipo_usuario='$tip'");
	$resultado=mysqli_fetch_assoc($query);

	$idtip=$resultado['id_tipo'];

	$query=$conexion->query("SELECT id_turno FROM turno_usuario WHERE turno='$tur'");
	$resultado=mysqli_fetch_assoc($query);

	$idtur=$resultado['id_turno'];


	//Añadir relacion
	$conexion->query("INSERT INTO relacion_usuario_carrera VALUES('$idu','$idcar')");

	//Añadir relacion
	$conexion->query("INSERT INTO relacion_usuario_genero VALUES('$idu','$idgen')");

	//Añadir relacion
	$conexion->query("INSERT INTO relacion_usuario_nacionalidad VALUES('$idu','$idnac')");
	
	//Añadir relacion
	$conexion->query("INSERT INTO relacion_usuario_tipo(id_usuario,id_tipo) VALUES('$idu','$idtip')");

	//Añadir relacion
	$conexion->query("INSERT INTO relacion_usuario_turno VALUES('$idu','$idtur')");

		if($eu==0){
			echo "Usuario Añadido Exitosamente";
			?>
			<br/><a href="Añadir_usuario.php">Volver</a>
			<?php
		}

?>
