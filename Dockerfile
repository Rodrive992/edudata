FROM php:8.2-cli

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Instalar extensiones PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar el proyecto
COPY . .

# Asegurarse de que artisan sea ejecutable
RUN chmod +x artisan

# Instalar dependencias de Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Instalar dependencias de NPM y compilar assets (si es necesario)
RUN if [ -f package.json ]; then npm install && npm run build; fi

# Configurar permisos
RUN chown -R www-data:www-data storage bootstrap/cache

# Copiar y dar permisos al script de entrada
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 8000

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]