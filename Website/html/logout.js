// logout.js

function logout() {
    // Simulate clearing user token from session storage
    sessionStorage.removeItem('userToken');

    // Redirect the user to the login page
    window.location.href = "../login.html";
}
