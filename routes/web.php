<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Dashboard\SaleController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\ShipingrateController;

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



Route::get('productDetails/{id}', [ProductController::class, 'details'])->name('product.details');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

        // Auth::routes();
        Route::get('/', function () {
            return view('auth.login');
        });
        Auth::routes(['register'=>false]);
        
        Route::group(['middleware' => 'auth'], function()
        {
        
             // Index
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);

            //  Product
            Route::resource('products',ProductController::class);
            
            // Shiping Rate
            Route::resource('shipingrate',ShipingrateController::class);

            // Invoices 
            Route::resource('sales',SaleController::class);
            Route::get('/sale/create',[SaleController::class,'create']);
            Route::get('details/fetch', [SaleController::class, 'fetchDetails'])->name('details.fetch');
            Route::get('details/fetchLast', [SaleController::class, 'fetchLastDetails'])->name('details.fetchLast');
            Route::post('details/store', [SaleController::class, 'storeDetails'])->name('details.store');
            Route::delete('/admin/details/destroy/{id}', [SaleController::class, 'destroyDetails'])->name('details.destroy');
            // Theam Route Page
            Route::get('/{page}', [AdminController::class,'index']);
        

        });
    
       
});




  



        
