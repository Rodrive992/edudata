#!/bin/bash

# Script de inicio para Laravel
echo "Iniciando aplicación Laravel..."

# Crear enlace simbólico de storage
echo "Creando enlace simbólico de storage..."
php artisan storage:link

# Limpiar y cachear configuración (opcional pero recomendado para producción)
echo "Optimizando aplicación..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Iniciar el servidor
echo "Iniciando servidor en puerto 8000..."
php artisan serve --host=0.0.0.0 --port=8000
