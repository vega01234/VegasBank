<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
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
    <!-- Formulario Nuevo Usuario -->
    <div class="div_forms" id="div_forms">
        <div class="header_forms">
            <h2 class="subtitle">Crear Cuenta</h2>
            <p>Completa el Formulario Correctamente.</p>
        </div>
        <form action="../../controller/php/formNewUser.php" method="post" class="form_new_user" id="form_new_user">
            <!-- Nombre -->
            <div class="form_group" id="group_name">
                <label for="name" class="form_label">Nombre</label>
                <div class="form_div_input">
                    <input type="text" class="form_input" name="name" id="name">
                    <i class="form_icon fas fa-times-circle"></i>
                </div>
                <p class="msg_input_error">Ingrese un nombre válido de hasta 40 caracteres, utilizando solo letras y espacios.</p>
            </div>
            <!-- Apellidos -->
            <div class="form_group" id="group_lastname">
                <label for="lastname" class="form_label">Apellidos</label>
                <div class="form_div_input">
                    <input type="text" class="form_input" name="lastname" id="lastname">
                    <i class="form_icon fas fa-times-circle"></i>
                </div>
                <p class="msg_input_error">Ingrese una dirección válida, utilizando letras, números y caracteres especiales como coma (,), punto (.) y guion (#).</p>
            </div>
            <!-- Correo Electronico -->
            <div class="form_group" id="group_email">
                <label for="email" class="form_label">Correo Electronico</label>
                <div class="form_div_input">
                    <input type="text" class="form_input" name="email" id="email">
                    <i class="form_icon fas fa-times-circle"></i>
                </div>
                <p class="msg_input_error">Ingrese un nombre de ciudad válido, utilizando letras, números y caracteres especiales como coma (,), punto (.) y guion (#).</p>
            </div>
            <!-- Nombre de Usuario -->
            <div class="form_group" id="group_username">
                <label for="username" class="form_label">Nombre de Usuario</label>
                <div class="form_div_input">
                    <input type="text" class="form_input" name="username" id="username">
                    <i class="form_icon fas fa-times-circle"></i>
                </div>
                <p class="msg_input_error">El Nombre de Usuario debe tener un mínimo de 4 caracteres y un máximo de 16. No puede contener espacios o caracteres especiales.</p>
            </div>
            <!-- Contraseña -->
            <div class="form_group" id="group_password">
                <label for="password" class="form_label">Contraseña</label>
                <div class="form_div_input">
                    <input type="password" class="form_input" name="password" id="password">
                    <i class="form_icon fas fa-times-circle"></i>
                </div>
                <p class="msg_input_error">El Nombre de Usuario debe tener un mínimo de 4 caracteres y un máximo de 16. No puede contener espacios o caracteres especiales.</p>
            </div>
            <!-- Mensaje Error -->
            <div class="form_msg_erorr" id="form_msg_erorr">
                <p><i class="fa-solid fa-circle-exclamation"></i> <b>Error: </b> Por favor rellena correctamente el formulario.</p>
            </div>
            <!-- Boton -->
            <div class="form_btns_send">
                <button type="submit" class="form_btn" name="newUser">Registrarse</button>
                <button type="reset" class="form_btn">Limpiar</button>
                <p class="form_msg_succes" id="form_msg_succes">El usuario se registro exitosamente.</p>
            </div>
        </form>
    </div>
    <!-- Pie de Pagina -->
    <footer>
        <p>&copy; 2023 Vega's Bank - Todos los derechos reservados</p>
    </footer>
    <script src="../../controller/js/form_new_user.js"></script>
    <script src="https://kit.fontawesome.com/e9597f5981.js" crossorigin="anonymous"></script>
</body>
</html>