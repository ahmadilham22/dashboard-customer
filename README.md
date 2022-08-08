# Kazee Inventory

## Configuration Project

-   Clone repository
-   Masuk directory project
-   run -> `cp .env.example .env`
-   run -> `php artisan key:generate`
-   Sesuaikan settingan database
-   run -> `composer install`
-   run -> `php artisan migrate`
-   run -> `php artisan db:seed`

## UserDefault

-   email : `demo@kazee.inventory`
-   password : `secret123`

## Making Resources (CRUD)

-   run : `php artisan make:model Models/NamaModel -mrc`
    (it will make 3 file: migration, model, controller)
-   adjust field requirements in migration file
-   run -> `php artisan migrate`
-   Add routes in file web.php : Route::resource(Url,NamaController);

    #### Example:

    `php artisan make:model Models/AssetSoftware -mrc`

          Route::resource('software','AssetSoftwareController');
