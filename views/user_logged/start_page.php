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
    <title>Página de Inicio</title>
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
    <h1 class="title center">Bienvenido a Vega's Bank</h1>
    <br>
    <p class="text center">Has Iniciado Sesion Como, <b><?php echo $resultData['name']?>.</b> No eres tu? Da click <a href="../../controller/php/logout.php" class="link_ref"><b>aqui</b>.</a></p>
    <section>
        <article class="article_general">
            <p class="text">En Vega's Bank, nos enorgullece ofrecerte una experiencia financiera segura y conveniente. Desde la gestión de tu saldo hasta realizar pagos y ver tu historial de movimientos, te proporcionamos las herramientas necesarias para controlar tu dinero de manera efectiva.</p>
        </article>
        <article class="article_general">
            <h2 class="subtitle">Características Principales</h2>
            <ul class="list_general">
                <li class="text"><b>Ver Saldos: </b>Consulta fácilmente los saldos de tus cuentas en un solo vistazo.</li>
                <li class="text"><b>Historial de Movimientos: </b>Revisa tus transacciones pasadas para un mejor seguimiento de tus gastos e ingresos.</li>
                <li class="text"><b>Realizar Pagos: </b>Realiza pagos de manera rápida y segura desde la comodidad de tu hogar.</li>
            </ul>
        </article>
        <article class="article_general">
            <h2 class="subtitle">Nuestro Compromiso</h2>
            <p class="text">En Vega's Bank, trabajamos continuamente para mejorar nuestros servicios y brindarte la mejor experiencia bancaria posible. ¡Explora todas las funciones y descubre cómo podemos ayudarte a alcanzar tus metas financieras!</p>
        </article>
    </section>
    <!-- Pie de Pagina -->
    <footer>
        <p>&copy; 2023 Vega's Bank - Todos los derechos reservados</p>
    </footer>
</body>
</html>