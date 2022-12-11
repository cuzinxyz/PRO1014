const date = document.getElementById("date");

// get current date
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '/' + mm + '/' + dd + ' 09:00';
// end get current date

date.flatpickr({
  enableTime: true,
  dateFormat: "Y-m-d H:i",
  time_24hr: true,
  inline: true,
  defaultDate: today,
  minDate: "today",
  minTime: "09:00",
  maxTime: "18:20",
})