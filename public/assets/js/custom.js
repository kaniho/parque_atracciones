
// script para que funcione el selector de elementos por página
function changePerPage() {
    const perPage = document.getElementById('perPage').value;
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('perPage', perPage);
    window.location.search = urlParams.toString();
}

// Manejar la confirmación del modal
let confirmButton = document.getElementById('confirmButton');
let formToSubmit = null;

function showConfirmModal(form) {
    formToSubmit = form;
    let confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
    confirmModal.show();
}

confirmButton.addEventListener('click', function () {
    if (formToSubmit) {
        formToSubmit.submit();
    }
});

// parte para la desactivación de los botones de eliminar
function toggleDeactivateButton() {
    const checkbox = document.getElementById('deactivateCheckbox');
    const button = document.getElementById('deactivateButton');
    button.disabled = !checkbox.checked;
}
/*document.addEventListener('DOMContentLoaded', function () {
    var deactivateCheckbox = document.getElementById('deactivateCheckbox');
    var deactivateButton = document.getElementById('deactivateButton');

    deactivateCheckbox.addEventListener('change', function () {
        deactivateButton.disabled = !this.checked;
    });
});*/



// tooltips de los comentarios
document.addEventListener('DOMContentLoaded', function () {
    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

function changePerPage() {
    const perPage = document.getElementById('perPage').value;
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('perPage', perPage);
    window.location.search = urlParams.toString();
}
