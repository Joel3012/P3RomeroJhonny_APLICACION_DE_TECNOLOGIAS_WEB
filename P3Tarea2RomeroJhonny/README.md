# Admin Enlaces PHP

Proyecto PHP con PostgreSQL y pgAdmin usando Docker.

## Estructura del Proyecto

```
AdminEnlacesPHP/
├── app/                    # Lógica de aplicación
├── docker/                 # Configuración de Docker
│   ├── docker-compose.yml  # Definición de servicios
│   └── postgres_data/      # Persistencia de datos PostgreSQL
├── framework/              # Framework personalizado
│   └── Database.php        # Clase de conexión a BD
├── public/                 # Punto de entrada público
├── resources/              # Templates y recursos
├── routes/                 # Definición de rutas
├── .env                    # Variables de entorno
└── .env.example            # Plantilla de variables de entorno
```

## Requisitos

- Docker
- Docker Compose

## Configuración

1. Copia el archivo de configuración de ejemplo:
```bash
cp .env.example .env
```

2. Ajusta las variables en `.env` según tus necesidades

## Uso

### Iniciar los servicios

```bash
cd docker
docker-compose up -d
```

### Detener los servicios

```bash
cd docker
docker-compose down
```

### Ver logs

```bash
cd docker
docker-compose logs -f
```

## Acceso a los Servicios

- **PostgreSQL**: `localhost:5432`
  - Usuario: `espe`
  - Contraseña: `espe`
  - Base de datos: `ATW`

- **pgAdmin**: http://localhost:5050
  - Email: `espe@mail.com`
  - Contraseña: `espe`

### Configurar PostgreSQL en pgAdmin

1. Accede a pgAdmin en http://localhost:5050
2. Click derecho en "Servers" → "Register" → "Server"
3. En la pestaña "General":
   - Name: `PostgreSQL Local`
4. En la pestaña "Connection":
   - Host: `postgres`
   - Port: `5432`
   - Database: `ATW`
   - Username: `espe`
   - Password: `espe`

## Conexión desde PHP

La clase `Database` en `framework/Database.php` está configurada para conectarse automáticamente al contenedor de PostgreSQL usando el hostname `postgres`.

```php
$db = new Database();
```

## Notas

- Los datos de PostgreSQL se persisten en `docker/postgres_data/`
- Los servicios están en la red `admin-enlaces-network`
- La conexión desde PHP usa el hostname `postgres` (nombre del contenedor)
