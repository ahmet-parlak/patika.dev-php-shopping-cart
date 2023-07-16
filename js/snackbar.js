export function showSnackbar(message) {
    const snackbarDiv = document.getElementById("snackbar");
    const snackbar = document.createElement('div');
    snackbar.classList.add('snackbar');
    snackbar.innerHTML = message;
    snackbarDiv.appendChild(snackbar);
    snackbar.classList.add("show");
    setTimeout(function () {
        snackbar.classList.remove("show");
    }, 3000);
}




