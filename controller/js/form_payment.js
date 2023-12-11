const form = document.getElementById('form_pay');
const inputs = document.querySelectorAll('#form_pay input');
const btnLimpiar = document.querySelector('.form_btn[type="reset"]');

const validExpresion = {
    amountPay: /^[+]?\d+(\.\d{1,2})?$/
}

const fields = {
    amountPay: false
}

const validExpresionFields = () => {
    return Object.values(fields).every(field => field === true);
}
const validForm = (e) => {
    
    switch (e.target.name) {
        case "amountPay":
            validField(validExpresion.amountPay, e.target, 'amountPay');
        break;
    }

}

// Funcion Limpiar Formulario
function clearForm() {

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

const validField = (expresion, input, field) => {
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

    var servicePay = $('#servicePay').val();
    var amountPay = $('#amountPay').val();


    if (amountPay === '' || servicePay === null || !validExpresionFields()) {

        Swal.fire({
            title: '¡Error al Llenar el Formulario!',
            text: 'Debes Llenar Correctamente el Formulario',
            icon: 'error', 
            confirmButtonText: 'Entendido'
        });

    } else {

        $.ajax ({

            method: 'POST',
            url: '../../controller/php/formPaymentsUser.php',
            data: {servicePay:servicePay, amountPay:amountPay},
            dataType: 'json',
            success: function (data) {

                if(data.success === true) {
                    
                    console.log('Bien');

                    Swal.fire({
                        title: '¡Exito!',
                        text: data.msg,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1800
                        
                    });

                    clearForm();

                    setTimeout(() => {

                        window.location.href = "../../views/user_logged/payments_acount.php";

                    }, 1900);

                    //! Añadir Boton Confirmar o Hacer otro Pago

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

        });

    }

})

inputs.forEach((input)=>{
    input.addEventListener('keyup', validForm);
    input.addEventListener('blur', validForm);
});

btnLimpiar.addEventListener('click', () => {
    
    clearForm();

});