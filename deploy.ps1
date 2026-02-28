Write-Host "=== Автоматизация задач для Laravel-проекта ==="

Write-Host "Установка зависимостей..."
composer install

Write-Host "Выполнение миграций..."
php artisan migrate:fresh --seed

Write-Host "Запуск тестов..."
php artisan test