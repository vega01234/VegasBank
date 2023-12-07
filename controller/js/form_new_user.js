const form = document.getElementById('form_new_user');
const inputs = document.querySelectorAll('#form_new_user input');

const validExpresion = {
    name: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    lastname: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, 
    email: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
    username: /^[a-zA-Z0-9\_\-]{4,16}$/, 
    password: /^.{4,12}$/
}

const fields = {
    name: false,
    lastname:false,
    email: false,
    username: false,
    password: false
}

// Alertas Personalizadas

const validForm = (e) => {
    switch(e.target.name){
        case "name":
            validField(validExpresion.name, e.target, 'name');
        break;
        case "lastname":
            validField(validExpresion.lastname, e.target, 'lastname');
        break;
        case "email":
            validField(validExpresion.email, e.target, 'email');
        break;
        case "username":
            validField(validExpresion.username, e.target, 'username');
        break;
        case "password":
            validField(validExpresion.password, e.target, 'password');
        break;
    }
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

form.addEventListener('submit', function (e){

    if (!fields.name || !fields.lastname || !fields.email || !fields.username || !fields.password || validForm == True) {
        
        e.preventDefault();
        document.getElementById('form_msg_erorr').classList.add('form_msg_erorr-active');
        setTimeout(() => {
        document.getElementById('form_msg_erorr').classList.remove('form_msg_erorr-active');
        }, 2000);

    }

    return True;

});

inputs.forEach((input)=>{
    input.addEventListener('keyup', validForm);
    input.addEventListener('blur', validForm);
});

const btnLimpiar = document.querySelector('.form_btn[type="reset"]');
btnLimpiar.addEventListener('click', () => {
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