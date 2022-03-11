<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="css/css/font-awesome.min.css">
	  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Pestaña -->
    <title>Ingreso CI_ITESG</title>
	<link rel="icon" href="images/Escudo-ITESG.png" />
	  
	 <!-- Estilos en CSS -->
	 <style>
		@import url('https://fonts.googleapis.com/css?family=Numans');

		body{
			background:#E5E7E9;
			background-size: cover;
			margin: 0;
			padding: 0;
			height: 100vh;
			/* Ubicación de la imagen */
			background-image: url("images/FondoCentroI.jpg");
			/* Para dejar la imagen de fondo centrada, vertical y horizontalmente */
			background-position: center center;
			/* Para que la imagen de fondo no se repita */
			background-repeat: no-repeat;
			/* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */
			background-attachment: fixed;
			/* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */
			background-size: cover;
			/* Se muestra un color de fondo mientras se está cargando la imagen de fondo o si hay problemas para cargarla */
			background-color: #66999;
		}

		.texto{color: #FFFFFF;}

		.container{
			height: 100%;
			align-content: center;
		}

		.card{
			height: 320px;
			margin-top: auto;
			margin-bottom: auto;
			width: 400px;
			background-color: rgba(0,0,0,0.25) !important;
		}

		.input-group-prepend span{
			width: 50px;
			background-color: #FFFFFF;
			color: black;
			border:0 !important;
		}

		input:focus{
			outline: 0 0 0 0  !important;
			box-shadow: 0 0 0 0 !important;
		}

		.login_btn{
			color: black;
			background-color: #F5B041;
			width: 100px;
		}

		.login_btn:hover{
			color: black;
			background-color: white;
		}
	 </style>
	  
  </head>
<body>
	<br>
	<!-- Logo ITESG -->
	<div class="logo">
		<div class="row">
			<div class="col-2 col-sm-2 col-md-3 col-lg-4 col-xl-4" align="center"></div>
		  	<div class="col-8 col-sm-8 col-md-6 col-lg-4 col-xl-4" align="center"><img class="img-fluid" src="images/logoITESG_top.png" style="width: 60%; margin-top: 50px;"/></div>
		  	<div class="col-2 col-sm-2 col-md-3 col-lg-4 col-xl-4" align="center"></div>
		</div>
	</div>
	<br><br>
	  
	<!-- Formulario de ingreso -->
	<div class="container">
		<div class="d-flex justify-content-center">
			<div class="card">
				<div class="card-header">
					<h3 class="texto">Ingresar</h3>
				</div>
				<div class="card-body">
				<br>
				<form action="loguear.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend"><span class="input-group-text iconos"><i class="fa fa-user"></i></span></div>
						<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-key"></i></span></div>
						<input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña">
						<div class="input-group-append">
            			<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
          				</div>
					</div>
					<br>
					<div class="form-group">
						<input type="submit" value="Entrar" class="btn float-right login_btn">
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	function mostrarPassword(){
		var cambio = document.getElementById("clave");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
	});
</script>