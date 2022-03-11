<?php
//Inicia sesión
//session_start();
$usuario = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header('location: Login.php');
}
?>
<!-- Listado para menú -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
        		<a class="nav-link" href="Inicio.php"><i class="fa fa-home"></i> Inicio</a>
      		</li>
      		<li class="nav-item">
        		<a class="nav-link" href="Usuarios.php"><i class="fa fa-upload"></i> Permisos</a>
      		</li>
			<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o"></i> Material CI</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          			<a class="dropdown-item" href="Titulos.php"><i class="fa fa-book"></i> Títulos</a>
					<a class="dropdown-item" href="Autores.php"><i class="fa fa-th-large"></i> Autores</a>
          			<a class="dropdown-item" href="Editoriales.php"><i class="fa fa-check-square-o"></i> Editoriales</a>	
					<a class="dropdown-item" href="Colecciones.php"><i class="fa fa-cubes"></i> Colecciones</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="Carreras.php"><i class="fa fa-flag-o"></i> Carreras</a>
					<a class="dropdown-item" href="#Inventario.php"><i class="fa fa-list-ol"></i> Inventario</a>
        		</div>					
      		</li>
			<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-newspaper-o"></i> Reportes</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          			<a class="dropdown-item" href="#rPedidosXDia.php"><i class="fa fa-long-arrow-right"></i> Credenciales</a>
        		</div>					
      		</li>
    	</ul>
		<ul>
		<?php
			//Muestra usuario logueado
			if(!isset($usuario)){
				echo "¡¡La sesión ha caducado!! ";
				echo "<br><a href='salir.php'>Identificate nuevamente</a>";
				header("Location: Login.php");	
			}else{
				echo "<a>Bienvenido <strong>$usuario </strong></a>";
				echo "<a href= 'salir.php'> Salir</a>";
			}
		?>
		</ul>
  		</div>
	</nav>