<?php 

require("../../controller/php/database.php");
require("../../controller/php/check_loggin.php");

$validPayment['success'] = array('success' => false, 'msg' => ''); 

if(isset($_POST['monto'])) {

    $amountPay = $_POST['monto'];
    $actualTime = date("Y-m-d H:i:s");

    $queryPayment = $conexion->prepare("SELECT * FROM wallet WHERE id_user = $id_session");
    $queryPayment->execute();
    $resultPayment = $queryPayment->fetch();
    $originalBalance = $resultPayment['balance'];

    if($originalBalance >= $amountPay) {

        $newBalance = $originalBalance - $amountPay;
        $queryNewBalance = $conexion->prepare("UPDATE wallet WHERE id_user = ");

    }
}

// if (isset($_POST['payment'])) {

//     $amountPay = $_POST['monto'];
//     $servicePay = $_POST['servicio'];
//     $actualTime = date("Y-m-d H:i:s");

//     try {

//         $queryPayment = $conexion->prepare("SELECT * FROM wallet WHERE id_user = $id_session");
//         $queryPayment->execute();
//         $resultsPayment = $queryPayment->fetch();
//         $originalBalance = $resultsPayment['balance'];

//         if ($originalBalance >= $amountPay) {

//             $newBalance = $originalBalance - $amountPay;
//             $queryNewBalance = $conexion->prepare("UPDATE wallet SET balance = $newBalance WHERE id_user = $id_session");
//             $queryNewBalance->execute();
    
//             $queryNewMovent = $conexion->prepare("INSERT INTO movimientos (id_user, tipomovimiento, monto, fecha) VALUES ( :id_user, CONCAT('PAGO SERVICIO ', :servicio), :monto, :fecha)");
//             $queryNewMovent->bindParam("id_user", $id_session, PDO::PARAM_STR);
//             $queryNewMovent->bindParam("servicio", $servicePay, PDO::PARAM_STR);
//             $queryNewMovent->bindParam("monto", $amountPay, PDO::PARAM_STR);
//             $queryNewMovent->bindParam("fecha", $actualTime, PDO::PARAM_STR);
//             $queryNewMovent->execute();

//             header("Refresh:0;url= /../clienteServidorPHP/views/user_logged/payments_acount.php");
//             echo '<script language="javascript">alert("Pago Realizado Correctamente.");</script>';
    
//         } else {
//             echo '<script language="javascript">alert("No Cuentas con el Dinero Suficiente para Hacer esta Operacion.");</script>';
//             header("Refresh:0;url= /../clienteServidorPHP/views/user_logged/balance_acount.php");
//         }

//     } catch (PDOException $e) {
//         echo "Error: ".$e->getMessage();
//     }
// }

?>