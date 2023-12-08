<?php 

require("../../controller/php/database.php");
require("../../controller/php/check_loggin.php");
require("../../controller/php/querys.php");



// require("../../controller/php/database.php");
// require("../../controller/php/check_loggin.php");




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo de Cuenta</title>
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
    <!-- Parte General -->
    <!-- Buscador por Fechas -->
    <div class="div_forms" id="div_forms">
        <div class="header_forms">
            <h2 class="subtitle">Buscador por Fechas</h2>
            <p>Selecciona dos Fechas para Realizar la Busqueda.</p>
        </div>
        <form method="post">
            <!-- Primer Fecha -->
            <div class="form_group" id="group_date1">
                <label for="date1" class="form_label">Ingresa la Primer Fecha</label>
                <div class="form_div_input">
                    <input type="date" class="form_input" name="date1" id="date1" required>
                    <i class="form_icon fas fa-times-circle"></i>
                </div>
                <p class="msg_input_error">Ingresa una Fecha Valida.</p>
            </div>
            <!-- Segunda Fecha -->
            <div class="form_group" id="group_date2">
                <label for="date2" class="form_label">Ingresa la Segunda Fecha</label>
                <div class="form_div_input">
                    <input type="date" class="form_input" name="date2" id="date2" required>
                    <i class="form_icon fas fa-times-circle"></i>
                </div>
                <p class="msg_input_error">Ingresa una Fecha Valida.</p>
            </div>
            <!-- Mensaje Error -->
            <div class="form_msg_erorr" id="form_msg_erorr">
                <p><i class="fa-solid fa-circle-exclamation"></i> <b>Error: </b> Por favor rellena correctamente el formulario.</p>
            </div>
            <!-- Boton -->
            <div class="form_btns_send">
                <button type="submit" class="form_btn" name="date_search">Buscar Registros</button>
                <button type="reset" class="form_btn">Limpiar</button>
                <p class="form_msg_succes" id="form_msg_succes">El usuario se registro exitosamente.</p>
            </div>
        </form>
    </div>
    <!-- Tabla Resultados -->
    <br>
    <h2 class="subtitle center">Tabla de Movimientos</h2>
    <br>
    <div class="container_table">
        <table class="his_mov">
            <tr>
                <th class="head_celd">Tipo de Movimiento</th>
                <th class="head_celd">Monto (MXN)</th>
                <th class="head_celd">Fecha</th>
            </tr>
            <?php include("../../controller/php/filtersDate.php"); ?>
        </table>
    </div>
    <!-- Pie de Pagina -->
    <footer>
        <p>&copy; 2023 Vega's Bank - Todos los derechos reservados</p>
    </footer>
</body>
</html>