<?php 

require("../../controller/php/database.php");

if (isset($_POST['date_search'])) {


    echo 'Hola Mundo';
    $date1 = date("Y-m-d", strtotime($_POST['date1']));
    $date2 = date("Y-m-d", strtotime($_POST['date2']));
    $queryDate = $conexion->prepare("SELECT * FROM movimientos WHERE id_user = $id_session  AND fecha BETWEEN '$date1' AND '$date2'");
    $queryDate->execute();
    $resultDate = $queryDate->fetchAll(PDO::FETCH_ASSOC);
    $rowsDate = $queryDate->rowCount();

    if ($rowsDate > 0) {

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