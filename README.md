# PUBLINET

Prueba técnica

# Instalación
1. Clonar repositorio
2. Configurar .env
3. Correr php artisan install
4. Correr php artisan migrate:refresh --seed
5. Opcional: en caso de querer ver las imagenes subidas en el navegador correr el comando: php artisan storage:link

# Endpoints requeridos

## Crear nueva empresa
### POST /api/companies/
    body {
        "name": "required|string|min:3|unique",
        "country": "required|string|min:3"
    }

    return 201
    {
        "data": {
            "id": 4,
            "name": "TestStore",
            "country": "CountryTest"
        },
        "status": true,
        "message": "Process is successfully completed"
    }

## Editar una empresa
### PUT /api/companies/{company_id}
    body {
        "name": "required|string|min:3|unique",
        "country": "required|string|min:3"
    }

    return 204 No Content

## Listado de empresas
### GET /api/companies
    return 200
    {
        "data": [
            {
                "id": 1,
                "name": "Corkery, Raynor and Greenholt",
                "country": "Rwanda"
            },
            {
                "id": 2,
                "name": "Thompson-Rowe",
                "country": "Maldives"
            },
            {
                "id": 3,
                "name": "Herman LLC",
                "country": "Eritrea"
            }
        ],
        "status": true,
        "message": "Process is successfully completed"
    }

## Obtener empresa
### GET /api/companies/{company_id}
    return 200
    {
        "data": {
            "id": 1,
            "name": "Corkery, Raynor and Greenholt",
            "country": "Rwanda"
        },
        "status": true,
        "message": "Process is successfully completed"
    }

## Borrar empresa
### DELETE /api/companies/{company_id}
    return 204 No Content

## Listado de pantallas perteneciente a una empresa
### GET /api/companies/{company_id}/displays
    return 200
    {
        "data": {
            "id": 1,
            "name": "Corkery, Raynor and Greenholt",
            "country": "Rwanda"
            "displays": [
                {
                    "id": 3,
                    "name": "Trace Kihn",
                    "latitude": "-6.79",
                    "longitude": "-129.10",
                    "type": "outdoor",
                    "price": "82.44"
                }
            ]
        },
        "status": true,
        "message": "Process is successfully completed"
    }

## Crear nueva pantalla
### POST /api/displays
    body {
        "name": "required|string|min:3|unique",
        "company_id": "required|int",
        "latitude": "required|numeric",
        "longitude": "required|numeric",
        "type" "required|in:indoor,outdoor"
    }

    return 201
    {
        "data": {
            "id": 7,
            "name": "testDisplay",
            "latitude": 28.35,
            "longitude": 12.28,
            "type": "indoor",
            "price": 50.12
        },
        "status": true,
        "message": "Process is successfully completed"
    }

## Editar una pantalla
### PUT /api/displays/{display_id}
    body {
        "name": "required|string|min:3|unique",
        "company_id": "required|int",
        "latitude": "required|numeric",
        "longitude": "required|numeric",
        "type" "required|in:indoor,outdoor"
    }

    return 204 No Content

## Listado de pantallas
### GET /api/displays
    query_params {
        "country": "Argentina"
    }

    return 200
    {
        "data": [
            {
                "id": 1,
                "name": "Cecilia Reichert",
                "latitude": "-32.85",
                "longitude": "46.63",
                "type": "outdoor",
                "price": "987.31",
                "company": {
                    "id": 1,
                    "name": "Corkery, Raynor and Greenholt",
                    "country": "Argentina"
                }
            }
        ],
        "status": true,
        "message": "Process is successfully completed"
    }

## Obtener pantalla
### GET /api/displays/{display_id}
    return 200
    {
        "data": {
            "id": 1,
            "name": "Cecilia Reichert",
            "latitude": "-32.85",
            "longitude": "46.63",
            "type": "outdoor",
            "price": "987.31",
            "company": {
                "id": 1,
                "name": "Koelpin-Bernhard",
                "country": "Argentina"
            }
        },
        "status": true,
        "message": "Process is successfully completed"
    }

## Borrar pantalla
### DELETE /api/displays/{display_id}
    return 204 No Content

# Endpoint opcional

## Cargar foto a una pantalla
### POST /api/displays/{display_id}/photos
    body {
        "photo": "required|image|max:2048"
    }

    return 201
    {
        data": {
            "id": 3,
            "path": "/storage/displays/0MhsWYh3oc4DvB0ww.jpg"
        }
    }
