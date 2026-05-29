# Aplicativo web PHP + MySQL

Este proyecto es una vista previa de una aplicación para gestionar el valor de horas de trabajo de dependencias de la Secretaría de Educación.

## Características

- Dropdown para dependencias:
  - Administrativa
  - Inspección y Vigilancia
  - Transporte
  - PAE
  - Bienestar Social
- Dropdown para zonas:
  - Urbana
  - Rural
- Fecha seleccionable
- Selección de tipo de día:
  - Normal
  - Dominical
- Tabla de registros guardados con cálculo de precio por hora y total.

## Precios por hora

- Dependencias generales:
  - Urbana: $29.000
  - Rural: $31.000
- Bienestar Social:
  - Urbana: $29.000
  - Rural: $32.000
  - Dominical: $40.000

## Archivos

- `index.php` → interfaz web y lógica de formulario
- `db.php` → conexión a MySQL
- `styles.css` → estilo básico
- `init.sql` → script de creación de base de datos y tabla

## Configuración local en Visual Studio Code

1. Instala PHP y MySQL en tu máquina.
2. Copia el proyecto a la carpeta del servidor web local (`htdocs`, `www`, etc.).
3. Ejecuta `init.sql` en tu servidor MySQL para crear la base de datos y la tabla.
4. Ajusta los datos de conexión en `db.php` según tu usuario/contraseña.
5. Abre `index.php` en el navegador local.

## Vista previa local

- Usa la extensión `PHP Server` en VS Code o el servidor integrado de PHP:
  - Abre terminal y ejecuta: `php -S localhost:8000`
  - Luego navega a `http://localhost:8000`

## Subir a GitHub

1. Inicializa Git en la carpeta:
   - `git init`
   - `git add .`
   - `git commit -m "Primera versión de la app de horas"`
2. Crea un repositorio en GitHub.
3. Agrega el remoto y sube:
   - `git remote add origin <URL-del-repo>`
   - `git branch -M main`
   - `git push -u origin main`

## Despliegue en alwaysdata

1. Crea tu cuenta en `alwaysdata.com`.
2. Añade un sitio web PHP y una base de datos MySQL.
3. Sube los archivos del proyecto al hosting.
4. Ajusta `db.php` con los datos de conexión que te entrega `alwaysdata`.
5. Utiliza el script `init.sql` para crear la tabla en la base de datos remota.

## Mejor opción para tu flujo

- Editar en **Visual Studio Code**.
- Usar **GitHub Desktop** o Git en terminal para controlar versiones.
- Probar localmente con `php -S localhost:8000`.
- Subir el proyecto a **GitHub**.
- Desplegar en **alwaysdata** cambiando solo `db.php`.
