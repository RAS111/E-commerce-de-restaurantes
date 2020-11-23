function validarDatos() {
    
    var descripcion = document.getElementById("txtDescripcion").value;
    var directorio = document.getElementById("txtDirectorio").value;

    if (descripcion.trim() == "") {
        alert("La descripcion no debe estar vacio");
        return;
    } else if (descripcion.length < 3 ) {
        alert("La descripcion debe contener al menos 3 caracteres");
        return;
    }

    if (directorio.trim() == "") {
        alert("El directorio no debe estar vacio");
        return;
    } else if (directorio.length < 3 ) {
        alert("El descripcion debe contener al menos 3 caracteres");
        return;
    }

    var form = document.getElementById("frmDatos");
    form.submit();
}