require('./bootstrap');
require('./components/descubre.js');
$(document).ready(function () {
    $('.dropdown-toggle').dropdown()
});


window.valImage = function (obj) {
    var uploadFile = obj.files[0];

    if (!window.FileReader) {
        alert('El navegador no soporta la lectura de archivos');
        return;
    }

    if (!(/\.(jpeg|jpg|png|gif)$/i).test(uploadFile.name)) {
        alert('El archivo a adjuntar no es una imagen');
    }
    else {
        var img = new Image();
        let output = document.getElementById('preview');
        img.onload = function () {
            if (uploadFile.size > 300000) {
                alert('El peso de la imagen no puede exceder los 3Mb')
            }

        };
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    }
}