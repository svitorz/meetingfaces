echo "--> Instalando todas as dependências" && composer install && npm install && npm run build && php artisan key:generate && php artisan migrate && echo "<-- Tudo pronto."
