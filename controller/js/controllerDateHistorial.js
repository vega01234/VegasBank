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

})

// form.addEventListener('submit', function (e) {

  // e.preventDefault();

  // var date1 = $('#date1').val();
  // var date2 = $('#date2').val();

  // if(date1 === '' || date2 === '') {

    // Swal.fire({
    //   title: '¡Error al Llenar el Formulario!',
    //   text: 'Debes Llenar Correctamente el Formulario',
    //   icon: 'error', 
    //   confirmButtonText: 'Entendido'
    // });

  // } else {

  //   $.ajax ({

  //     method: 'POST',
  //     url: '../../controller/php/filtersDate.php',
  //     data: {date1:date1, date2:date2},
  //     dataType: "json",
  //     success: function (data) {

  //       console.log('Empieza');
  //       Swal.fire({
  //         title: '¡Exito!',
  //         text: data.msg,
  //         icon: 'success',
  //         showConfirmButton: false, 
  //         timer: 1800
  //       });

  //       clearForm();
        
  //       setTimeout(() => {

  //           window.location.href = "../../views/user_logged/start_page.php";

  //       }, 1900);

  //     }

  //   });

  // }

// });

// Detercar Cambior en el Formulario
// inputs.forEach((input) => {
//   input.addEventListener('keyup');
//   input.addEventListener('blur');
// });

// Limpiar Inputs del Formulario 
btnClear.addEventListener('click', () => {
  clearForm();
})