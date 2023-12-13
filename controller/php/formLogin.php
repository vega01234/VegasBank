<?php 

require('database.php');
session_start();

$validLogin['success'] = array('success' => false, 'msg' => '');

if(isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $queryLogin = $conexion->prepare("SELECT * FROM users WHERE username = :username");
    $queryLogin->bindParam("username", $username, PDO::PARAM_STR);
    $queryLogin->execute();

    $resultLogin = $queryLogin->fetch(PDO::FETCH_ASSOC);
    $rowsLogin = $queryLogin->rowCount();

    if ($rowsLogin == 0) {
        
        $validLogin['success'] = false;
        $validLogin['msg'] = 'El Usuario No Existe.';

    } else {

        if(password_verify($password, $resultLogin['password'])) {
        
            $nameLogin = $resultLogin['name'];
            $_SESSION['user_id'] = $resultLogin['id'];
            $validLogin['success'] = true;
            $validLogin['msg'] = 'Iniciando Sesion Como: '.$nameLogin.'.';
        
        } else {
        
        $validLogin['success'] = false;
        $validLogin['msg'] = 'Contraseña Invalida.';
        
        }
    }
}

echo json_encode($validLogin);

?>