#!/bin/sh

echo "--> Instalando todas as dependências"
if [ ! -e ".env" ]; then
    cp -r .env.example .env
fi
composer install
npm install
npm run build
php artisan key:generate
php artisan migrate

echo "<-- Tudo pronto."
