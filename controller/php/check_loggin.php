<?php 

require("database.php");
session_start();

//Se Verifica el Inicio de Sesión
$id_session = $_SESSION['user_id'];
if (!isset($id_session)) {

    header("Refresh:0;url= ../../views/general/login.php");
    echo '<script language="javascript">alert("Debes Iniciar Sesión.");</script>';

}

?>