<?php 

require("../../controller/php/database.php");
require("../../controller/php/check_loggin.php");

$validPayment['success'] = array('success' => false, 'msg' => ''); 

if (isset($_POST['servicePay']) && $_POST['amountPay']) {

    $servicePay = $_POST['servicePay'];
    $amountPay = $_POST['amountPay'];
    $actualTime = date("Y-m-d H:i:s");

    $queryPayment = $conexion->prepare("SELECT * FROM wallet WHERE id_user = $id_session");
    $queryPayment->execute();
    $resultPayment = $queryPayment->fetch();
    $originalBalance = $resultPayment['balance'];

    if($originalBalance >= $amountPay) {

        $newBalance = $originalBalance - $amountPay;
        $queryNewBalance = $conexion->prepare("UPDATE wallet SET balance = $newBalance WHERE id_user = $id_session");
        $queryNewBalance->execute();

        $queryNewMovent = $conexion->prepare("INSERT INTO movimientos (id_user, tipomovimiento, monto, fecha) VALUES ( :id_user, CONCAT('PAGO SERVICIO ', :servicio), :monto, :fecha)");
        $queryNewMovent->bindParam("id_user", $id_session, PDO::PARAM_STR);
        $queryNewMovent->bindParam("servicio", $servicePay, PDO::PARAM_STR);
        $queryNewMovent->bindParam("monto", $amountPay, PDO::PARAM_STR);
        $queryNewMovent->bindParam("fecha", $actualTime, PDO::PARAM_STR);
        $queryNewMovent->execute();

        $validPayment['success'] = true;
        $validPayment['msg'] = 'Pago Realizado Correctamente. Su Nuevo Saldo es: $ '.$newBalance.'.';

    } else {

        $validPayment['success'] = false;
        $validPayment['msg'] = 'No Cuenta Con Los Fondos Suficientes Para Realizar Esta Accion.';

    }

}

echo json_encode($validPayment);

?>