<?php 

require("../../controller/php/database.php");
session_start();

if (isset($_POST['newUser'])) {

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $queryCheck = $conexion->prepare("SELECT * FROM users WHERE username = :username");
    $queryCheck->bindParam(":username", $username, PDO::PARAM_STR);
    $queryCheck->execute();

    if ($queryCheck->rowCount() > 0) {
        header("Refresh:0;url= /../clienteServidorPHP/views/general/login.php");
        echo '<script language="javascript">alert("El Usuario Ya Esta Registrado.");</script>';
    } else {

        // Metodo Hash Para Encriptar la Contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //Insertan los Datos Ingresados en la Tabla Users
        $queryUsers = $conexion->prepare("INSERT INTO users (name, lastname, email, username, password) VALUES (:name, :lastname, :email, :username, :password)");
        $queryUsers->bindParam(":name", $name, PDO::PARAM_STR);
        $queryUsers->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $queryUsers->bindParam(":email", $email, PDO::PARAM_STR);
        $queryUsers->bindParam(":username", $username, PDO::PARAM_STR);
        $queryUsers->bindParam(":password", $hashedPassword, PDO::PARAM_STR);

        $resultUsers = $queryUsers->execute();
       

        //Insertar un Valor en Balance para el Correcto Funcionamiento de la Página
        if ($resultUsers == True) {

            $id_user = $conexion->lastInsertId();

            $innitialBalance = rand(10000,20000);

            $queryWall = $conexion->prepare("INSERT INTO wallet (id_user, balance) VALUES ($id_user, $innitialBalance)");
            $queryWall->execute();

        }

        //Mensaje Estatus Registro Usuario
        if ($resultUsers) {
            header("Refresh:0;url= /../clienteServidorPHP/views/general/login.php");
			echo '<script language="javascript">alert("Cuenta Creada Exitosamente");</script>';
        } else {
			echo '<script language="javascript">alert("Hubo Un Error al Crear la Cuenta. Intenta Más Tarde.");</script>';
        }
    }
}

?>