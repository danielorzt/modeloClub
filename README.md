<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# CashFlow - Sistema de Gestión Financiera para Clubes

![Banner del Proyecto Laravel](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

**CashFlow** es una aplicación web diseñada para gestionar las actividades financieras de un club o asociación. Permite el seguimiento de socios, actividades, préstamos, pagos y participaciones. El sistema proporciona una interfaz web para usuarios generales y una API RESTful para acceso programático e integraciones.

## Tabla de Contenidos

1.  [Acerca del Proyecto](#acerca-del-proyecto)
2.  [Características Principales](#características-principales)
3.  [Construido Con](#construido-con)
4.  [Primeros Pasos](#primeros-pasos)
    * [Prerrequisitos](#prerrequisitos)
    * [Instalación](#instalación)
5.  [Estructura del Proyecto](#estructura-del-proyecto)
6.  [Endpoints de la API](#endpoints-de-la-api)
    * [Autenticación](#autenticación)
    * [Recursos](#recursos)
7.  [Interfaz Web](#interfaz-web)
    * [Localización](#localización)
    * [Tema](#tema)
8.  [Esquema de la Base de Datos](#esquema-de-la-base-de-datos)
9.  [Contribuciones](#contribuciones)
10. [Licencia](#licencia)
11. [Agradecimientos](#agradecimientos)

## Acerca del Proyecto

Este proyecto, inicialmente llamado "modeloClub", tiene como objetivo proporcionar una plataforma robusta para gestionar diversas operaciones financieras dentro de un club. Incluye módulos para:

* **Gestión de Miembros**: Seguimiento de los detalles de los asociados.
* **Gestión de Actividades**: Registro de las actividades del club y los fondos recaudados.
* **Gestión de Préstamos**: Manejo de solicitudes de préstamos, aprobaciones y seguimiento.
* **Procesamiento de Pagos**: Registro de pagos realizados a préstamos.
* **Seguimiento de Participaciones**: Gestión de la participación de los miembros en actividades y sus contribuciones.
* **Autenticación de Usuarios**: Acceso seguro para usuarios mediante JWT.

El frontend proporciona una interfaz de bienvenida con características como una calculadora de préstamos, una calculadora de inversiones e información sobre las actividades del club. También admite el cambio de tema (claro/oscuro) y la selección de idioma (inglés/español).

## Características Principales

* **API RESTful**: Para gestionar recursos como asociados, actividades, préstamos, pagos y participaciones.
* **Autenticación JWT**: Acceso seguro a la API mediante JSON Web Tokens.
* **Localización**: Soporte para múltiples idiomas (implementados inglés y español).
* **Interfaz Web Responsiva**: Página de inicio amigable con información y calculadoras.
* **Personalización de Temas**: Soporte para modo claro y oscuro en la interfaz web.
* **Operaciones CRUD**: Para todas las entidades principales del sistema.
* **Validación de Datos**: Asegura la integridad de los datos para todas las entradas.
* **Migraciones y Seeders de Base de Datos**: Para una fácil configuración y prueba de la base de datos.

## Construido Con

Este proyecto está construido utilizando el framework Laravel y aprovecha varias tecnologías web modernas:

* [![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com) - El framework PHP principal.
* **PHP ^8.2** - Lenguaje de scripting del lado del servidor.
* [![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/) / [![PostgreSQL](https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white)](https://www.postgresql.org/) / [![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)](https://www.sqlite.org/) - Opciones de base de datos (configurado por defecto para SQLite).
* **Plantillas Blade** - El potente motor de plantillas de Laravel.
* [![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/) - Framework frontend para estilos.
* [![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/) - Framework CSS utility-first (utilizado mediante Vite).
* [![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev/) - Herramientas frontend de próxima generación.
* **JSON Web Tokens (JWT)** - Para autenticación de API (`php-open-source-saver/jwt-auth`).
* **Laravel Localization** - Para soporte multi-idioma (`mcamara/laravel-localization`).

## Primeros Pasos

Para obtener una copia local en funcionamiento, sigue estos sencillos pasos.

### Prerrequisitos

* PHP >= 8.2
* Composer
* Node.js y npm (o yarn)
* Un servidor de base de datos (MySQL, PostgreSQL, SQLite, etc.)

### Instalación

1.  **Clona el repositorio:**
    ```bash
    git clone [https://github.com/danielorzt/modeloclub.git](https://github.com/danielorzt/modeloclub.git)
    cd modeloclub
    ```

2.  **Instala las dependencias de PHP:**
    ```bash
    composer install
    ```
    Esto también ejecutará scripts `post-autoload-dump` incluyendo `php artisan package:discover`.

3.  **Instala las dependencias de NPM y compila los assets:**
    ```bash
    npm install
    npm run dev # o npm run build para producción
    ```
   

4.  **Configura tu archivo de entorno:**
    * Copia `.env.example` a `.env`:
        ```bash
        cp .env.example .env
        ```
        Un script `post-root-package-install` en `composer.json` también intenta esto.
    * Genera una clave de aplicación:
        ```bash
        php artisan key:generate
        ```
        Esto también es parte de `post-create-project-cmd` en `composer.json`.
    * Configura los detalles de conexión de tu base de datos en el archivo `.env` (ej., `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`). El valor por defecto es SQLite.
    * Configura tu secreto JWT:
        ```bash
        php artisan jwt:secret
        ```
        Y establece `JWT_SECRET` en tu archivo `.env`.

5.  **Ejecuta las migraciones de la base de datos:**
    ```bash
    php artisan migrate
    ```
    Esto creará las tablas necesarias. Un script `post-create-project-cmd` en `composer.json` también intenta esto.

6.  **(Opcional) Puebla la base de datos:**
    El `DatabaseSeeder` crea un usuario de prueba.
    ```bash
    php artisan db:seed
    ```

7.  **Sirve la aplicación:**
    ```bash
    php artisan serve
    ```
    La aplicación debería estar ejecutándose, típicamente en `http://127.0.0.1:8000`.

Para una guía visual sobre Laravel, puedes consultar tutoriales como:
[![Tutorial de Laravel en Video](https://img.youtube.com/vi/ImtZ5brodsE/0.jpg)](https://www.youtube.com/watch?v=ImtZ5brodsE)
*(Nota: El video es un tutorial general de Laravel y no específico de este proyecto.)*

## Estructura del Proyecto

El proyecto sigue la estructura de directorios estándar de Laravel:

* `app/`: Contiene el código central de la aplicación.
    * `Http/Controllers/`: Maneja las solicitudes entrantes y la lógica de negocio.
    * `Models/`: Modelos Eloquent que representan las tablas de la base de datos.
    * `Providers/`: Proveedores de servicios para arrancar servicios.
* `bootstrap/`: Contiene archivos que arrancan el framework.
* `config/`: Archivos de configuración de la aplicación.
* `database/`: Migraciones de base de datos, factorías y seeders.
* `lang/`: Archivos de idioma para localización.
* `public/`: Archivos accesibles públicamente (punto de entrada `index.php`, assets).
* `resources/`:
    * `css/`: Archivos CSS (Tailwind).
    * `js/`: Archivos JavaScript.
    * `views/`: Plantillas Blade.
* `routes/`: Definiciones de rutas (`api.php`, `web.php`, `console.php`).
* `storage/`: Plantillas Blade compiladas, sesiones basadas en archivos, cachés de archivos, logs y otros archivos generados por el framework.
* `tests/`: Pruebas automatizadas (Feature y Unit).
* `vendor/`: Dependencias de Composer.
* `vite.config.js`: Configuración para el empaquetado de assets con Vite.
* `composer.json`: Dependencias y scripts de PHP.
* `package.json`: Dependencias y scripts de Node.js.

## Endpoints de la API

La API está definida en `routes/api.php` y tiene el prefijo `/api`. Todos los endpoints de recursos bajo `/api/auth` requieren autenticación JWT.

### Autenticación

Ruta Base: `/api/auth`

| Método | Endpoint     | Acción del Controlador      | Descripción                          |
| :----- | :------------- | :------------------------- | :------------------------------------- |
| POST   | `/register`  | `AuthController@register`  | Registrar un nuevo usuario.            |
| POST   | `/login`     | `AuthController@login`     | Iniciar sesión y obtener JWT.          |
| POST   | `/logout`    | `AuthController@logout`    | Cerrar sesión (invalidar token).     |
| POST   | `/refresh`   | `AuthController@refresh`   | Refrescar un JWT existente.        |
| POST   | `/me`        | `AuthController@me`        | Obtener detalles del usuario autenticado. |

### Recursos

Todas las siguientes rutas de recursos están bajo el prefijo `/api/auth` y requieren autenticación JWT. Siguen las convenciones RESTful estándar.

* **Actividades** (`ActividadController`)
    * `GET /actividades`: Lista todas las actividades.
    * `POST /actividades`: Crea una nueva actividad.
        * Body: `Nombre_Actividad` (string, requerido), `Fecha_Actividad` (date, Y-m-d, requerido), `Total_Recaudado` (numeric, requerido).
    * `GET /actividades/{id}`: Muestra una actividad específica.
    * `PUT /actividades/{id}`: Actualiza una actividad específica.
    * `DELETE /actividades/{id}`: Elimina una actividad.

* **Asociados** (`AsociadoController`)
    * `GET /asociados`: Lista todos los asociados.
    * `POST /asociados`: Crea un nuevo asociado.
        * Body: `documento` (string, requerido, único), `nombres` (string, requerido), `apellidos` (string, requerido), `fecha_nacimiento` (date, anulable), `direccion_residencia` (string, anulable), `telefono` (string, anulable), `email` (email, anulable, único).
    * `GET /asociados/{id}`: Muestra un asociado específico.
    * `PUT /asociados/{id}`: Actualiza un asociado específico.
    * `DELETE /asociados/{id}`: Elimina un asociado.

* **Pagos** (`PagoController`)
    * `GET /pagos`: Lista todos los pagos (con detalles del préstamo).
    * `POST /pagos`: Crea un nuevo pago.
        * Body: `prestamo_id` (exists:prestamos,id, requerido), `fecha_pago` (date, requerido), `valor_pago` (numeric, requerido), `numero_cuota` (integer, requerido).
    * `GET /pagos/{id}`: Muestra un pago específico (con detalles del préstamo).
    * `PUT /pagos/{id}`: Actualiza un pago específico.
    * `DELETE /pagos/{id}`: Elimina un pago.

* **Participaciones** (`ParticipacionController`)
    * `GET /participaciones`: Lista todas las participaciones (con detalles del asociado y la actividad).
    * `POST /participaciones`: Crea una nueva participación.
        * Body: `actividad_id` (exists:actividades,id, requerido), `asociado_id` (exists:asociados,id, requerido), `monto_asignado` (numeric, requerido). (Actualiza `Total_Recaudado` en `Actividad`).
    * `GET /participaciones/{id}`: Muestra una participación específica (con detalles del asociado y la actividad).
    * `PUT /participaciones/{id}`: Actualiza una participación específica. (Ajusta `Total_Recaudado` en `Actividad`).
    * `DELETE /participaciones/{id}`: Elimina una participación. (Ajusta `Total_Recaudado` en `Actividad`).

* **Préstamos** (`PrestamoController`)
    * `GET /prestamos`: Lista todos los préstamos (con detalles del asociado).
    * `POST /prestamos`: Crea un nuevo préstamo.
        * Body: `asociado_id` (exists:asociados,id, requerido), `valor_prestamo` (numeric, requerido), `tasa_interes` (numeric, anulable), `numero_cuotas` (integer, requerido), `fecha_prestamo` (date, requerido).
    * `GET /prestamos/{id}`: Muestra un préstamo específico (con detalles del asociado y pagos).
    * `PUT /prestamos/{id}`: Actualiza un préstamo específico.
    * `DELETE /prestamos/{id}`: Elimina un préstamo.

## Interfaz Web

La interfaz web principal es una única página de destino definida en `resources/views/welcome.blade.php`. Es servida por el `HomeController`.

### Características Clave:
* **Visualización de Información**: Muestra el total de socios, total de actividades y las últimas actividades.
* **Calculadoras**:
    * Calculadora de Préstamos para Solicitar.
    * Calculadora de Inversiones para Prestar.
* **Diseño Responsivo**: Se adapta a diferentes tamaños de pantalla utilizando Bootstrap.

### Localización
La interfaz web admite inglés y español. La selección de idioma está disponible en la barra de navegación. Esto es manejado por el paquete `mcamara/laravel-localization`.

Las rutas se agrupan con un prefijo de configuración regional:
```php
// Desde routes/web.php
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), //
        'middleware' => [ /* middlewares de localización */ ] //
    ],
    function() {
        Route::get('/', [HomeController::class, 'index'])->name('home'); //
    }
);


[![RICKROLL](https://markdown-videos-api.jorgenkh.no/url?url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DdQw4w9WgXcQ)](https://www.youtube.com/watch?v=dQw4w9WgXcQ)
