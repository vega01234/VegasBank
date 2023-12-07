<?php 

require("../../controller/php/database.php");
require("../../controller/php/check_loggin.php");

//Busqueda de los Datos Personales
$queryInfo = $conexion->prepare("SELECT * FROM users WHERE id = $id_session");
$queryInfo->execute();
$userInfo = $queryInfo->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion de la Cuenta</title>
    <link rel="stylesheet" href="../../resources/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <!-- Barra de Navegación -->
    <header class="navbar">
        <a href="start_page.php"><img class="logo" src="../../resources/img/Logo.png" alt="Logo"></a>
        <nav>
            <ul class="nav_list">
                <li><a class="link_ref" href="balance_acount.php">Datos Bancarios</a></li>
                <li><a class="link_ref" href="payments_acount.php">Realizar Pagos</a></li>
            </ul>
        </nav>
        <div>
            <a class="link_login" href="acount_info.php"><button>Cuenta</button></a>
            <a class="link_logout" href="../../controller/php/logout.php"><button>Cerrar Sesion</button></a>
        </div>
    </header>
    <!-- Parte Principal -->
    <h1 class="title center">Informacion de la Cuenta</h1>
    <br>
    <div class="container_table">
        <table class="his_mov">
            <tr>
                <th class="head_celd">Nombre</th>
                <th class="head_celd">Apellidos</th>
                <th class="head_celd">Correo Electronico</th>
            </tr>
            <?php 
            
            foreach ($userInfo as $tableInfo) {
                echo '<tr>';
                    echo '<td>'.$tableInfo['name'].'</td>';
                    echo '<td>'.$tableInfo['lastname'].'</td>';
                    echo '<td>'.$tableInfo['email'].'</td>';
                echo '</tr>';
            }

            ?>
        </table>
    </div>
    <!-- Pie de Pagina -->
    <footer>
        <p>&copy; 2023 Vega's Bank - Todos los derechos reservados</p>
    </footer>
</body>
</html>