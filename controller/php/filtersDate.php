<?php 

require("../../controller/php/database.php");
require("../../controller/php/check_loggin.php");   

if (isset($_POST['date1']) && isset($_POST['date2'])) {

    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $html = '';

    $queryDate = $conexion->prepare("SELECT * FROM movimientos WHERE id_user = $id_session AND fecha BETWEEN '$date1' AND '$date2'");
    $queryDate->execute();
    $resultDate = $queryDate->fetchAll(PDO::FETCH_ASSOC);
    $rowsDate = $queryDate->rowCount();

    if($rowsDate > 0){
        foreach($resultDate as $date){
            $html .= '<tr>';
                $html .= '<td>'.$date['tipomovimiento'].'</td>';
                $html .= '<td>'.$date['monto'].'</td>';
                $html .= '<td>'.$date['fecha'].'</td>';
            $html .= '</tr>';
        }
    } else {
        $html .= '<tr>';
            $html .= '<td colspan="3">No Hay Registros</td>';
        $html .= '</tr>';
    }

    echo json_encode($html);

} 

?>