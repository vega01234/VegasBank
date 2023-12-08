<?php 

require("database.php");
session_start();

$validResgister['success'] = array('success' => false, 'msg' => '');

if(isset($_POST['name']) && ($_POST['lastname']) && ($_POST['email']) && ($_POST['username']) && ($_POST['password'])){

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Comprobar Si el Usuario Ingresado Tiene una Cuenta
    $queryCheck = $conexion->prepare("SELECT * FROM users WHERE username = :username");
    $queryCheck->bindParam("username", $username, PDO::PARAM_STR);
    $queryCheck->execute();

    $rowsCheck = $queryCheck->rowCount();

    if($rowsCheck > 0) {

        $validResgister['success'] = false;
        $validResgister['msg'] = 'El Usuario Ya Esta Registrado. Deseas Iniciar Sesion?';

    } else {

        // Se Crea un Nuevo Registro
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        
        $queryRegister = $conexion->prepare("INSERT INTO users (name, lastname, email, username, password) VALUES (:name, :lastname, :email, :username, :password)");
        $queryRegister->bindParam("name", $name, PDO::PARAM_STR);
        $queryRegister->bindParam("lastname", $lastname, PDO::PARAM_STR);
        $queryRegister->bindParam("email", $email, PDO::PARAM_STR);
        $queryRegister->bindParam("username", $username, PDO::PARAM_STR);
        $queryRegister->bindParam("password", $passwordHash, PDO::PARAM_STR);
        $resultRegister = $queryRegister->execute();

        // Se Crea un Registro en la Tabla Wallet
        if($resultRegister === true) {

            $id_user = $conexion->lastInsertId();

            $innitialBalance = rand(10000,20000);

            $queryWall = $conexion->prepare("INSERT INTO wallet (id_user, balance) VALUES ($id_user, $innitialBalance)");
            $queryWall->execute();

            $validResgister['success'] = true;
            $validResgister['msg'] = 'Cuenta Creada Exitosamente';

        } else {

            $validResgister['success'] = false;
            $validResgister['msg'] = 'Hubo Un Error Al Crear Tu Cuenta';

        }

    }

}

echo json_encode($validResgister);

?>