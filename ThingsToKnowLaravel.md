Create Controller
php artisan make:controller PhotoController
Create Model
php artisan make:model User
To run migration
php artisan migrate
To run server
php artisan serve
To run console
php artisan tinker
To create migration file
php artisan make:migration create_users_table


To Publish Bican Roles
php artisan vendor:publish --provider="Bican\Roles\RolesServiceProvider" --tag=config
php artisan vendor:publish --provider="Bican\Roles\RolesServiceProvider" --tag=migrations

To list Routes 
php artisan route:list
To list artisan commands
php artisan list


SQL
ALTER TABLE users DROP COLUMN member_type
ALTER TABLE users ADD COLUMN member_type integer
DESCRIBE users



