<?php 
include 'conexion.php';

//Se ingresa en libros
NuevoLibro($_POST['fecha'], $_POST['tipo'], $_POST['adqui'], $_POST['Nclasific'], $_POST['idTitulo'], $_POST['idEdit'], $_POST['numEjemplar'], $_POST['status'], $_POST['stock'], $_POST['desc'], $_POST['disponible'], $_POST['edicion'], $_POST['idCarrera']);

function NuevoLibro($fcha, $tipo, $nAdqui, $nClasific, $titulo, $editor, $nEjemplar, $estatus, $stok, $desc, $disponible, $edicion, $carr)
{
	$sentencia="INSERT INTO libros (fechaLibro, tipoLibro, noAdquiLibro, noClasificLibro, idTitulo, idEditorial, noEjemplarL, tomoLibro, idColeccion, estatusLibro, descLibro, disponibleLibro, edicionLibro, idCarrera) VALUES ('".$fcha."', '".$tipo."', '".$nAdqui."', '".$nClasific."', '".$titulo."', '".$editor."', '".$nEjemplar."', '1', '1', '".$estatus."', '".$desc."', '".$disponible."', '".$edicion."', '".$carr."')";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}

//Se valida número de autor
$autor1=$_POST['idAutor1'];
$autor2=$_POST['idAutor2'];
$autor3=$_POST['idAutor3'];

if($autor1<>"Seleccione..."){
//Se ingresa en libro_autor1
NuevoLibroAutor1($_POST['id'], $_POST['autor1']);
	function NuevoLibroAutor1($libro, $autor)
	{
		$sentencia="INSERT INTO libro_autor (idLibro, idAutor) VALUES ('".$libro."', '".$autor."')";
		$resultado = mysqli_query(Conectarse(), $sentencia);
	}
}


//Se modifica la existencia en titulos
//ModificarTitulo($_POST['stock'], $_POST['id']);
//
//function ModificarTitulo($estoc, $id)
//{
//	$sentencia="UPDATE titulos SET existenciaT= '".$nom."' WHERE idTitulo='".$id."'";
//	$resultado = mysqli_query(Conectarse(), $sentencia);
//}
?>

<script type="text/javascript">
	/*alert("Libro Ingresado exitosamente");*/
	window.location.href='Libros.php';
</script>