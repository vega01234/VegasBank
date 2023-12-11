const form = document.getElementById('form_login');
const inputs = document.querySelectorAll('#form_login input');
const btnClear = document.querySelector('#btn_clear');

const validExpresion = {
    username: /^[a-zA-Z0-9\_\-]{4,16}$/, 
    password: /^.{4,12}$/
}

const fields = {
    username: false,
    password: false
}

//Limpiar Campos y Estilos Formulario
function clearForm () {

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
    
}

const validExpresionFields = () => {
    return Object.values(fields).every(field => field === true);
}

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

// Envio de Datos por Ajax al Controlador
form.addEventListener('submit', function (e) {
    
    e.preventDefault();

    var username = $('#username').val();
    var password = $('#password').val();

    if(username === '' || password === '' || !validExpresionFields()){

        Swal.fire({
            title: '¡Error al Llenar el Formulario!',
            text: 'Debes Llenar Correctamente el Formulario',
            icon: 'error', 
            confirmButtonText: 'Entendido'
        });

    } else {

        $.ajax({

            method: 'POST',
            url: '../../controller/php/formLogin.php',
            data: {username: username, password: password},
            dataType: "json",
            success: function(data) {

                if (data.success == true) {
                    
                    Swal.fire({
                        title: '¡Exito!',
                        text: data.msg,
                        icon: 'success',
                        showConfirmButton: false, 
                        timer: 1800
                    });

                    clearForm();
                    
                    setTimeout(() => {

                        window.location.href = "../../views/user_logged/start_page.php";

                    }, 1900);

                } else {

                    Swal.fire({
                        title: '¡Error!',
                        text: 'Error: ' + data.msg,
                        icon: 'error',
                        showConfirmButton: false, 
                        timer: 1800  
                    });

                }
            }
        }) 
    }    
})

//Detectar Cambios Formulario
inputs.forEach((input) => {
    input.addEventListener('keyup', validFormLogin);
    input.addEventListener('blur', validFormLogin);
});

// Boton Limpiar Campos
btnClear.addEventListener('click', () => {
    
    clearForm();

});