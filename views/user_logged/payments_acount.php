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
    <title>Pagos Cuenta</title>
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
    <div class="div_forms" id="div_forms">
        <div class="header_forms">
            <h2 class="subtitle">Realizar Pagos</h2>
            <p>Completa el Formulario Correctamente</p>
        </div>
        <form action="../../controller/php/formPaymentsUser.php" method="post" id="form_pay" class="form_pay">
            <!-- Servicio Seleccionado -->
            <div class="form_group" id="group_select">
                <label for="servicio" class="form_label">Seleccionar el Servicio a Pagar</label>
                <div class="form_div_input">
                    <select name="servicio" id="servicio" class="form_input">
                        <option disabled>SELECCIONA UNA OPCION</option>
                        <option value="INTERNET">Internet</option>
                        <option value="ELECTRICIDAD">Electricidad</option>
                        <option value="AGUA">Agua</option>
                    </select>
                </div>
            </div>
            <!-- Monto a Pagar -->
            <div class="form_group" id="group_monto">
                <label for="monto" class="form_label">Monto a Pagar</label>
                <div class="form_div_input">
                    <input type="text" class="form_input" name="monto" id="monto" required>
                    <i class="form_icon fas fa-times-circle"></i>
                </div>
                <p class="msg_input_error">Por favor, ingrese un monto válido (números positivos con hasta dos decimales).</p>
            </div>
            <!-- Boton -->
            <div class="form_btns_send">
                <button type="submit" class="form_btn" name="payment" id="payment">Realizar Pago</button>
                <button type="reset" class="form_btn">Limpiar</button>
            </div>
        </form>
    </div>
    <!-- Pie de Pagina -->
    <footer>
        <p>&copy; 2023 Vega's Bank - Todos los derechos reservados</p>
    </footer>
    <script src="../../js/form_payment.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/e9597f5981.js" crossorigin="anonymous"></script>
</body>
</html>