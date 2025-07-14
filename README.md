# Sistema Turismo - Gestión de Usuarios

Este proyecto es un sistema web básico de gestión de usuarios desarrollado con **PHP**, **MySQL**, **Bootstrap** y **DataTables**. Permite realizar operaciones CRUD completas con validaciones de seguridad y una interfaz moderna.

## ✨ Funcionalidades

- Inicio de sesión con usuarios existentes
- Establecer contraseña en el primer login
- CRUD completo:
  - Crear usuario (con validaciones)
  - Editar usuario
  - Eliminar usuario (borrado lógico)
  - Ver detalles de usuario
- Sesiones con encabezado personalizado
- Tabla de usuarios con:
  - Paginación
  - Buscador
  - Ordenamiento dinámico (DataTables)
- Seguridad básica (hash de contraseña con MD5, sesión de acceso)

## 🛠️ Tecnologías utilizadas

- PHP 8.2
- MySQL / MariaDB
- Bootstrap 5.3
- JavaScript (validaciones + DataTables)
- Apache (XAMPP / LAMPP)

## 📂 Estructura del proyecto

```
turismo/
├── dashboard.php
├── crear_usuario.php
├── editar_usuario.php
├── eliminar_usuario.php
├── detalle_usuario.php
├── encabezado.php
├── login/
│   ├── index.php
│   ├── login.php
│   ├── set_password.php
│   ├── logout.php
│   ├── conexion.php
│   └── js/
│       └── validaciones.js
```

## 🔐 Acceso al sistema

Al ingresar por primera vez con un usuario sin contraseña, el sistema pedirá crearla.

Ruta de inicio de sesión:

```
http://localhost/turismo/login/index.php
```

## 📦 Instalación

1. Clona el repositorio:

   ```bash
   git clone https://github.com/tu_usuario/turismo.git
   ```

2. Copia el proyecto a tu servidor local (ej. XAMPP/LAMPP):

   ```bash
   cp -r turismo /opt/lampp/htdocs/
   ```

3. Importa la base de datos desde phpMyAdmin o consola:

   - Archivo: `examen_practico.sql`

4. Asegúrate de que el archivo `conexion.php` tenga los datos correctos:

   ```php
   new mysqli("localhost", "root", "", "examen_practico");
   ```

5. Accede a:
   ```
   http://localhost/turismo/login/
   ```
