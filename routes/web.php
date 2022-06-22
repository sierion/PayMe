<?php

use Illuminate\Support\Facades\Route;
use App\Models\Currencie;
use App\Models\Sale;
use App\Http\Controllers\SaleController;

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
    return view('pay', ['currencies' => Currencie::all()]);
})->name('pay');

Route::get('sales', function () {
    return view('sales', ['sales' => Sale::all()]);
})->name('sales');

Route::post('/', [SaleController::class, 'send']);
