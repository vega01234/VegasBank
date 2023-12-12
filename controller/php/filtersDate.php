<?php 

require("../../controller/php/database.php");

// $searchDates['success'] = array('success' => false, 'msg' => '');

// if(isset($_POST['date1']) && ($_POST['date2'])) {

//     echo $GLOBALS;

//     // $date1 = date("Y-m-d", strtotime($_POST['date1']));
//     // $date2 = date("Y-m-d", strtotime($_POST['date2']));

//     // $queryDate = $conexion->prepare("SELECT * FROM movimientos WHERE id_user = $id_session  AND fecha BETWEEN '$date1' AND '$date2'");
//     // $queryDate->execute();
//     // $resultDate = $queryDate->fetchAll(PDO::FETCH_ASSOC);
//     // $rowsDate = $queryDate->rowCount();

//     // echo $rowsDate;

//     // if ($rowsDate > 0) {
    
//     //     $searchDates['success'] = true;
//     //     $searchDates['msg'] = 'Hay Registros';

//     // } else {

//     //     $searchDates['success'] = false;
//     //     $searchDates['msg'] = 'No Hay Registros';

//     // }

//     // echo json_encode($searchDates);

// }


if (isset($_POST['date_search'])) {

    $date1 = date("Y-m-d", strtotime($_POST['date1']));
    $date2 = date("Y-m-d", strtotime($_POST['date2']));
    $queryDate = $conexion->prepare("SELECT * FROM movimientos WHERE id_user = $id_session  AND fecha BETWEEN '$date1' AND '$date2'");
    $queryDate->execute();
    $resultDate = $queryDate->fetchAll(PDO::FETCH_ASSOC);
    $rowsDate = $queryDate->rowCount();

    if ($rowsDate > 0) {

        echo $id_session;

        foreach ($resultDate as $tableDate) {

            echo '<tr>';
                echo '<td>'.$tableDate['tipomovimiento'].'</td>';
                echo '<td>'.$tableDate['monto'].'</td>';
                echo '<td>'.$tableDate['fecha'].'</td>';
            echo '</tr>';

        }

    } else {

        echo '<tr>';
            echo '<td colspan="3">No Hay Ningun Registro</td>';
        echo '</tr>';

    }
} else {

    echo '<tr>';
        echo '<td colspan="3">No Has Seleccionado Una Fecha</td>';
    echo '</tr>';

}

?>