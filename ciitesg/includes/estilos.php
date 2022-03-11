	  <style>
		  .encabezado{background: #797978;}
		  .color{color: #E5E7E9;}
		  .borde{border: 1px #000 solid;}
		  .texto{color: #B08146;}
		  .card-body{
		 	background-color: #fff;		 
    	 	padding-top: 0px;
   			padding-bottom: 2px;
   		 	padding-right: 10px;
   		 	padding-left: 10px;			 
		  }
		  
		  #container {
  			width: 80px;
  			height: 80px;
		  }
		  
		  img {
  			width: 100%;
  			height: 100%;
  			object-fit: contain;
		  }		  
		  
		  body{
			background:#E5E7E9;
			/* Ubicación de la imagen */
			background-image: url("images/FondoLibros.jpg");
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
		  
		  .btn-outline-secondary{box-shadow:0 1px 2px 2px rgba(0,0,0,0.12);}
		  .btn-outline-dark{box-shadow:0 1px 2px 2px rgba(0,0,0,0.12);}
		  
		 /*Color de encabezado de tabla*/
		 .table-striped>thead>tr>th {     
			 background-color: #fff;
      		}
		 
		 /*Color de fila de tabla*/
		 .table-striped tbody tr:nth-of-type(odd) {
 			 background-color:  rgba(245, 196, 147, 0.20);
			}	
		  
			/* ==========================================
			* CUSTOM UTIL CLASSES
			* ==========================================*/
			.dropdown-submenu {
			  position: relative;
			}

			.dropdown-submenu>a:after {
			  content: "\f0da";
			  float: right;
			  border: none;
			  font-family: 'FontAwesome';
			}

			.dropdown-submenu>.dropdown-menu {
			  top: 0;
			  left: 100%;
			  margin-top: 0px;
			  margin-left: 0px;
			}

			/* ==========================================
			* FOR DEMO PURPOSES
			* ========================================== */
			code {
			  color: #B06AB3;
			  background: #fff;
			  padding: 0.1rem 0.2rem;
			  border-radius: 0.2rem;
			}

			@media (min-width: 991px) {
			  .dropdown-menu {
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			  }
			}
		  
			/*Estilos para Tab*/
			@media print {
				.oculto-impresion,
				.oculto-impresion * {
					display: none !important;
				}
			}				  
</style>