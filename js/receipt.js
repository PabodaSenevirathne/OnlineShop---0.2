// Function to clear session data using AJAX request to the server
function Ok() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/clear-session.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Session data cleared");
            localStorage.removeItem("cart");
            // Close the receipt window
            window.close();
        }
    };
    // POST request to trigger the server-side code
    xhr.send("okClicked=true");
}
