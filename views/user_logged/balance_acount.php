<?php 

require("../../controller/php/database.php");
require("../../controller/php/check_loggin.php");
require("../../controller/php/querys.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo de Cuenta</title>
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <link rel="stylesheet" href="../../resources/css/style.css">
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
    <h1 class="title center">Datos Bancarios</h1>
    <section>
        <article class="article_general">
            <p class="text">¡Bienvenido de regreso, <b><?php echo $resultData['name'] ?></b>!</p>
            <br>
            <p class="text">Aquí encontrarás un resumen detallado de tus finanzas. Consulta los saldos de tus cuentas, revisa los movimientos más recientes y toma el control total de tu dinero.</p>
        </article>
        <article class="article_general">
            <h2 class="subtitle">Saldos de Tus Cuentas</h2>
            <p class="text">Tu saldo actual es de $ <?php echo $resultWallet['balance'] ?> MXN.</p>
        </article>
        <article class="article_general">
            <h2 class="subtitle">Historial de Movimientos</h2>
            <p class="text">A continuacion, encontraras un filtro para realizar la busqueda de los registros por fechas.</p>
        </article>
    </section>
    <!-- Buscador por Fechas -->
    <div class="div_search" id="div_search">
        <div class="header_forms">
            <h2 class="subtitle">Tabla de Movimientos</h2>
        </div>
        <!-- Seleccionar Fecha o Ingresar Datos -->
        <form class="search_group" id="form_search">
            <div class="inputs_dates">
                <label for="date1" class="src_label">Fecha Inicial</label>
                <div class="form_div_input">
                    <input type="date" class="search" name="date1" id="date1">
                </div>
            </div>
            <div class="inputs_dates">
                <label for="date2" class="src_label">Fecha Final</label>
                <div class="form_div_input">
                    <input type="date" class="search" name="date2" id="date2">
                </div>
            </div>
            <!-- <div class="div_src">
                <label for="search" class="src_label">Buscador por Servicios</label>
                <div class="form_div_input">
                    <input type="text" class="search" name="search" id="search" placeholder="Buscar...">
                </div>
            </div> -->
        </form>
        <br>
        <!-- Tabla Dinamica -->
        <div class="container_table" id="container_table">
            <table class="his_mov">
                <tr>
                    <th class="head_celd">Tipo de Movimiento</th>
                    <th class="head_celd">Monto (MXN)</th>
                    <th class="head_celd">Fecha</th>
                </tr>
                <tbody id="results_search"></tbody>
            </table>
        </div>
    </div>
    <footer>
        <p>&copy; 2023 Vega's Bank - Todos los derechos reservados</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/e9597f5981.js" crossorigin="anonymous"></script>
    <script src="../../controller/js/controllerDateHistorial.js"></script>
</body>
</html>