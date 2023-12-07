<?php 

require('database.php');

if(isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['logged'] = false;

    $queryLogin = $conexion->prepare("SELECT * FROM users WHERE username = :username");
    $queryLogin->bindParam("username", $username, PDO::PARAM_STR);
    $queryLogin->execute();

    $resultLogin = $queryLogin->fetch(PDO::FETCH_ASSOC);
    $nameAlert = $resultLogin['name'];

    if(password_verify($password, $resultLogin['password']) || !$resultLogin) {
        echo 'Sesion Iniciada';
        echo $nameAlert;
        header("Refresh: 0 ; url= ../../views/user_logged/start_page.php");

    } else {
        echo 'Hubo Un Problema al Iniciar Sesion';
    }

    // if (!$resultLogin) {
        
    //     header("Refresh: 0 ; url= ../../views/general/login.php");
    //     echo '<script language="javascript">alert("Nombre de Usuario o Contraseña Incorrectas.");</script>';

    // } 
    // else {

    //     if (password_verify($password, $resultLogin['password'])) {

    //         $_SESSION['user_id'] = $resultLogin['id'];
    //         header("Refresh: 0 ; url= ../../views/user_logged/start_page.php");
    //         echo '<script language="javascript">alert("Sesion Iniciada Correctamente.");</script>';

    //     } else {

    //         header("Refresh: 0 ; url= ../../views/general/login.php");
	// 		echo '<script language="javascript">alert("Ocurrio un Error al Iniciar Sesion. Intenta Más Tarde."x);</script>';

    //     }

    // }
}

?>