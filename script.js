document.getElementById("feedbackForm")
.addEventListener("submit", function(event) {

    let name = document.querySelector(
        'input[name="name"]'
    ).value.trim();

    if (name.length < 2) {
        alert("Please enter a valid name.");
        event.preventDefault();
    }

});