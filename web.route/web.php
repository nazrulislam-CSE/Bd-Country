<?php

use Illuminate\Support\Facades\Route;
//======= Use A Frontend Controller =======*/
use App\Http\Controllers\Frontend\CheckoutController;



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
/*================== Frontend All Route ==============*/
Route::get('/', [FrontendController::class, 'index'])->name('home');


/*================   START DIVISION WITH DISTRICT/UPAZILA/UNION ROUTE   ==================*/
Route::get('/division-district/ajax/{division_id}',[CheckoutController::class,'getdivision'])->name('division.ajax');
Route::get('/district-upazilla/ajax/{district_id}',[CheckoutController::class,'getupazilla'])->name('upazilla.ajax');       
Route::get('/upazilla-union/ajax/{upazilla_id}',[CheckoutController::class,'getunion'])->name('union.ajax');       
/*================   END DIVISION WITH DISTRICT/UPAZILA/UNION ROUTE   ==================*/


require __DIR__.'/auth.php';