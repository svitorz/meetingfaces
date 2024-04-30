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