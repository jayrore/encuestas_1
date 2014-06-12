<?php
include('conexion.php');    
if($_GET['tabla']=1){
$mysql= new MySQL;
$consulta ='select * from paquetes';
$resultado = $mysql->MyConsulta($consulta);
$mysql->MyResultado($resultado);
}
if($_GET['tabla']=2){
$mysql= new MySQL;
$consulta ='select * from usuario';
$resultado = $mysql->MyConsulta($consulta);
$mysql->MyResultado($resultado);
}

?>
