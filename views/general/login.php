<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="../../resources/css/style.css">
</head>
<body>
    <!-- Barra de Navegación -->
    <header class="navbar">
        <a href="index.php"><img class="logo" src="../../resources/img/Logo.png" alt="Logo"></a>
        <nav>
            <ul class="nav_list">
                <li><a class="link_ref" href="about_us.php">Sobre Nosotros</a></li>
                <li><a class="link_ref" href="contact.php">Contacto</a></li>
            </ul>
        </nav>
        <div>
            <a class="link_login" href="login.php"><button>Iniciar Sesion</button></a>
            <a class="link_newuser" href="newUser.php"><button>Registrarse</button></a>
        </div>
    </header>
    <!-- Formulario de Inicio de Sesion -->
    <div class="div_forms" id="div_forms">
        <div class="header_forms">
            <h2 class="subtitle">Iniciar Sesion</h2>
            <p>Ingresa tus Claves de Acceso</p>
        </div>
        <form  class="form_login" id="form_login">
            <!-- Nombre de Usuario -->
            <div class="form_group" id="group_username">
                <label for="username" class="form_label">Nombre de Usuario</label>
                <div class="form_div_input">
                    <input type="text" class="form_input" name="username" id="username" >
                    <i class="form_icon fas fa-times-circle"></i>
                </div>
                <p class="msg_input_error">El nombre de usuario debe contener entre 4 y 16 caracteres alfanuméricos, así como guiones bajos (_) y guiones (-).</p>
            </div>
            <!-- Contraseña -->
            <div class="form_group" id="group_password">
                <label for="password" class="form_label">Contraseña</label>
                <div class="form_div_input">
                    <input type="password" class="form_input" name="password" id="password" >
                    <i class="form_icon fas fa-times-circle"></i>
                </div>
                <p class="msg_input_error">La contraseña debe tener entre 4 y 12 caracteres.</p>
            </div>
            <!-- Boton -->
            <div class="form_btns_send">
                <button type="submit" class="form_btn" name="login" id="login">Iniciar Sesion</button>
                <button type="reset" class="form_btn" id="btn_clear">Limpiar</button>
            </div>
            <div id="salida"></div>
        </form>
    </div>
    <!-- Pie de Pagina -->
    <footer>
        <p>&copy; 2023 Vega's Bank - Todos los derechos reservados</p>
    </footer>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/e9597f5981.js" crossorigin="anonymous"></script>
    <script src="../../controller/js/form_login.js"></script>
</body>
</html>