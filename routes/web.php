<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
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

Route::get('/', [ProductController::class, 'index'])->name('product.index'); //главная страница

Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show'); //Детальная страница товара
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit'); //Страница редактирования
Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update'); //Отправить изменения
Route::get('/create', [ProductController::class, 'create'])->name('product.create'); //Страница создания
Route::post('/store', [ProductController::class, 'store'])->name('product.store'); //Сохранение
Route::post('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy'); // Удаление

Route::group(
    ['prefix' => 'purchases'],
    function () {
        Route::get('/', [PurchaseController::class, 'index'])->name('purchase.index'); //список заказов
        Route::get('/edit/{id}', [PurchaseController::class, 'edit'])->name('purchase.edit'); //Страница редактирования
        Route::post('/update/{id}', [PurchaseController::class, 'update'])->name('purchase.update'); //Отправить изменения
        Route::get('/show/{id}', [PurchaseController::class, 'show'])->name('purchase.show'); //Детальная страница заказа
        Route::post('/store', [PurchaseController::class, 'store'])->name('purchase.store'); //Сохранение
        Route::post('/destroy/{id}', [PurchaseController::class, 'destroy'])->name('purchase.destroy'); // Удаление
        Route::post('/switchStatus/{id}', [PurchaseController::class, 'switchStatus'])->name('purchase.switchStatus'); //Изменить статус
    }
);
