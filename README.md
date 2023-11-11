# Digimon API
## Api pública utilizada
- [https://digi-api.com/api/v1/digimon](https://digi-api.com/api/v1/digimon)

## Proyecto
Este proyecto Laravel accede a una API pública de Digimons, usando verificación de tokens con Firebase.

Los endpoints principales son los siguientes:

- `/digimons`: Devuelve un listado de todos los Digimons disponibles.
- `/digimons/{id}`: Proporciona información detallada de un Digimon específico por su ID.

## Tecnologías usadas

- PHP: 8.1.16
- Laravel: 10.10.1
- Composer:  2.5.4
- Firebase: Firabase Authentication

Para obtener más información sobre la autenticación con Firebase, consulta la [documentación oficial de Firebase Authentication](https://firebase.google.com/docs/auth/where-to-start?hl=es-419).


## Instalación

1. Clona el repositorio en tu máquina local:

    ```bash
    git clone https://github.com/angtdiaz/digimon-back.git
    ```

2. Instala las dependencias con Composer:

    ```bash
    composer install
    ```

3. Configura las variables de entorno en el archivo `.env`. Especialmente las relacionadas a firebase.

## Ejecución

El servidor inicial por default en [http://localhost:8000](http://localhost:8000).
Para que eso ocurra debes ejecutar:

```bash
php artisan serve
```

## API

Ya en producción esta es la API: [https://digimon-back-kk45rljnwq-uc.a.run.app](https://digimon-back-kk45rljnwq-uc.a.run.app).

Recuerda que debes tener un Bearer Token válido para poder consumirla.


