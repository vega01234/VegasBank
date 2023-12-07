const form = document.getElementById('form_login');
const inputs = document.querySelectorAll('#form_login input');

const validExpresion = {
    username: /^[a-zA-Z0-9\_\-]{4,16}$/, 
    password: /^.{4,12}$/
}

const fields = {
    username: false,
    password: false
}

const validExpresionFields = () => {
    return Object.values(fields).every(field => field === true);
}

//Switch para Cambiar Diseño Correcto/Error
const validFormLogin = (e) => {
    switch (e.target.name) {
        case "username":
            validFieldLogin(validExpresion.username, e.target, 'username');
        break;
        case "password":
            validFieldLogin(validExpresion.password, e.target, 'password');
        break;
    }
}

const validFieldLogin = (expresion, input, field) => {
    if (expresion.test(input.value)) {
        document.getElementById(`group_${field}`).classList.remove('form_group_false');
        document.getElementById(`group_${field}`).classList.add('form_group_true');
        document.querySelector(`#group_${field} i`).classList.add('fa-check-circle');
        document.querySelector(`#group_${field} i`).classList.remove('fa-times-circle');
        document.querySelector(`#group_${field} .msg_input_error`).classList.remove('msg_input_error-active');
        fields[field] = true;
    } else {
        document.getElementById(`group_${field}`).classList.add('form_group_false');
        document.getElementById(`group_${field}`).classList.remove('true');
        document.querySelector(`#group_${field} i`).classList.add('fa-times-circle');
        document.querySelector(`#group_${field} i`).classList.remove('fa-check-circle');
        document.querySelector(`#group_${field} .msg_input_error`).classList.add('msg_input_error-active');
        fields[field] = false;
    }
}

form.addEventListener('submit', function (e) {
    
    e.preventDefault();

    var username = $('#username').val();
    var password = $('#password').val();

    if(username === '' || password === '' || !validExpresionFields()){

        e.preventDefault();

        Swal.fire({
            title: '¡Error al Llenar el Formulario!',
            text: 'Debes Llenar Correctamente el Formulario',
            icon: 'error', 
            confirmButtonText: 'Entendido'
        });

    } else {

        // $.ajax({

        //     type: 'post',
        //     url: '../../controller/php/formLogin.php',
        //     dataType: 'json',
        //     contentType: 'application/json',
        //     async: true,
        //     data: {username:username, password:password},
        //     success: function(data) {

        //         console.log(data);

        //         Swal.fire({
        //             title: '¡Exito!',
        //             text: 'Inciando Sesion. Espera un Momento.' + data,
        //             icon: 'success',
        //             showConfirmButton: false, 
        //             timer: 1500
        //         });

        //     }
        // });

        $.post('../../controller/php/formLogin.php', {
            username: username,
            password: password
        }, function () {

            Swal.fire({
                title: '¡Exito!',
                text: 'Datos Enviados', //! LEER ARCHIVO JSON
                icon: 'success',
                showConfirmButton: false, 
                timer: 1500
        });

        })

    }    
})

//Detectar Cambios Formulario
inputs.forEach((input) => {
    input.addEventListener('keyup', validFormLogin);
    // input.addEventListener('input', validFormLogin);
    input.addEventListener('blur', validFormLogin);
});

//Limpiar Campos y Estilos Formulario
const btnClear = document.querySelector('#btn_clear');
btnClear.addEventListener('click', () => {
    form.reset();

    // Eliminar clases y estilos adicionales
    document.querySelectorAll('.form_group').forEach(group => {
        group.classList.remove('form_group_true', 'form_group_false');
    });

    document.querySelectorAll('.form_icon').forEach(icon => {
        icon.classList.remove('fa-check-circle', 'fa-times-circle');
    });

    document.querySelectorAll('.msg_input_error').forEach(msg => {
        msg.classList.remove('msg_input_error-active');
    });
});