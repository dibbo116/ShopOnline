/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
var xhr = false;
if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

// Function to handle the customer registration process
function registerCustomer() {
    var firstName = document.getElementById('first_name').value;
    var surname = document.getElementById('surname').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var retypePassword = document.getElementById('retype_password').value;
    var phone = document.getElementById('phone').value;

    // Check if all inputs are filled
    if (!firstName || !surname || !email || !password || !retypePassword || !phone) {
        alert("All fields are required. Please fill in all fields.");
        return;
    }

    // Check if passwords match
    if (password !== retypePassword) {
        alert("Passwords do not match!");
        return;
    }

    // Check phone number format ((0X)dddddddd or 0X dddddddd where X is a digit)
    var phonePattern = /^\(0\d\)\d{8}$|^0\d \d{8}$/;
    if (!phonePattern.test(phone)) {
        alert("Phone number format is invalid. It should be either (0X)dddddddd or 0X dddddddd, where X is a digit.");
        return;
    }

    // Send AJAX request to register.php with validated data
    xhr.open("GET", "register.php?first_name=" + encodeURIComponent(firstName) +
        "&surname=" + encodeURIComponent(surname) +
        "&email=" + encodeURIComponent(email) +
        "&password=" + encodeURIComponent(password) +
        "&phone=" + encodeURIComponent(phone), true);

    xhr.onreadystatechange = processRegistration;
    xhr.send(null);
}

// Function to process the server response for registration
function processRegistration() {
    if ((xhr.readyState == 4) && (xhr.status == 200)) {
        document.getElementById('msg').innerHTML = xhr.responseText;
    }
}

// Function to clear the registration form
function clearRegistrationForm() {
    document.getElementById('first_name').value = "";
    document.getElementById('surname').value = "";
    document.getElementById('email').value = "";
    document.getElementById('password').value = "";
    document.getElementById('retype_password').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('msg').innerHTML = "";
}
