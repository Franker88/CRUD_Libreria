<?php
	
	$conexion= new mysqli("localhost","root","","biblioteca_franco");

	$idlib=$_REQUEST['id_libro'];

	//Id del autor
	$query=$conexion->query("SELECT id_autor FROM relacion_libro_autor WHERE id_libro='$idlib'");
	$resultado=mysqli_fetch_assoc($query);

	$ida=$resultado['id_autor'];

	//Id editorial
	$query=$conexion->query("SELECT id_editorial FROM relacion_libro_editorial WHERE id_libro='$idlib'");
	$resultado=mysqli_fetch_assoc($query);

	$ide=$resultado['id_editorial'];

	//Id clasificacion
	$query=$conexion->query("SELECT id_clasificacion FROM relacion_libro_clasificacion WHERE id_libro='$idlib'");
	$resultado=mysqli_fetch_assoc($query);

	$idc=$resultado['id_clasificacion'];

	//Id idioma
	$query=$conexion->query("SELECT id_idioma FROM relacion_libro_idioma WHERE id_libro='$idlib'");
	$resultado=mysqli_fetch_assoc($query);

	$idid=$resultado['id_idioma'];

	$conexion->query("DELETE FROM relacion_libro_autor WHERE id_libro=$idlib AND id_autor=$ida");
	$conexion->query("DELETE FROM relacion_libro_editorial WHERE id_libro=$idlib AND id_editorial=$ide");
	$conexion->query("DELETE FROM relacion_libro_clasificacion WHERE id_libro=$idlib AND id_clasificacion=$idc");
	$conexion->query("DELETE FROM relacion_libro_idioma WHERE id_libro=$idlib AND id_idioma=$idid");
	$conexion->query("DELETE FROM libros WHERE id_libro=$idlib");


	echo "Libro Eliminado Exitosamente";
?>
<br/><a href="Consultar_libro.php">Volver</a>