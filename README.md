Sistema de Asignación de Solicitudes
Este proyecto es un sistema de asignación de solicitudes creado con el framework Laravel. A continuación, se detallan los pasos necesarios para poner en marcha el proyecto en un entorno local.
Ejecución
1.	Ejecuta las migraciones y seeders:

php artisan migrate:fresh --seed

Este comando limpia la base de datos, ejecuta todas las migraciones para crear las tablas necesarias y luego ejecuta los seeders para llenar las tablas con datos de prueba.

2.	Inicia el servidor de desarrollo:

php artisan serve

Esto iniciará un servidor de desarrollo. Después de ejecutar este comando, Laravel proporcionará un enlace donde se podrá ver el proyecto en el navegador (por defecto, http://localhost:8000).

Notas adicionales
•	No necesita tener activo XAMPP, PHPMyAdmin, ni otros servidores de bases de datos como MySQL porque el proyecto está configurado para usar SQLite.
