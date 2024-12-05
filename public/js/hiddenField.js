$(document).ready(function () {
  // Automatically hide the message box after 5 seconds
  setTimeout(function () {
    $('#messageBox').fadeOut();
  }, 5000);

  // Toggle Password visibility
  $('#togglePassword').on('click', function () {
    var passwordField = $('#password');
    if (passwordField.length) { // Check if the field exists
      var passwordFieldType = passwordField.attr('type');
      if (passwordFieldType === 'password') {
        passwordField.attr('type', 'text');
        $(this).removeClass('fa-eye-slash').addClass('fa-eye');
      } else {
        passwordField.attr('type', 'password');
        $(this).removeClass('fa-eye').addClass('fa-eye-slash');
      }
    }
  });
});