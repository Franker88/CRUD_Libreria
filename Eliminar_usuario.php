<?php
	
	$conexion= new mysqli("localhost","root","","biblioteca_franco");

	$idu=$_REQUEST['id_usuario'];

	//Id del autor
	$query=$conexion->query("SELECT id_carrera FROM relacion_usuario_carrera WHERE id_usuario='$idu'");
	$resultado=mysqli_fetch_assoc($query);

	$idcar=$resultado['id_carrera'];

	//Id editorial
	$query=$conexion->query("SELECT id_genero FROM relacion_usuario_genero WHERE id_usuario='$idu'");
	$resultado=mysqli_fetch_assoc($query);

	$idgen=$resultado['id_genero'];

	//Id clasificacion
	$query=$conexion->query("SELECT id_nacionalidad FROM relacion_usuario_nacionalidad WHERE id_usuario='$idu'");
	$resultado=mysqli_fetch_assoc($query);

	$idnac=$resultado['id_nacionalidad'];

	//Id idioma
	$query=$conexion->query("SELECT id_turno FROM relacion_usuario_turno WHERE id_usuario='$idu'");
	$resultado=mysqli_fetch_assoc($query);

	$idtur=$resultado['id_turno'];

	$conexion->query("DELETE FROM relacion_usuario_carrera WHERE id_usuario=$idu AND id_carrera=$idcar");
	$conexion->query("DELETE FROM relacion_usuario_genero WHERE id_usuario=$idu AND id_genero=$idgen");
	$conexion->query("DELETE FROM relacion_usuario_nacionalidad WHERE id_usuario=$idu AND id_nacionalidad=$idnac");
	$conexion->query("DELETE FROM relacion_usuario_turno WHERE id_usuario=$idu AND id_turno=$idtur");
	$conexion->query("DELETE FROM usuario WHERE id_usuario=$idu");


	echo "Usuario Eliminado Exitosamente";
?>
<br/><a href="Consultar_usuario.php">Volver</a>