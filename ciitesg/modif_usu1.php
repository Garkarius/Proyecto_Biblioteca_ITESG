<?php
//Inicia sesión
session_start();
$usuario = $_SESSION['username'];

include 'conexion.php';

$sentencia="SELECT * FROM `usuarios` WHERE idUsuario='".$_GET['no']."' ";
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
    <title>Permisos CI</title>
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
        		<a class="nav-link" href="Usuarios.php"><i class="fa fa-user"></i> Usuarios</a>
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
							<span class="texto"><h3>Modificar Usuario</h3> </span>
							<br>
							<form action="modif_usu2.php" method="post" enctype="multipart/form-data" style="border-collapse: separate; border-spacing: 10px 5px;">	  					
								<!-- <input id="no" type="hidden" name="no" value="<?php echo $filas['no']?> "> -->
								<input id="id" type="hidden" name="id" value="<?php echo $filas['idUsuario']?> ">
								<label><strong>Númeo de control: </strong></label>
								<input type="text" id="ncontrol" name="ncontrol" value="<?php echo $filas['noControl'] ?>" required><br>
								<label><strong>Nombre: </strong></label>
								<input type="text" id="nombre" name="nombre" value="<?php echo $filas['nomUsuario'] ?>" required><br>
								<label><strong>Paterno: </strong></label>
								<input type="text" id="paterno" name="paterno" value="<?php echo $filas['paternoUsuario'] ?>" required><br>
								<label><strong>Materno: </strong></label>
								<input type="text" id="materno" name="materno" value="<?php echo $filas['maternoUsuario'] ?>" required><br>
								<label><strong>Tipo de usuario:</strong></label>
    							<select id="tipo" name="tipo" class="form-control col-3" value="<?php echo $filas['tipoUsuario'] ?>">
									<option><?php echo $filas['tipoUsuario'] ?></option>
									<option>Administrador</option>
									<option>Editor</option>
									<option>Consultor</option>
								</select>
								<label><strong>Carrera: </strong></label>
								<select id="carrera" name="carrera" class="form-control col-3" value="<?php echo $filas['idCarrera'] ?>">
									<option><?php echo $filas['idCarrera'] ?></option>
									<option>1</option>
      								<option>2</option>
      								<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
								<label><strong>Correo: </strong></label>
								<input type="text" id="correo" name="correo" value="<?php echo $filas['mailUsuario'] ?>" required><br>
								<label><strong>CURP: </strong></label>
								<input type="text" id="curp" name="curp" value="<?php echo $filas['curpUsuario'] ?>" required><br>
								<label><strong>Teléfono: </strong></label>
								<input type="text" id="tel" name="tel" value="<?php echo $filas['telUsuario'] ?>" required><br>
								<label><strong>Estatus: </strong></label>
								<input type="text" id="status" name="status" value="<?php echo $filas['estatusUsuario'] ?>" required><br>
								<label><strong>Dirección: </strong></label>
								<input type="text" id="dir" name="dir" value="<?php echo $filas['dirUsuario'] ?>" required><br>
								<br><br>
							<button type="submit" class="btn btn-outline-success">Modificar</button>
							<a href="Usuarios.php" class="btn btn-outline-secondary"> Cancelar</a>
							</form>
						</div>
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