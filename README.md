# Proyecto Web - Evaluación Técnica Externa

Este proyecto web es una evaluación técnica de la empresa externa. A continuación, se detallan los pasos necesarios para su instalación y configuración.

## Instalación del Proyecto Web

### 1. Clonar el Repositorio
```bash
git clone https://github.com/alexandergarcia/evaluacion-tecnica-externa.git
```

### 2. Instalación de Dependencias
Ejecuta los siguientes comandos para instalar las dependencias necesarias:
```bash
composer install
npm install 
npm run dev
```

### 3. Configuración del Archivo `.env`
Duplica el archivo `.env.exmple` y renómbralo a `.env`.

### 4. Generar la Llave de Laravel
Ejecuta el siguiente comando para crear la llave de Laravel:
```bash
php artisan key:generate
```

### 5. Configurar Acceso a la Base de Datos
Edita el archivo `.env` para configurar los accesos a la base de datos.

### 6. Ejecutar Migraciones y Seeders
Ejecuta el siguiente comando para realizar las migraciones y poblar la base de datos:
```bash
php artisan migrate:fresh --seed
```

### 7. Levantar el Proyecto
Ejecuta el siguiente comando para iniciar el servidor:
```bash
php artisan serve
```

### 8. Ingreso al Sistema
Utiliza las siguientes credenciales para ingresar al sistema:
- **Correo:** admin@example.com
- **Contraseña:** password

### 9. Video de Demostración
Puedes ver el video de demostración del funcionamiento en el siguiente enlace:
[Video de Demostración](https://youtu.be/ylfNfwOGhrM)

## Instalación de la API

### 1. Importar la Colección a Postman
Importa la colección a Postman. En caso de no haber recibido la invitación, puedes descargar los endpoints desde los siguientes enlaces:
- [Endpoints de Tareas](https://github.com/alexandergarcia/evaluacion-tecnica-externa/blob/main/public/endpoints-api/tasks.postman_collection.json)
- [Endpoints de Usuarios](https://github.com/alexandergarcia/evaluacion-tecnica-externa/blob/main/public/endpoints-api/users.postman_collection.json)

---
