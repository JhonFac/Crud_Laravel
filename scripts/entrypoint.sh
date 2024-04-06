#!/bin/sh

set -e
# start Container
echo "Contenedor iniciado"
echo "$(date): Ejecutando proceso"

# php artisan serve --port=8000 --host=0.0.0.0
php artisan serve --port=$PORT --host=0.0.0.0