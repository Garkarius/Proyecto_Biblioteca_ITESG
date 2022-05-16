<?php
require('config.php');
$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {
        $datos = explode(";", $linea);
        $id = !empty($datos[0])  ? ($datos[0]) : '';
		$folio = !empty($datos[1])  ? ($datos[1]) : '';
        $fecha = !empty($datos[2])  ? ($datos[2]) : '';
        $tipo = !empty($datos[3])  ? ($datos[3]) : '';
        $estatus = !empty($datos[4])  ? ($datos[4]) : '';
        $vigencia = !empty($datos[5])  ? ($datos[5]) : '';
       
if( !empty($id) ){
    $checkemail_duplicidad = ("SELECT idSolicitud FROM solicitudes WHERE idSolicitud='".($id)."' ");
            $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }   

//No existe Registros Duplicados
if ( $cant_duplicidad == 0 ) { 
$insertarData = "INSERT INTO solicitudes( 
    idSolicitud,
    folioSolicitud,
    fechaSolicitud,
    tipoSolicitud,
    estatusSolicitud,
    vigenciaSolicitud,
) VALUES(
    '$id',
    '$folio',
    '$fecha',
    '$tipo',
    '$estatus',
    '$vigencia'
)";
mysqli_query($con, $insertarData);  
} 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE usuarios SET 
        idSolicitud='" .$id. "',
		folioSolicitud='" .$folio. "',
        fechaSolicitud='" .$fecha. "',
        tipoSolicitud='" .$tipo. "',
		estatusSolicitud='" .$estatus. "',
        vigenciaSolicitud='" .$vigencia. "'
        WHERE idUsuario='".$id."'
    ");
    $result_update = mysqli_query($con, $updateData);
    } 
  }
 $i++;
}
?>

<!-- <a href="Usuarios.php">Atras</a> -->
<script type="text/javascript">
	alert("Solicitudes cargadas exitosamente");
	window.location.href='Solicitudes.php';
</script>