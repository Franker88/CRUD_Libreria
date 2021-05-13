<?php
	
	$conexion= new mysqli("localhost","root","","biblioteca_franco");

	$idlib=$_REQUEST['id_libro'];
	$titulo=$_POST['titulo'];
	$na=$_POST['nombre_autor'];
	$aa=$_POST['apellido_autor'];
	$edi=$_POST['editorial'];
	$clas=$_POST['clasificacion'];
	$pub=$_POST['publicacion'];
	$idi=$_POST['idioma'];
	$eje=$_POST['ejemplares'];
	$cot=$_POST['cota'];

	//Se actualizan todos los datos
	$conexion->query("UPDATE libros SET titulo='$titulo', ejemplares='$eje', cota='$cot', publicacion='$pub' WHERE id_libro=$idlib ");

	//Id del autor
	$query=$conexion->query("SELECT id_autor FROM relacion_libro_autor WHERE id_libro='$idlib'");
	$resultado=mysqli_fetch_assoc($query);

	$ida=$resultado['id_autor'];

	//Actualizar autor
	$conexion->query("UPDATE autores_libros SET nombre_autor='$na', apellido_autor='$aa' WHERE id_autor=$ida");

	//Id editorial
	$query=$conexion->query("SELECT id_editorial FROM relacion_libro_editorial WHERE id_libro='$idlib'");
	$resultado=mysqli_fetch_assoc($query);

	$ide=$resultado['id_editorial'];

	//Actualizar editorial
	$conexion->query("UPDATE editorial SET editorial='$edi' WHERE id_editorial=$ide");

	//Id clasificacion
	$query=$conexion->query("SELECT id_clasificacion FROM relacion_libro_clasificacion WHERE id_libro='$idlib'");
	$resultado=mysqli_fetch_assoc($query);

	$idc=$resultado['id_clasificacion'];

	//Actualizar clasificacion
	$conexion->query("UPDATE clasificacion SET clasificacion='$clas' WHERE id_editorial=$idc");

	//Id idioma
	$query=$conexion->query("SELECT id_idioma FROM relacion_libro_idioma WHERE id_libro='$idlib'");
	$resultado=mysqli_fetch_assoc($query);

	$idid=$resultado['id_idioma'];

	//Actualizar idioma
	$conexion->query("UPDATE idioma SET idioma='$idi' WHERE id_editorial=$idid");

	echo "Modificacion Exitosa";
	?>
	<br/><a href="Consultar_libro.php">Volver</a>
	<?php
?>