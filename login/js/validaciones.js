function validarFormularioUsuario() {
    const usuario = document.getElementById("usuario").value.trim();
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById("apellido").value.trim();
    const contrasenia = document.getElementById("contrasenia").value.trim();
    const perfil = document.getElementById("perfil").value;

    if (!usuario || !nombre || !apellido || !contrasenia || !perfil) {
        alert("Todos los campos son obligatorios.");
        return false;
    }

    return true; // Se valida en backend si el usuario o contraseña ya existen
}
