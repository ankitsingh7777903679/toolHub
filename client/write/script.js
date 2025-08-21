function generateResponse() {
    var text = document.getElementById("text");
    var pera = document.getElementById("pera");
    var response = document.getElementById("response");
    var datetime = document.getElementById("datetime");

    if (!text.value.trim()) {
        response.innerHTML = "Please enter some text.";
        datetime.innerHTML = "";
        return;
    }
 var paragraphs = parseInt(pera.value) || 3;
    fetch("response.php", {
        method: "POST",
        body: JSON.stringify({ 
            text: text.value, 
            pera: pera.value }),
        headers: {
            "Content-Type": "application/json"
        }
    })
        .then(res => {
            if (!res.ok) throw new Error("Network response was not ok");
            return res.text();
        })
        .then(res => {
            response.innerHTML = formatResponse(res);
            // datetime.innerHTML = "Generated on: 10:14 PM IST, Wednesday, August 20, 2025";
        })
        .catch(error => {
            response.innerHTML = "Error: " + error.message;
            datetime.innerHTML = "";
        });
}

function formatResponse(text) {
    let formattedText = String(text);

    // Convert # to <h1>, ## to <h2>, ### to <h3>
    formattedText = formattedText.replace(/^#\s(.+)/gm, '<h1 mx-0>$1</h1>');
    formattedText = formattedText.replace(/^##\s(.+)/gm, '<h2>$1</h2>');
    formattedText = formattedText.replace(/^###\s(.+)/gm, '<h3>$1</h3>');

    // Convert **text** to bold <strong>
    formattedText = formattedText.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

    // Convert *text* to italic <em>
    formattedText = formattedText.replace(/\*(.*?)\*/g, '<em>$1</em>');

    // Replace newlines with <br> for proper display
    formattedText = formattedText.replace(/\n/g, '<br>');

    return formattedText;
}