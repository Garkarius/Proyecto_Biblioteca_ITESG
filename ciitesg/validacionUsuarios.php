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
		$nombre = !empty($datos[1])  ? ($datos[1]) : '';
        $paterno = !empty($datos[2])  ? ($datos[2]) : '';
        $materno = !empty($datos[3])  ? ($datos[3]) : '';
        $control = !empty($datos[4])  ? ($datos[4]) : '';
        $tipo = !empty($datos[5])  ? ($datos[5]) : '';
        $carrera = !empty($datos[6])  ? ($datos[6]) : '';
        $mail = !empty($datos[7])  ? ($datos[7]) : '';
        $curp = !empty($datos[8])  ? ($datos[8]) : '';
        $tel = !empty($datos[9])  ? ($datos[9]) : '';
        $edo = !empty($datos[10])  ? ($datos[10]) : '';
        $dir = !empty($datos[11])  ? ($datos[11]) : '';
        $ci = !empty($datos[12])  ? ($datos[12]) : '';
       
if( !empty($id) ){
    $checkemail_duplicidad = ("SELECT idUsuario FROM usuarios WHERE idUsuario='".($id)."' ");
            $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }   

//No existe Registros Duplicados
if ( $cant_duplicidad == 0 ) { 
$insertarData = "INSERT INTO usuarios( 
    idUsuario,
    nomUsuario,
    paternoUsuario,
    maternoUsuario,
    noControl,
    tipoUsuario,
    idCarrera,
    mailUsuario,
    curpUsuario,
    telUsuario,
    estatusUsuario,
    dirUsuario,
    idCentroi
) VALUES(
    '$id',
    '$nombre',
    '$paterno',
    '$materno',
    '$control',
    '$tipo',
    '$carrera',
    '$mail',
    '$curp',
    '$tel',
    '$edo',
    '$dir',
    '$ci'
)";
mysqli_query($con, $insertarData);  
} 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE usuarios SET 
        idUsuario='" .$id. "',
		nomUsuario='" .$nombre. "',
        paternoUsuario='" .$paterno. "',
        maternoUsuario='" .$materno. "',
		noControl='" .$control. "',
        tipoUsuario='" .$tipo. "'
        idCarrera='" .$carrera. "',
		mailUsuario='" .$mail. "',
        curpUsuario='" .$curp. "'
        telUsuario='" .$tel. "',
		estatusUsuario='" .$edo. "',
        dirUsuario='" .$dir. "',
        idCentroi='" .$ci. "'
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
	alert("Usuarios cargados exitosamente");
	window.location.href='Usuarios.php';
</script>