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

6) Uncomment the line in php.ini for unisharp/laravel-filemanager:^2.7 <br>
   `C:\php-8.1.23-nts-Win32-vs16-x64\php.ini` <br>
   `extension=exif` <br>

7) Install laravel-filemanager 2.7 <br>
   `composer require unisharp/laravel-filemanager:^2.7` <br>

8) Install laravel-filemanager 2.7 <br>
   `composer require unisharp/laravel-filemanager:^2.7` <br>

9) Publish resource Laravel File Manager (LFM) <br>
   `php artisan vendor:publish --tag=lfm_public` <br>

10) Install vue <br>
   `docker exec php-app php artisan breeze:install vue` <br>

11) Install spatie <br>
   `composer require spatie/laravel-permission` <br>
   `docker exec php-app php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"` <br>
   `docker exec php-app php artisan optimize:clear` <br>
   `docker exec php-app php artisan migrate`<br>
   `// The User model requires this trait
   use HasRoles;`<br>
   `npm install` <br>
   `npm run dev` <br>

12) Install eslint, prettier <br>
   `npm install --save-dev @rushstack/eslint-patch` <br>
   `npm install --save-dev @vue/eslint-config-prettier` <br>
   `npm install --save-dev eslint` <br>
   `npm install --save-dev eslint-plugin-vue` <br>
   `npm install --save-dev prettier` <br>

13) `npm run lint` <br>

14) Install npm dependencies <br>
    `npm install` <br>
    `npm run dev` <br>
    `vite build` <br>
    `vite` <br>

15) Migrate Laravel <br>
    `docker exec php-app php artisan migrate`<br>
    `docker exec php-app php artisan migrate:rollback`<br>
    `docker exec php-app php artisan migrate` <br>

16) create seeders <br>
    `docker exec php-app php artisan make:seeder RoleSeeder` <br>
    `docker exec php-app php artisan make:seeder AdminSeeder` <br>
    `docker exec php-app php artisan db:seed` <br>

17) Create AdminController <br>
    `docker exec php-app php artisan make:controller Admin/AdminController` <br>

18) Create resource UserResource, RoleResource, PermissionResource <br>
    `docker exec php-app php artisan make:resource Admin/User/UserResource` <br>
    `docker exec php-app php artisan make:resource Admin/Role/RoleResource` <br>
    `docker exec php-app php artisan make:resource Admin/Permission/PermissionResource` <br>

19) Create resource controllers UserController,RoleController,PermissionController <br>
    `docker exec php-app php artisan make:controller Admin/User/UserController --resource` <br>
    `docker exec php-app php artisan make:controller Admin/Role/RoleController --resource` <br>
    `docker exec php-app php artisan make:controller Admin/Permission/PermissionController --resource` <br>

20) Create requests CreateRoleRequest, CreatePermissionRequest <br>
    `docker exec php-app php artisan make:request Admin/Role/CreateRoleRequest` <br>
    `docker exec php-app php artisan make:request Admin/Permission/CreatePermissionRequest` <br>

21) Install vue-multiselect <br>
    `npm install vue-multiselect@next` <br>

22) Create revoke controllers <br>
    `docker exec php-app php artisan make:controller Admin/Ivokable/RemovePermissionFromRoleController --invokable` <br>
    `docker exec php-app php artisan make:controller Admin/Ivokable/RemoveRoleFromUserController --invokable` <br>
    `docker exec php-app php artisan make:controller Admin/Ivokable/RemovePermissionFromUserController --invokable` <br>

23) Create resource UserSharedResource <br>
    `docker exec php-app php artisan make:resource Admin/User/UserSharedResource` <br>

24) Create model Avatar, AvatarController
    `docker exec php-app php artisan make:model Admin/User/Avatar -m` <br>
    `docker exec php-app php artisan migrate`<br>
    `docker exec php-app php artisan make:controller Admin/User/AvatarController` <br>

25) Create link Storage 
    `docker exec php-app php artisan storage:link`<br> 
    `docker exec php-app rm public/storage`<br>
    `docker exec php-app php artisan storage:link`<br>

26) Create model Rubric, migration, seed, RubricController, RubricResource
    `docker exec php-app php artisan make:model Admin/Rubric/Rubric -m` <br>
    `docker exec php-app php artisan migrate`<br>
    `docker exec php-app php artisan make:controller Admin/Rubric/RubricController --resource` <br>
    `docker exec php-app php artisan make:resource Admin/Rubric/RubricResource` <br>
    `docker exec php-app php artisan make:seeder Admin/Rubric/RubricSeeder` <br>
    `docker exec php-app php artisan db:seed --class=RubricSeeder` <br>
    `docker exec php-app php artisan make:request Admin/Rubric/CreateRubricRequest` <br>

27) Create model Article, migration, seed, ArticleController, ArticleResource
    `docker exec php-app php artisan make:model Admin/Article/Article -m` <br>
    `docker exec php-app php artisan migrate`<br>
    `docker exec php-app php artisan make:controller Admin/Article/ArticleController --resource` <br>
    `docker exec php-app php artisan make:resource Admin/Article/ArticleResource` <br>
    `docker exec php-app php artisan make:seeder Admin/Article/ArticleSeeder` <br>
    `docker exec php-app php artisan db:seed --class=ArticleSeeder` <br>
    `docker exec php-app php artisan make:request Admin/Article/CreateArticleRequest` <br>
    `docker exec php-app php artisan make:controller Admin/Ivokable/RemoveArticleFromRubricController --invokable` <br>


