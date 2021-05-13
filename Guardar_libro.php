<?php
	$conexion = new mysqli("localhost","root","","biblioteca_franco");
	
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

	//Verificar existencia de libro
	$query=$conexion->query("SELECT COUNT(id_libro) AS Existen FROM libros WHERE titulo='$titulo' AND publicacion=$pub");
	$resultado=mysqli_fetch_assoc($query);

	$el=$resultado['Existen'];

	if($el==0){
		//Agregar nuevo libro
		$conexion->query("INSERT INTO libros(titulo,ejemplares,cota,publicacion) values('$titulo',$eje,'$cot',$pub)");
		
	}
	else{
		//Ya existe
		echo "Libro ya existente, si desea aumentar los ejemplares vaya a la opcion de modificar y cambie la cantidad de ejemplares";

		echo '<br/><a href="Añadir_libro.php">Volver</a>';
	}

	//Verificar autores
	$query=$conexion->query("SELECT COUNT(id_autor) AS Existen FROM autores_libros WHERE nombre_autor='$na' AND apellido_autor='$aa'");
	$resultado=mysqli_fetch_assoc($query);

	$e=$resultado['Existen'];

	if($e==0){
		//Agregar autor
		$conexion->query("INSERT INTO autores_libros(nombre_autor,apellido_autor) values('$na','$aa')");

	}

	//Verificar Editorial
	$query=$conexion->query("SELECT COUNT(id_editorial) AS Existen FROM editorial WHERE editorial='$edi'");
	$resultado=mysqli_fetch_assoc($query);

	$e=$resultado['Existen'];

	if($e==0){
		//Agregar editorial
		$conexion->query("INSERT INTO editorial(editorial) values('$edi')");

	}

	//Verificar Clasificacion
	$query=$conexion->query("SELECT COUNT(id_clasificacion) AS Existen FROM clasificacion WHERE clasificacion='$clas'");
	$resultado=mysqli_fetch_assoc($query);

	$e=$resultado['Existen'];

	if($e==0){
		//Agregar Clasificacion
		$conexion->query("INSERT INTO clasificacion(clasificacion) values('$clas')");

	}

	//Verificar Idioma
	$query=$conexion->query("SELECT COUNT(id_idioma) AS Existen FROM idioma_libro WHERE idioma='$idi'");
	$resultado=mysqli_fetch_assoc($query);

	$e=$resultado['Existen'];

	if($e==0){
		//Agregar Idioma
		$conexion->query("INSERT INTO idioma_libro(idioma) values('$idi')");
	}

	//Busqueda de Id para las relaciones
	$query=$conexion->query("SELECT id_libro FROM libros WHERE titulo='$titulo' AND publicacion='$pub'");
	$resultado=mysqli_fetch_assoc($query);

	$idlib=$resultado['id_libro'];

	$query=$conexion->query("SELECT id_autor FROM autores_libros WHERE nombre_autor='$na' AND apellido_autor='$aa'");
	$resultado=mysqli_fetch_assoc($query);

	$ida=$resultado['id_autor'];

	$query=$conexion->query("SELECT id_editorial FROM editorial WHERE editorial='$edi'");
	$resultado=mysqli_fetch_assoc($query);

	$ide=$resultado['id_editorial'];

	$query=$conexion->query("SELECT id_clasificacion FROM clasificacion WHERE clasificacion='$clas'");
	$resultado=mysqli_fetch_assoc($query);

	$idc=$resultado['id_clasificacion'];

	$query=$conexion->query("SELECT id_idioma FROM idioma_libro WHERE idioma='$idi'");
	$resultado=mysqli_fetch_assoc($query);

	$idid=$resultado['id_idioma'];

	//Revisar existencia de Relaciones
	$query=$conexion->query("SELECT COUNT(id_libro) AS relacion FROM relacion_libro_autor WHERE id_libro=$idlib AND id_autor='$ida'");
	$resultado=mysqli_fetch_assoc($query);

	$r=$resultado['relacion'];

	if($r==0){
		//Ingresa Relacion
		$conexion->query("INSERT INTO relacion_libro_autor values($idlib,$ida)");
	}

	$query=$conexion->query("SELECT COUNT(id_libro) AS relacion FROM relacion_libro_editorial WHERE id_libro=$idlib AND id_editorial='$ide'");
	$resultado=mysqli_fetch_assoc($query);

	$r=$resultado['relacion'];

	if($r==0){
		//Ingresar Relacion
		$conexion->query("INSERT INTO relacion_libro_editorial values($idlib,$ide)");
	}

	$query=$conexion->query("SELECT COUNT(id_libro) AS relacion FROM relacion_libro_clasificacion WHERE id_libro=$idlib AND id_clasificacion='$idc'");
	$resultado=mysqli_fetch_assoc($query);

	$r=$resultado['relacion'];

	if($r==0){
		//Ingresar Relacion
		$conexion->query("INSERT INTO relacion_libro_clasificacion values($idlib,$idc)");
	}

	$query=$conexion->query("SELECT COUNT(id_libro) AS relacion FROM relacion_libro_idioma WHERE id_libro=$idlib AND id_idioma='$idid'");
	$resultado=mysqli_fetch_assoc($query);

	$r=$resultado['relacion'];

	if($r==0){
		//Ingresar Relacion
		$conexion->query("INSERT INTO relacion_libro_idioma values($idlib,$idid)");
	}



	
		if($el==0){
			echo "Libro Añadido Exitosamente";
			?>
			<br/><a href="Añadir_libro.php">Volver</a>
			<?php
		}

?>


