/*!
 * Start Bootstrap - Simple Sidebar v6.0.2 (https://startbootstrap.com/template/simple-sidebar)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener('DOMContentLoaded', (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector('#sidebarToggle');
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener('click', (event) => {
      event.preventDefault();
      document.body.classList.toggle('sb-sidenav-toggled');
      localStorage.setItem(
        'sb|sidebar-toggle',
        document.body.classList.contains('sb-sidenav-toggled')
      );
    });
  }
});

startTime();
const date = new Date();
const month = date.toLocaleString('default', {
  month: 'long',
});
document.getElementById('dateYear').innerHTML =
  date.getDay() + ' ' + month + ' ' + date.getFullYear();

function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  var n = today.getFullYear();
  var j = today.getMonth();
  var k = today.getDate();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('datetime').innerHTML = h + ':' + m + ':' + s;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {
    i = '0' + i;
  } // add zero in front of numbers < 10
  return i;
}

$('.FacultyRegistrationButton').click(function () {
  $('.FacultyRegistrationButton').removeClass(
    'bg-light border-primary text-primary'
  );
  $('.StudentRegistrationButton').addClass(
    'bg-light border-primary text-primary'
  );
  $('.FacultyRegistrationForm').show();
  $('.StudentRegistrationForm').hide();
  //   $('.FacultyRegistrationButton').prop('disabled', true);
  //   $('.StudentRegistrationButton').prop('disabled', false);
});

$('.StudentRegistrationButton').click(function () {
  $('.StudentRegistrationForm').show();
  $('.FacultyRegistrationForm').hide();
  $('.FacultyRegistrationButton').addClass(
    'bg-light border-primary text-primary'
  );
  $('.StudentRegistrationButton').removeClass(
    'bg-light border-primary text-primary'
  );
  //   $('.FacultyRegistrationButton').prop('disabled', false);
  //   $('.StudentRegistrationButton').prop('disabled', true);
});
