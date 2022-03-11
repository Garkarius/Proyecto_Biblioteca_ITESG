<?php
//Inicia sesión
session_start();
$usuario = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header('location: Login.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="htmlcss bootstrap, multi level menu, submenu, treeview nav menu examples" />
	<meta name="description" content="Bootstrap 5 navbar multilevel treeview examples for any type of project, Bootstrap 5" />  

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
	  
	<!-- Link para iconos -->
	<link rel="stylesheet" href="css/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Estilos en CSS -->
	<?php include("includes/estilos.php"); ?>
	  
    <!-- Pestaña -->
	<title>Inicio CI_ITESG</title>
	<link rel="icon" href="images/Escudo-ITESG.png" />
  </head>
	
  <body>
	  <main class="dash-content">
	  <!-- Menú -->
	  <?php include("includes/menu.php"); ?><br>
	  
	  <!-- Logo ITESG -->
	  <div class="logo">
		<div class="row">
			<div class="col-2 col-sm-2 col-md-3 col-lg-4 col-xl-4" align="center"></div>
		  	<div class="col-8 col-sm-8 col-md-6 col-lg-4 col-xl-4" align="center"><img class="img-fluid" src="images/logoITESG.png" style="width: 80%; margin-top: 30px;"/></div>
		  	<div class="col-2 col-sm-2 col-md-3 col-lg-4 col-xl-4" align="center"></div>
		</div>
	  </div>
	  <br><br>
	  
	  <!-- Botones de Módulos -->
	  <div class="container">
		  <div class="col-sm-2" style="Display:None;"><input type="text" class="form-control" id="idUser" name="idUser" value="<?php echo $usuario ?>" readonly></div>
		  <div class="row">
			<div class="col-3"></div>
		  	<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" align="center"><a href="Libros.php" class="btn btn-outline-primary" style="width: 100%;" role="button"><i class="fa fa-book fa-5x"></i><br><br>Libros</a></div>
		  	<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" align="center"><a href="#.php" class="btn btn-outline-secondary" style="width: 100%;" role="button"><i class="fa fa-address-book-o fa-5x"></i><br><br>Tesis</a></div>
			<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" align="center"><a href="#.php" class="btn btn-outline-success" style="width: 100%;" role="button"><i class="fa fa-leanpub fa-5x"></i><br><br>Revistas</a></div>
		  </div>
		  <br>
		  <div class="row">
			<div class="col-3"></div>
			<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" align="center"><a href="#.php" class="btn btn-outline-danger" style="width: 100%;" role="button"><i class="fa fa-bullseye fa-5x"></i><br><br>CD´S</a></div>
			<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" align="center"><a href="#.php" class="btn btn-outline-warning" style="width: 100%;" role="button"><i class="fa fa-gamepad fa-5x"></i><br><br>Juegos</a></div>
			<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" align="center"><a href="UsuariosCI.php" class="btn btn-outline-info" style="width: 100%;" role="button"><i class="fa fa-users fa-5x"></i><br><br>Usuarios</a></div>
		  </div>
		  <br>
		  <div class="row">
			<div class="col-3"></div>
			<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" align="center"><a href="Solicitudes.php" class="btn btn-outline-success" style="width: 100%;" role="button"><i class="fa fa-sign-in fa-5x"></i><br><br>Solicitudes</a></div>
			<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" align="center"><a href="#Prestamos.php" class="btn btn-outline-primary" style="width: 100%;" role="button"><i class="fa fa-handshake-o fa-5x"></i><br><br>Préstamos</a></div>
			<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" align="center"><a href="#.php" class="btn btn-outline-dark" style="width: 100%;" role="button"><i class="fa fa-chain-broken fa-5x"></i><br><br>Adeudos</a></div>
		  </div>
	  </div>
	  </main>
	  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<script>
$(function() {
  // ------------------------------------------------------- //
  // Multi Level dropdowns
  // ------------------------------------------------------ //
  $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
    event.preventDefault();
    event.stopPropagation();
    $(this).siblings().toggleClass("show");
    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-submenu .show').removeClass("show");
    });
  });
});
</script>