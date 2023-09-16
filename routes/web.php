<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SmsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['guest']], function () {
    Route::get('products', [ProductController::class, 'index']);
});

// Protected routes, only for authorized users
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resources([
        'products' => ProductController::class,
        'contact' => ContactController::class,
        'image' => ImageController::class,
        'about' => AboutController::class,
        'info' => InfoController::class,
        'slide' => SlideController::class,
        'partner' => PartnerController::class,
        'sms' => SmsController::class,
        'clients' => ClientController::class,
    ]);

    Route::post('importClients',[ClientController::class, 'importClients'])->name('import.clients');
    Route::post('download/clients/file',[ClientController::class, 'downloadClientsForm'])
        ->name('download.clients.form');
});

Route::get('/', function () {
    return redirect('admin');
});
Route::get('/home', function (){
    return redirect('admin');
});
Route::get('/admin', function () {
    return redirect('admin');
});


Auth::routes();


//Route::get('/home/{locale}', [HomeController::class. 'index'])->name('home');
Route::get('/catalog/{locale}', [HomeController::class. 'catalog'])->name('catalog');
Route::get('/about/{locale}', [HomeController::class. 'about'])->name('about');
Route::get('/contact/{locale}', [HomeController::class. 'contact'])->name('contact');


Route::get('createTranslate', [HomeController::class. 'createTranslate'])->name('createTranslate');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
});

