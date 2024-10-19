/*
    Name : Dibbo Barua Chamak
    Student ID : 105299366
*/
// Variable to hold XMLHttpRequest object
var xhr;

// Check browser support for XMLHttpRequest
if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

function checkLogin() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "redirect.php", true);
    xhr.onload = function() {
        if (xhr.status === 403) {
            // If unauthorized, redirect to login page
            window.location.href = "mlogin.htm";
        }
    };
    xhr.send();
}

window.onload = function() {
    checkLogin();
};

// Function to add item to the catalog
function addItem() {
    var itemName = document.getElementById('item_name').value;
    var itemPrice = document.getElementById('item_price').value;
    var itemQuantity = document.getElementById('item_quantity').value;
    var itemDescription = document.getElementById('item_description').value;

    // Validate inputs
    if (!itemName || !itemPrice || !itemQuantity || !itemDescription) {
        alert("All fields are required. Please fill in all fields.");
        return;
    }
    if (isNaN(itemPrice) || isNaN(itemQuantity) || itemPrice <= 0 || itemQuantity <= 0) {
        alert("Item price and quantity must be positive numbers.");
        return;
    }

    // Send AJAX request to add the item to the XML document
    xhr.open("GET", "add_item.php?item_name=" + encodeURIComponent(itemName) +
        "&item_price=" + encodeURIComponent(itemPrice) +
        "&item_quantity=" + encodeURIComponent(itemQuantity) +
        "&item_description=" + encodeURIComponent(itemDescription), true);

    xhr.onreadystatechange = processItemResponse;
    xhr.send(null);
}

// Function to process the response from server
function processItemResponse() {
    if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById('msg').innerHTML = xhr.responseText;
    }
}
