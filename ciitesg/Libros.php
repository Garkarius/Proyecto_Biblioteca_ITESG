<?php
//Inicia sesión
session_start();
$usuario = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header('location: Login.php');
}

include("conexion.php");

//Selecciona fecha de ingreso del libro
$fcha = date("Y-m-d");
// Año actual con 4 dígitos
$year=date("Y");

//***********************************************************************************************
//Muestra número consecutivo correspondiente
$sentencia2="SELECT MAX(idLibro) AS id FROM libros";
$query= mysqli_query(Conectarse(), $sentencia2);
 if ($row = mysqli_fetch_row($query)) 
 {
   $noLibro = trim($row[0])+1;
   //echo $noConsecutivo;
 }
//***********************************************************************************************
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
    <title>Libros del CI</title>
	<link rel="icon" href="images/Escudo-ITESG.png" />
</head>
<body>
	
<main class="dash-content">
	<!-- Menú -->
	<?php include("includes/menu.php"); ?><br>

	<h1 align="center" class="texto">Libros del Centro de Información</h1><br>	

	<form action="nuevoLibro.php" method="post" enctype="multipart/form-data" style="border-collapse: separate; border-spacing: 10px 5px;">
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-lg">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title texto" id="exampleModalLabel">Ingreso uno por uno</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     	 		</div>
      			<div class="modal-body" align="center">
					<div class="todo">
  						<div id="contenido">  							
  							<span><h4 class="texto">Libro nuevo</h4></span><br>
							<form action="nuevoLibro.php" method="post" enctype="multipart/form-data">
							  <div class="form-group row" align="right">
								<input type="text" class="form-control" id="id" name="id" value="<?php echo $noLibro ?>" style="Display:None;" readonly>
								<input id="status" name="status" type="text" class="col-1 form-control" value="Recepción" style="Display:None;" readonly>
								<input id="disponible" name="disponible" type="text" class="col-1 form-control" value="No" style="Display:None;" readonly>
								<input id="numEjemplar" name="numEjemplar" type="text" class="col-1 form-control" value="1" style="Display:None;" readonly>
								<label class="col-sm-2 col-form-label"><strong>Fecha: </strong></label>
  								<input type="date" id="fecha" name="fecha" class="col-sm-3 form-control" value="<?php echo $fcha;?>" required><br>
								<label class="col-sm-2 col-form-label"><strong>Tipo:</strong></label>
								<input type="radio" name="tipo" id="tipo1" value="Adquirido" class="col-sm-1" onChange="Adquirido();" checked> Adquirido<br>
								<input type="radio" name="tipo" id="tipo2" value="Donado" class="col-sm-1" onChange="Donado();"> Donado<br>
								<!--style="Display:None;"-->
								<div><input id="tAdqui" name="tAdqui" type="text" value="Adquirido" class="col-sm-2 form-control" readonly></div>
							  </div>
							  <div class="form-group row" align="right">								
  								<label class="col-sm-2 col-form-label"><strong>Adquisición: </strong></label>
  								<input type="text" id="adqui" name="adqui" class="form-control col-3" value="BITSG<?php echo $year; ?>" readonly><br>
								<label class="col-sm-2 col-form-label"><strong>Clasificación: </strong></label>
								<select id="clasific" name="clasific" class="col-4 form-control" onchange="clasificacion(this)" required>
									<option>Seleccione...</option>
									<option>A: Obras generales</option>
									<option>B: Filosofía, sicología, religión</option>
									<option>C: Ciencias auxiliares de la historia</option>
									<option>D: Historia general</option>
									<option>E: Historia de américa</option>
									<option>F: Historia de américa</option>
									<option>G: Geografía, antropología y recereación</option>
									<option>H: Ciencias sociales</option>
									<option>J: Ciencias políticas</option>
									<option>K: Derecho</option>
									<option>L: Educación</option>
									<option>M: Música</option>
									<option>N: Bellas artes</option>
									<option>P: Lengua y literatura</option>
									<option>Q: Ciencia</option>
									<option>R: Medicina</option>
									<option>S: Agricultura</option>
									<option>T: Tecnología</option>
									<option>U: Ciencia Militar</option>
									<option>V: Ciencia naval</option>
									<option>Z: Bibliotecología, bibliografía</option>
								</select>
								  <!--style="Display:None;"-->
								<input id="Nclasific" name="Nclasific" type="text" class="col-1 form-control" style="Display:None;" readonly><br>
							  </div>		
							  <div class="form-group row" align="right">									
								<label class="col-sm-2 col-form-label"><strong>Título: </strong></label>
								<select id="titulo" name="titulo" onchange="titul(this)" class="col-9 form-control" required>
									<option value="0">Seleccione...</option>
									<?php
									$sentencia1="SELECT idTitulo, nomTitulo, existenciaT, consecutivoT FROM titulos";
									$resultado1 = mysqli_query(Conectarse(), $sentencia1);	  
									while ($filas1=mysqli_fetch_row($resultado1)) { ?>
									<option value="<?php echo $filas1[0];?>"><?php echo $filas1[1]; echo $existencia = $filas1[2]; echo $consecutiv = $filas1[3];?></option>";
									<?php } ?>
								</select>
								<!--style="Display:None;"-->
								<input id="idTitulo" name="idTitulo" type="number" class="col-1 form-control" style="Display:None;" readonly><br>
							  </div>								  
							  <div class="form-group row" align="right">																	
								<label class="col-sm-2 col-form-label"><strong>Autor1: </strong></label>
  								<select id="autor1" name="autor1" onchange="autor1(this)" class="col-9 form-control" required>
									<option value="0">Seleccione...</option>
									<?php
									$sentencia2="SELECT idAutor, primerApellidoA, segundoApellidoA, nomAutor FROM autores";
									$resultado2 = mysqli_query(Conectarse(), $sentencia2);	  
									while ($filas2=mysqli_fetch_row($resultado2)) { ?>
									<option value="<?php echo $filas2[0];?>"><?php echo $filas2[1]; echo " "; echo $filas2[2]; echo ", "; echo $filas2[3];?></option>";
									<?php } ?>
								</select>
								<!--style="Display:None;"-->
								<input id="idAutor1" name="idAutor1" type="number" class="col-1 form-control" style="Display:None;" readonly>
							  </div>	
							  <div class="form-group row" align="right">																	
								<label class="col-sm-2 col-form-label"><strong>Autor2: </strong></label>
  								<select id="autor2" name="autor2" onchange="autor2(this)" class="col-9 form-control">
									<option value="0">Seleccione...</option>
									<?php
									$sentencia1="SELECT idAutor, primerApellidoA, segundoApellidoA, nomAutor FROM autores";
									$resultado1 = mysqli_query(Conectarse(), $sentencia1);	  
									while ($filas1=mysqli_fetch_row($resultado1)) { ?>
									<option value="<?php echo $filas1[0];?>"><?php echo $filas1[1]; echo " "; echo $filas1[2]; echo ", "; echo $filas1[3];?></option>";
									<?php } ?>
								</select>
								<!--style="Display:None;"-->
								<input id="idAutor2" name="idAutor2" type="number" class="col-1 form-control" style="Display:None;" readonly>
							  </div>
							  <div class="form-group row" align="right">																	
								<label class="col-sm-2 col-form-label"><strong>Autor3: </strong></label>
  								<select id="autor3" name="autor3" onchange="autor3(this)" class="col-9 form-control">
									<option value="0">Seleccione...</option>
									<?php
									$sentencia1="SELECT idAutor, primerApellidoA, segundoApellidoA, nomAutor FROM autores";
									$resultado1 = mysqli_query(Conectarse(), $sentencia1);	  
									while ($filas1=mysqli_fetch_row($resultado1)) { ?>
									<option value="<?php echo $filas1[0];?>"><?php echo $filas1[1]; echo " "; echo $filas1[2]; echo ", "; echo $filas1[3];?></option>";
									<?php } ?>
								</select>
								<!--style="Display:None;"-->
								<input id="idAutor3" name="idAutor3" type="number" class="col-1 form-control" style="Display:None;" readonly>
							  </div>
							  <div class="form-group row" align="right">	
								<!--style="Display:None;"-->
								<label class="col-sm-2 col-form-label"><strong>Editorial: </strong></label>
								<select id="editorial" name="editorial" onchange="edit(this)" class="col-6 col-sm-6 col-md-3 col-lg-3 form-control" required>
									<option value="0">Seleccione...</option>
									<?php
									$sentencia2="SELECT idEditorial, nomEditorial FROM editoriales";
									$resultado2 = mysqli_query(Conectarse(), $sentencia2);	  
									while ($filas2=mysqli_fetch_row($resultado2)) { ?>
									<option value="<?php echo $filas2[0];?>"><?php echo $filas2[1];?></option>";
									<?php } ?>
								</select>
								<!--style="Display:None;"-->
								<input id="idEdit" name="idEdit" type="number" class="col-1 form-control" style="Display:None;" readonly>
								<label class="col-sm-2 col-form-label"><strong>Edición: </strong></label>
								<select id="edicion" name="edicion" class="col-1 form-control" required>
									<option>1ra.</option>
									<option>2da.</option>
									<option>3ra.</option>
									<option>4ta.</option>
									<option>5ta.</option>
									<option>6ta.</option>
									<option>7ma.</option>
									<option>8va.</option>
									<option>9na.</option>
									<option>10ma.</option>
									<option>11va.</option>
									<option>12va.</option>
									<option>13va.</option>
									<option>14va.</option>
									<option>15va.</option>
								</select>
								<label class="col-sm-2 col-form-label"><strong>Existencia: </strong></label>
  								<input type="number" id="stock" name="stock" class="col-sm-1 form-control" value="0" readonly>
							  </div>								  								  	  			  
							  <div class="form-group row" align="right">									  
								<label class="col-sm-2 col-form-label"><strong>Descripción: </strong></label>
								<textarea class="form-control col-4" id="desc" name="desc" rows="3"></textarea>
								<!--style="Display:None;"-->
								<label class="col-sm-2 col-form-label"><strong>Carrera: </strong></label>
								<select id="editorial" name="editorial" onchange="carr(this)" class="col-3 col-sm-3 col-md-3 col-lg-3 form-control" required>
									<option value="0">Seleccione...</option>
									<?php
									$sentencia2="SELECT idCarrera, nomCarrera FROM carreras";
									$resultado2 = mysqli_query(Conectarse(), $sentencia2);	  
									while ($filas2=mysqli_fetch_row($resultado2)) { ?>
									<option value="<?php echo $filas2[0];?>"><?php echo $filas2[1];?></option>";
									<?php } ?>
								</select>
								<!--style="Display:None;"-->
								<input id="idCarrera" name="idCarrera" type="number" class="col-1 form-control" style="Display:None;" readonly>
							  </div>
								<br>
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
	<div class="container-fluid">

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
  									<th class="texto">Adquisición</th>
  									<th class="texto">Clasificación</th>
									<th class="texto">Título</th>
									<th class="texto">Autor</th>
									<th class="texto">Editorial</th>
									<th class="texto">Edición</th>
									<th class="texto">Ejemplar</th>
									<th class="texto">Disponibilidad</th>
									<!-- Button trigger modal -->
  									<th><elemento class="oculto-impresion"><button type="button" class="btn btn-outline-success" title="Agregar" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button></elemento></th>
									<th><elemento class="oculto-impresion"><a href='#.php'><button type='button' class='btn btn-outline-info' title="Cargar"><i class='fa fa-level-up'></i></button></a></elemento></th>
									<th class="texto"><elemento class="oculto-impresion"><button type='button' class='btn btn-outline-danger' title="PDF"><i class='fa fa-file-pdf-o' onclick="imprimir()"></i></button></elemento></th>
									<th><elemento class="oculto-impresion"><a href='#.php'><button type='button' class='btn btn-outline-dark' title="Código de barras"><i class='fa fa-barcode'></i></button></a></elemento></th>
  								</thead>
								<!--<tbody>-->
  								<?php				
								$sentencia="SELECT libros.idLibro, libros.noAdquiLibro, libros.noClasificLibro, titulos.nomTitulo, autores.nomAutor, autores.primerApellidoA, autores.segundoApellidoA, editoriales.nomEditorial, libros.edicionLibro, libros.noEjemplarL, libros.disponibleLibro FROM `libros`, `titulos`, `editoriales`, `libro_autor`, `autores` WHERE libros.idTitulo=titulos.idTitulo and libros.idEditorial=editoriales.idEditorial and libros.idLibro=libro_autor.idLibro and libro_autor.idAutor=autores.idAutor ORDER BY libros.idLibro";
	  							$resultado = mysqli_query(Conectarse(),$sentencia);
								$no=1;
      							while($filas=mysqli_fetch_assoc($resultado))
      							{
									//$no=$no+1;
        							echo "<tr>";
          								echo "<td style='Display:None;'>"; echo $filas['idLibro']; echo "</td>";
										echo "<td>"; echo $no; echo "</td>";
										echo "<td>"; echo $filas['noAdquiLibro']; echo "</td>";
          								echo "<td>"; echo $filas['noClasificLibro']; echo "</td>";
          								echo "<td>"; echo $filas['nomTitulo']; echo "</td>";
		  								echo "<td>"; echo $filas['primerApellidoA']; echo " "; echo $filas['segundoApellidoA']; echo ", "; echo $filas['nomAutor']; echo "</td>";
										echo "<td>"; echo $filas['nomEditorial']; echo "</td>";
										echo "<td>"; echo $filas['edicionLibro']; echo "</td>";
										echo "<td>"; echo $filas['noEjemplarL']; echo "</td>";
										echo "<td>"; echo $filas['disponibleLibro']; echo "</td>";
										echo "<td></td>";
										//echo "<img src='"; echo $filas['fotoUsuario']; echo "'/>";
          								echo "<td><elemento class='oculto-impresion'><a href='#modif_usu1.php?no=".$filas['idLibro']."'> <button type='button' class='btn btn-outline-warning' title='Modificar'><i class='fa fa-pencil-square-o'></i></button></a></elemento></td>"; 
										echo "<td><elemento class='oculto-impresion'><a href='#modif_usu1.php?no=".$filas['idLibro']."'> <button type='button' class='btn btn-outline-dark' title='Código de barras'><i class='fa fa-barcode'></i></button></a></elemento></td>"; 
										echo "<td><elemento class='oculto-impresion'><a onclick='return confirmDelete();' href='#eliminar_usu.php?no=".$filas['idLibro']."''><button type='button' class='btn btn-outline-danger' title='Eliminar'><i class='fa fa-trash'></i></button></a></elemento></td>";
										echo "<td></td>";
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
	  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery.js"></script>	
  </body>
</html>

<script>
	function imprimir() {
  		window.print();
	}	
</script>

<script type="text/javascript">
	function confirmDelete() {
    	var confirmar = confirm("¿Realmente desea eliminar el usuario? ");
        if (confirmar) {
        	return true;
        } else {
            return false;
        }
    }
</script>

<script>
function Adquirido() {
  document.getElementById("tAdqui").value = document.getElementById("tipo1").value;
  //var tselec = document.getElementById("tAdqui").value;
  var yea = document.getElementById("fecha").value;
  //ad = tselec.substr(0,1);
  year= yea.substr(0,4);
  document.getElementById("adqui").value = "BITSG" + year
}
</script>

<script>
function Donado() {
  document.getElementById("tAdqui").value = document.getElementById("tipo2").value;
  var tselec = document.getElementById("tAdqui").value;
  var y = document.getElementById("fecha").value;
  //ad = tselec.substr(0,1);
  year= y.substr(0,4);
  document.getElementById("adqui").value =  "DBITSG" + year
}
</script>

<script>
//Muestra la letra de la clasificación
function clasificacion (select) {
  var cadena= document.getElementById("clasific").value;
  var fstChar = cadena.charAt(0);
  document.getElementById("Nclasific").value =  fstChar;
 }
</script>

<script>
function titul (select) {
	//Muestra id del título
    var selectedOption = select.options[select.selectedIndex];			
	document.getElementById("idTitulo").value = selectedOption.value;
	//muestra la existencia del título seleccionado
	var stoc = <?php echo $existencia; ?>; 
	document.getElementById("stock").value = stoc;
	//Incrementa +1 la existencia y asigna número de ejemplar
	var nconsecutivo= document.getElementById("adqui").value;
	document.getElementById("adqui").value = nconsecutivo+"0000"+1;
        }
</script>

<script>
//Muestra id del autor1
function autor1 (select) {
    var selectedOption = select.options[select.selectedIndex];			
	document.getElementById("idAutor1").value = selectedOption.value;
        }
</script>

<script>
//Muestra id del autor2
function autor2 (select) {
    var selectedOption = select.options[select.selectedIndex];			
	document.getElementById("idAutor2").value = selectedOption.value;
        }
</script>

<script>
//Muestra id del autor3
function autor3 (select) {
    var selectedOption = select.options[select.selectedIndex];			
	document.getElementById("idAutor3").value = selectedOption.value;
        }
</script>

<script>
//Muestra id de la editorial
function edit (select) {
    var selectedOption = select.options[select.selectedIndex];			
	document.getElementById("idEdit").value = selectedOption.value;
        }
</script>

<script>
//Muestra id de la carrera
function carr (select) {
    var selectedOption = select.options[select.selectedIndex];			
	document.getElementById("idCarrera").value = selectedOption.value;
        }
</script>