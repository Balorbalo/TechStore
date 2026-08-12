

// Registration Form Validation
function validateRegister() {
    let name = document.getElementsByName("name")[0].value;
    let email = document.getElementsByName("email")[0].value;
    let password = document.getElementsByName("password")[0].value;

    if (name == "" || email == "" || password == "") {
        alert("Please fill in all registration fields.");
        return false;
    }

    return true;
}

// Login Form Validation
function validateLogin() {
    let email = document.getElementsByName("email")[0].value;
    let password = document.getElementsByName("password")[0].value;

    if (email == "" || password == "") {
        alert("Please enter your email and password.");
        return false;
    }

    return true;
}

// Contact Form Validation
function validateContact() {
    let name = document.getElementsByName("name")[0].value;
    let email = document.getElementsByName("email")[0].value;
    let message = document.getElementsByName("message")[0].value;

    if (name == "" || email == "" || message == "") {
        alert("Please complete all fields before sending.");
        return false;
    }

    alert("Message sent successfully!");
    return true;
}

// Confirm Add to Cart
function confirmCart() {
    return confirm("Do you want to add this product to your cart?");
}

// Confirm Order
function confirmOrder() {
    return confirm("Are you sure you want to place this order?");
}
