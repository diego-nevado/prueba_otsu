# prueba_otsu

# Agenda Telefónica

Esta es una aplicación web para gestionar una agenda de teléfonos. Permite a los usuarios registrarse, iniciar sesión, y gestionar sus contactos personales.

## Funcionalidades

- Inicio de sesión de usuarios
- Crear, leer, actualizar y eliminar contactos
- Visualizar la lista de contactos almacenados en la base de datos
- Interfaz responsive utilizando Bootstrap

## Tecnologías utilizadas

- Backend: PHP
- Frontend: HTML, CSS, JavaScript (con Bootstrap y jQuery)
- Base de datos: MySQL

## Instrucciones de instalación y configuración

1. Clona este repositorio en tu servidor web local:
git clone https://github.com/tu-usuario/agenda-telefonica.git

2. Importa la base de datos:
- Crea una nueva base de datos llamada `agenda_telefonica` en tu servidor MySQL.
- Importa el archivo `agenda.sql` en la base de datos recién creada.

3. Configura la conexión a la base de datos:
- Abre el archivo `includes/db.php`.
- Modifica las variables `$host`, `$db`, `$user`, y `$pass` según tu configuración local.

4. Configura tu servidor web:
- Asegúrate de que tu servidor web (por ejemplo, Apache) esté configurado para servir archivos PHP.
- Coloca el proyecto en el directorio raíz de tu servidor web o configura un host virtual.

5. Accede a la aplicación:
- Abre un navegador web y navega a la URL donde has alojado el proyecto.

## Uso de la aplicación

1. En la página de inicio, ingresa tus credenciales para iniciar sesión.
2. Una vez dentro, podrás ver tu lista de contactos y gestionarlos:
- Añadir nuevos contactos
- Editar contactos existentes
- Eliminar contactos

## Desarrollo

Este proyecto utiliza Git para el control de versiones. El repositorio contiene múltiples commits que reflejan el progreso del desarrollo.