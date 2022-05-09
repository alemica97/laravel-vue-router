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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')    
    ->group(function (){
    Route::get('/home','HomeController@index')->name('home');

    Route::resource('posts','PostController');
});

// Creo una rotta di fallback che restiturà sempre la rotta indicata nel caso in cui 
// non dovesse trovare la rotta admin/...

route::get('{any}', function(){
    return view('guest.home');
})->where('any','.*');
