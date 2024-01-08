// Declaracion de Variables
const form = document.getElementById('form_search');
const inputs = document.querySelectorAll('#form_search input');
const btnClear = document.querySelector('#btn_clear');

const fields = {
  date1: false,
  date2 : false
}

const validExpresionFields = () => {
  return Object.values(fields).every(field => field === true);
}

// Declaracion de Funciones
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

// Enviar Datos por Ajax al Controlador
form.addEventListener('change', function (e) {

  e.preventDefault();

  var date1 = $('#date1').val();
  var date2 = $('#date2').val();

  $.ajax ({

    method: 'POST',
    url: '../../controller/php/filtersDate.php',
    data: {date1:date1, date2:date2},
    dataType: "json",
    success: function (data) {

      $("#results_search").empty().append(data);

    }

  });

});

// Limpiar Inputs del Formulario 
btnClear.addEventListener('click', () => {
  clearForm();
})