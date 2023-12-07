<?php 

//Busqueda Datos Personales del Usuario
$queryData = $conexion->prepare("SELECT * FROM users WHERE id = $id_session");
$queryData->execute();
$resultData = $queryData->fetch();

//Busqueda Datos Bancarios del Usuario
$queryWall = $conexion->prepare("SELECT * FROM wallet WHERE id_user = $id_session");
$queryWall->execute();
$resultWallet = $queryWall->fetch();

//Busqueda Historial Movimientos del Usuario
$queryMovents = $conexion->prepare("SELECT * FROM movimientos WHERE id_user = $id_session");
$queryMovents->execute();
$resultMovents = $queryMovents->fetchAll(PDO::FETCH_ASSOC);
$rowMovent = $queryMovents->rowCount();

?>