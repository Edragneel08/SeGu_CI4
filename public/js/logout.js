
function confirmLogout(event) {
  event.preventDefault(); // Prevent immediate navigation

  let confirmation = confirm("Are you sure you want to log out?");
  if (confirmation) {
    // If confirmed, proceed to the logout URL
    window.location.href = event.target.href;
  }
}
