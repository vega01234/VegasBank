<?php 


$host = 'localhost';
$username = 'root';
$password = '';
$database = 'vegasbank';

try {

    $conexion = new PDO("mysql:host=$host; dbname=$database", $username, $password);
echo 'Bien';
} catch (PDOException $e) {
    echo 'Error: '.$e->getMessage();
}

$queryAjax = $conexion->prepare("SELECT * FROM users");
$queryAjax->execute();
$resultsAjax = $queryAjax->fetchAll(PDO::FETCH_ASSOC);

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