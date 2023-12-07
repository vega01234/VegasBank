<?php 

require("../../controller/php/database.php");

$queryAjax = $conexion->prepare("SELECT * FROM users");
$queryAjax->execute();
$resultsAjax = $queryAjax->fetchAll(PDO::FETCH_ASSOC);

echo '<table>';

    foreach($resultsAjax as $ajax){
        echo '<tr>';
            echo '<th>'.$ajax['id'].'</th>';
            echo '<th>'.$ajax['name'].'</th>';
            echo '<th>'.$ajax['lastname'].'</th>';
            echo '<th>'.$ajax['email'].'</th>';
            echo '<th>'.$ajax['username'].'</th>';
        echo '</tr>';
        }

echo '</table>';

?>