<?php
//Inicia sesión
session_start();
$usuario = $_SESSION['username'];

include 'conexion.php';

$sentencia="SELECT * FROM `editoriales` WHERE idEditorial='".$_GET['no']."' ";
$resultado = mysqli_query(Conectarse(), $sentencia);
$filas=mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="css/css/font-awesome.min.css">
	  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

	 <!-- Estilos en CSS -->
	<?php include("includes/estilos.php"); ?>
	  
	<!-- Pestaña -->
    <title>Editoriales</title>
	<link rel="icon" href="images/Escudo-ITESG.png" />

</head>
<body>
	  <!-- Encabezado -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      		<li class="nav-item">
        		<a class="nav-link" href="Usuarios.php"><i class="fa fa-user"></i> Editoriales</a>
      		</li>
    	</ul>
		<ul>
		<?php
		//Muestra usuario logueado
		if(!isset($usuario)){
			header("location: Login.php");
			echo "¡¡La sesión ha caducado!! ";
			echo "<br><a href='salir.php'>Identificate nuevamente</a>";
		}else{
			echo "<a>Bienvenido <strong>$usuario </strong></a>";
			echo "<a href= 'salir.php'> Salir</a>";
		}
		?>
		</ul>
  		</div>
	</nav>
	<br>
	<div class="container" align="center">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-8">
					<div class="card spur-card">
						<div class="card-header texto">
							<div class="spur-card-title font-weight-bold"></div>
						</div>
						<div class="card-body">
							<span class="texto"><h3>Modificar Editorial</h3> </span>
							<br>
							<form action="modif_editorial2.php" method="post" enctype="multipart/form-data" style="border-collapse: separate; border-spacing: 10px 5px;">	  					
								<input id="no" type="hidden" name="no" value="<?php echo $filas['no']?> ">
								<input id="id" type="hidden" name="id" value="<?php echo $filas['idEditorial']?> ">
								<label><strong>Nombre: </strong></label>
								<input type="text" id="nombre" name="nombre" value="<?php echo $filas['nomEditorial'] ?>" required><br>
								<label><strong>País: </strong></label>
								<input type="text" id="pais" name="pais" value="<?php echo $filas['paisEditorial'] ?>" required><br>
								<label><strong>Descripción: </strong></label>
								<input type="text" id="desc" name="desc" value="<?php echo $filas['descEditorial'] ?>" required><br>
								<br><br>
							<button type="submit" class="btn btn-outline-success">Modificar</button>
							<a href="Editoriales.php" class="btn btn-outline-secondary"> Cancelar</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
  //Cuando la página esté cargada completamente
  $(document).ready(function(){
    //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
    setTimeout(refrescar, 1200000);	//20 min
  });
  function refrescar(){
    //Actualiza la página
    location.reload();
  }
</script>