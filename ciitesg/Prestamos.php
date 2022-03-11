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
    <title>Préstamos</title>
	<link rel="icon" href="images/Escudo-ITESG.png" />
</head>
<body>
	
<main class="dash-content">
	<!-- Menú -->
	<?php include("includes/menu.php"); ?><br>
	
	<h1 align="center" class="texto">Préstamos del Centro de Información</h1><br>	

	<form action="#sube.php" method="post" enctype="multipart/form-data" style="border-collapse: separate; border-spacing: 10px 5px;">
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-lg">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title texto" id="exampleModalLabel"></h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     	 		</div>
      			<div class="modal-body" align="center">
					<div class="todo">
  						<div id="contenido">  							
  							<span> <h4 class="texto">Ingreso de nuevo préstamo</h4> </span><br>
							<form action="#sube.php" method="post" enctype="multipart/form-data">
  								<label><strong>Folio: </strong></label>
  								<input type="text" id="nombre" name="nombre" required><br>
								<label><strong>Fecha: </strong></label>
  								<input type="text" id="user" name="user" required><br>
								<label><strong>Tipo de solicitud: </strong></label>
								<select id="tipo" name="tipo" class="form-control col-3" required>
									<option>Selecciona...</option>
      								<option>Primera vez</option>
      								<option>Reposición</option>
    							</select>
								<label><strong>Estado de solicitud:</strong></label>
    							<input type="text" id="pw" name="pw" required><br>
								<br>
								<label><strong>Vigencia:</strong></label>
								<input type="text" id="pw" name="pw" required><br>
								<br><br>
  								<button type="submit" class="btn btn-outline-success">Guardar</button>
     						</form>
  						</div>
					</div>
      			</div>
    		</div>
  		</div>
	</div>
	</form>

	<!-- Tabla -->
	<div class="container">

    	<div class="container-fluid">
        	<div class="row">
            	<div class="col-xl-12">
				<div class="card spur-card">
        			<div class="card-header texto">
                		<div class="spur-card-title">Listado</div>
            		</div>
            		<div class="card-body">
						<div class="table-responsive">
  	 						<table class="table table-sm table-striped table-hover">
  								<thead>
  									<th class="texto">No.</th>
									<th class="texto">Folio</th>
  									<th class="texto">Fecha</th>
  									<th class="texto">Tipo</th>
									<th class="texto">Estado de solicitud</th>
									<th class="texto">Vence</th>
									<th class="texto">Estado</th>
									<!-- Button trigger modal -->
  									<th><button type="button" class="btn btn-outline-success" title="Nuevo" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button></th>
									<th><elemento class="oculto-impresion"><a href='#.php'><button type='button' class='btn btn-outline-info' title="Cargar"><i class='fa fa-level-up'></i></button></a></elemento></th>
									<th class="texto"><elemento class="oculto-impresion"><button type='button' class='btn btn-outline-danger' title="PDF"><i class='fa fa-file-pdf-o' onclick="imprimir()"></i></button></elemento></th>
  								</thead>
								<!--<tbody>-->
  								<?php
      							include "conexion.php";
      							$sentencia="SELECT prestamoci.idPrestamo, prestamoci.fechaPrestamo, usuarioci.nombreU, usuarioci.priApellido, usuarioci.segApellido, usuarioci.tipoUsuario, usuarioci.carreraUsuario, prestamoci.fechaEntrega, prestamoci.estatusPrestamo FROM `prestamoci`, `usuarioci` WHERE prestamoci.idUsuarioCI=usuarioci.idUsuarioCI ORDER BY prestamoci.fechaPrestamo";
	  							$resultado = mysqli_query(Conectarse(),$sentencia);
								$no=1;
      							while($filas=mysqli_fetch_assoc($resultado))
      							{
									//$no=$no+1;
        							echo "<tr>";
          								echo "<td style='Display:None;'>"; echo $filas['idPrestamo']; echo "</td>";
										echo "<td>"; echo $no; echo "</td>";
										echo "<td>"; echo $filas['fechaPrestamo']; echo "</td>";
          								echo "<td>"; echo $filas['priApellido']; echo " "; echo $filas['segApellido']; echo ", "; echo $filas['nombreU']; echo "</td>";
          								echo "<td>"; echo $filas['tipoUsuario']; echo "</td>";
		  								echo "<td>"; echo $filas['carreraUsuario']; echo "</td>";
										echo "<td>"; echo $filas['fechaEntrega']; echo "</td>";
										echo "<td>"; echo $filas['estatusPrestamo']; echo "</td>";
										//echo "<img src='"; echo $filas['fotoUsuario']; echo "'/>";
										echo "<td></td>";
          								echo "<td><a href='#modif_usu1.php?no=".$filas['idPrestamo']."'> <button type='button' class='btn btn-outline-warning' title='Modificar'><i class='fa fa-pencil-square-o'></i></button></a></td>"; 
										echo "<td><a onclick='return confirmDelete();' href='#eliminar_usu.php?no=".$filas['idPrestamo']."''><button type='button' class='btn btn-outline-danger' title='Eliminar'><i class='fa fa-trash'></i></button></a></td>";
        							echo "</tr>";	
									$no++;
      							}
								?>
								<!--</tbody>-->
  	 						</table>
						</div>
 					</div>
				</div>
 				</div>
			</div>
		</div>
	</div>
	</main>
	  
    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<script type="text/javascript">
	function confirmDelete() {
		var confirmar = confirm("¿Realmente desea eliminar el préstamo? ");
        if (confirmar) {
                return true;
        } else {
                return false;
        }
    }
</script>