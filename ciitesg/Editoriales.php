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
    <title>Editoriales</title>
	<link rel="icon" href="images/Escudo-ITESG.png" />
</head>
<body>
	
<main class="dash-content">
	<!-- Menú -->
	<?php include("includes/menu.php"); ?><br>
	
	<h1 align="center" class="texto">Editoriales del Centro de Información</h1><br>	

	<form action="nuevaEditorial.php" method="post" enctype="multipart/form-data" style="border-collapse: separate; border-spacing: 10px 5px;">
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
  							<span> <h4 class="texto">Ingreso de nueva editorial</h4> </span><br>
							<form action="nuevaEditorial.php" method="post" enctype="multipart/form-data">
  								<label><strong>Nombre: </strong></label>
  								<input type="text" id="nombre" name="nombre" required><br>
								<label><strong>País: </strong></label>
  								<input type="text" id="pais" name="pais" required><br>
								<label><strong>Descripción: </strong></label>
  								<input type="text" id="desc" name="desc" required><br>
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
  									<th class="texto">Nombre</th>
  									<th class="texto">País</th>
									<th class="texto">Descripción</th>
									<!-- Button trigger modal -->
  									<th><button type="button" class="btn btn-outline-success" title="Nuevo" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button></th>
									<th class="texto"></th>
  								</thead>
								<!--<tbody>-->
  								<?php
      							include "conexion.php";
      							$sentencia="SELECT idEditorial, nomEditorial, paisEditorial, descEditorial FROM `editoriales`";
	  							$resultado = mysqli_query(Conectarse(),$sentencia);
								$no=1;
      							while($filas=mysqli_fetch_assoc($resultado))
      							{
									//$no=$no+1;
        							echo "<tr>";
          								echo "<td style='Display:None;'>"; echo $filas['idEditorial']; echo "</td>";
										echo "<td>"; echo $no; echo "</td>";
          								echo "<td>"; echo $filas['nomEditorial']; echo "</td>";
          								echo "<td>"; echo $filas['paisEditorial']; echo "</td>";
		  								echo "<td>"; echo $filas['descEditorial']; echo "</td>";
          								echo "<td><a href='modif_editorial1.php?no=".$filas['idEditorial']."'> <button type='button' class='btn btn-outline-warning' title='Modificar'><i class='fa fa-pencil-square-o'></i></button></a></td>"; 
										echo "<td><a onclick='return confirmDelete();' href='eliminar_editorial.php?no=".$filas['idEditorial']."''><button type='button' class='btn btn-outline-danger' title='Eliminar'><i class='fa fa-trash'></i></button></a></td>";
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
		var confirmar = confirm("¿Realmente desea eliminar la editorial? ");
        if (confirmar) {
                return true;
        } else {
                return false;
        }
    }
</script>