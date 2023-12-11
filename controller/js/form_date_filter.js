const form = document.getElementById('form_search');
const inputDate1 = document.getElementById('date1');
const inputDate2 = document.getElementById('date2');

const validDate = '';

// Alerta Personalizada 
const { value: date } = await Swal.fire({
    title: "select departure date",
    input: "date",
    didOpen: () => {
      const today = (new Date()).toISOString();
      Swal.getInput().min = today.split("T")[0];
    }
  });
  if (date) {
    Swal.fire("Departure date", date);
  }
  