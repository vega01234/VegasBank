<?php 

require("database.php");
session_start();

if (isset($_SESSION['user_id'])) {

    session_destroy();
    header("Refresh:0;url= ../../views/general/login.php");
    echo '<script language="javascript">alert("Sesion Finalizada.")</script>';

} else {

    header("Refresh:0;url= ../../views/general/login.php");
    echo '<script language="javascript">alert("No Has Iniciado Sesion")</script>';

}

?>