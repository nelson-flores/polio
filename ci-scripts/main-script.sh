#!/bin/bash
# Uso: bash script.sh APP_PATH
#
# APP_PATH é a pasta do projeto na VPS

APP_PATH="$1"

# Navega até a pasta do projeto e executa os comandos Laravel
cd "$APP_PATH"

# Criar diretórios de cache com sudo se necessário
sudo mkdir -p storage/framework/{cache,sessions,views}
sudo mkdir -p bootstrap/cache

# Ajustar permissões com sudo
sudo chmod -R 775 storage bootstrap/cache

# Instalar dependências do composer
composer install --ignore-platform-reqs

# Rodar comandos artisan
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:clear
php artisan storage:link
