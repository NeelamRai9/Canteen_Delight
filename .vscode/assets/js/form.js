document.addEventListener('DOMContentLoaded', function() {
    var inputElements = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');

    inputElements.forEach(function(input) {
        input.addEventListener('input', function() {
            validateInput(input);
        });
    });
});

window.escapeHtml = function (text) {
    return text.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/&/g, "&amp;");
}




// Function to show a pop-up message
function showPopupMessage(response) {
    var popup = document.createElement("div");
    popup.className = "popup";
    popup.textContent = response.message;

    if (response.success) {
        popup.classList.add("success");
    } else {
        popup.classList.add("error");
    }

    document.body.appendChild(popup);

    setTimeout(function () {
        popup.style.opacity = "0";
        setTimeout(function () {
            document.body.removeChild(popup);
        }, 1000);
    }, 3000);
}


// After an AJAX request to your PHP code and receiving a JSON response
var response = JSON.parse(xhr.responseText);
showPopupMessage(response);

// Attach the sign-in function to the "Sign In" button's click event
document.querySelector('.form.sign-in button').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default form submission
    signIn(); // Call the sign-in function
});





