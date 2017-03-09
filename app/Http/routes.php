
<?php

    // ===============================================
    // STATIC PAGES ==================================
    // ===============================================

    // show a static view for the home page (app/views/home.blade.php)
Route::get('/',[
    'uses' => 'ProductsController@index'
]);

    // about page (app/views/welcome.blade.php)
  