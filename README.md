### For local dev

1) `php artisan key:generate --ansi` <br><br>

2) Make directory for docker: <br>
   `mkdir ./storage/docker` <br>

3) Copy .env.example <br>
   `cp .env.example .env` <br>

4) Add host user to .env <br>
   `echo UID=$(id -u) >> .env` <br>
   `echo GID=$(id -g) >> .env` <br>

5) Run services docker <br>
   `docker-compose up -d --build` <br>

6) Install breeze <br>
   `composer require laravel/breeze` <br>

7) Install vue <br>
   `docker exec php-app php artisan breeze:install vue` <br>

8) Install spatie <br>
   `composer require spatie/laravel-permission` <br>
   `docker exec php-app php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"` <br>
   `docker exec php-app php artisan optimize:clear` <br>
   `docker exec php-app php artisan migrate`<br>
   `// The User model requires this trait
   use HasRoles;`<br>
   `npm install` <br>
   `npm run dev` <br>

9) Install eslint, prettier <br>
   `npm install --save-dev @rushstack/eslint-patch` <br>
   `npm install --save-dev @vue/eslint-config-prettier` <br>
   `npm install --save-dev eslint` <br>
   `npm install --save-dev eslint-plugin-vue` <br>
   `npm install --save-dev prettier` <br>

10) `npm run lint` <br>

11) Install npm dependencies <br>
    `npm install` <br>
    `npm run dev` <br>
    `vite build` <br>
    `vite` <br>

12) Migrate Laravel <br>
    `docker exec php-app php artisan migrate`<br>
    `docker exec php-app php artisan migrate:rollback`<br>
    `docker exec php-app php artisan migrate` <br>

13) create seeders <br>
    `docker exec php-app php artisan make:seeder RoleSeeder` <br>
    `docker exec php-app php artisan make:seeder AdminSeeder` <br>
    `docker exec php-app php artisan db:seed` <br>

14) Create AdminController <br>
    `docker exec php-app php artisan make:controller Admin/AdminController` <br>

15) Create resource UserResource <br>
    `docker exec php-app php artisan make:resource UserResource` <br>
    `docker exec php-app php artisan make:resource RoleResource` <br>
    `docker exec php-app php artisan make:resource PermissionResource` <br>

16) Create resource controllers UserController,RoleController,PermissionController <br>
    `docker exec php-app php artisan make:controller Crud/UserController --resource` <br>
    `docker exec php-app php artisan make:controller Crud/RoleController --resource` <br>
    `docker exec php-app php artisan make:controller Crud/PermissionController --resource` <br>

17) Create requests <br>
    `docker exec php-app php artisan make:request CreateRoleRequest` <br>
    `docker exec php-app php artisan make:request CreatePermissionRequest` <br>
