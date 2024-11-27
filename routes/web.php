<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/{locale}/welcome/', function ($locale) {
//     App::setLocale($locale);
//     return view('welcome');
// });


// routes/web.php

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    // 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', function()
    {
        return View::make('hello');
    });

    Route::get('test',function(){
        return View::make('test');
    });


    // http://localhost:8000/article/{id}
    // http://localhost:8000/bai-viet/{id}
    Route::get(LaravelLocalization::transRoute('routes.article'),function(){
          return View::make('article');
    });
});



// getLocalizedURL(), getURLFromRouteNameTranslated()

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/
