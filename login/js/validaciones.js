// Validación para crear un nuevo usuario (contraseña obligatoria)
function validarFormularioCrearUsuario() {
    const usuario = document.getElementById('usuario').value.trim();
    const nombre = document.getElementById('nombre').value.trim();
    const apellido = document.getElementById('apellido').value.trim();
    const contrasenia = document.getElementById('contrasenia').value.trim();
    const perfil = document.getElementById('perfil').value;

    if (!usuario || !nombre || !apellido || !contrasenia || !perfil) {
        alert('Todos los campos son obligatorios.');
        return false;
    }

    return true;
}

// Validación para editar usuario (contraseña opcional)
function validarFormularioEditarUsuario() {
    const usuario = document.getElementById('usuario').value.trim();
    const nombre = document.getElementById('nombre').value.trim();
    const apellido = document.getElementById('apellido').value.trim();
    const perfil = document.getElementById('perfil').value;

    if (!usuario || !nombre || !apellido || !perfil) {
        alert('Todos los campos excepto la contraseña son obligatorios.');
        return false;
    }

    return true;
}
