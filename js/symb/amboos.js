function copyToClipboard(id) {
    var copyText = document.getElementById(id);
    copyText.select();
    copyText.setSelectionRange(0, 99999); // to work on mobile
    navigator.clipboard.writeText(copyText.value);
}

function popupBox(puid) {
    var modal = document.getElementById(puid);
    // close on blur/loss of focus
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

<!-- The text field -->
Recommended citation: 
<input type="text" value="Tyrrell, Christopher D. 2022. Native Bamboos of Abiayala/the Americas. Retrieved YYYY-MM-DD from https://www.americanbamboos.org." id="citation">

<!-- The button used to copy the text -->
<button onclick="copyToClipboard('citation')">Copy citation</button>