<?php
//Inicia sesión
session_start();
$usuario = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header('location: Login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="htmlcss bootstrap, multi level menu, submenu, treeview nav menu examples" />
	<meta name="description" content="Bootstrap 5 navbar multilevel treeview examples for any type of project, Bootstrap 5" />  

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="css/css/font-awesome.min.css">
	  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Estilos en CSS -->
	<?php include("includes/estilos.php"); ?>
	  
	<!-- Pestaña -->
    <title>Carga de Solicitudes de credencial del CI</title>
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
        		<a class="nav-link" href="Solicitudes.php"><i class="fa fa-sign-in"></i> Solicitudes</a>
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

<main class="dash-content">
	<h1 align="center" class="texto">Carga de Solicitudes en el Centro de Información</h1><br>	
	
	<div class="row">
	  <div class="col-md-7">
		<form action="validacionUsuarios.php" method="POST" enctype="multipart/form-data"/>
		<h3 align="center" class="texto">Elegir Archivo Excel</h3>
			<div class="file-input text-center">
				<input  type="file" name="dataCliente" id="file-input" class="file-input__input"/>
				<label class="file-input__label" for="file-input"><i class="zmdi zmdi-upload zmdi-hc-2x"></i></label>
			</div>
			<div class="text-center mt-5"><input type="submit" name="subir" class="btn-enviar" value="Subir Excel"/></div>
		</form>
	  </div>
  	</div>

	</main>
	  
    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="'js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
