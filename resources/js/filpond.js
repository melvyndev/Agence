import FilePond from 'filepond';

// Initialiser FilePond sur les champs de fichier avec la classe `.filepond`
document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('input.filepond');
    inputs.forEach(input => {
        FilePond.create(input);
    });
});
