.PHONY: install
install:
	@echo "--> Instalando todas as dependências"
	@composer install
	@npm install
	@npm run build
	@php artisan key:generate
	@php artisan migrate
	@echo "<-- Tudo pronto."

.PHONY: clear
clear:
	@echo "--> Limpando todas as coisas..."
	@php artisan cache:clear
	@php artisan config:clear
	@php artisan route:clear
	@php artisan view:clear
	@php artisan optimize:clear
	@php artisan optimize
	@echo "--> Terminamos..."

.PHONY: dt
dt:
@php artisan cache:clear
@composer dump-autoload
@php artisan test

