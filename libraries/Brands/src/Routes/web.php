<?php
use Illuminate\Support\Facades\Route;

use App\Modules\Brands\Middlewares\CheckAdmin;
use App\Modules\Brands\Controllers\BrandsController;

Route::prefix('manager')->middleware([CheckAdmin::class])->group(function() {
    Route::get('/', function (){return redirect('/');})->name('manager');

    Route::prefix('brands')->middleware([CheckAdmin::class])->namespace('App\Modules\Brands\Controllers')->group(function(){
        Route::match(['GET','POST'],'/',[BrandsController::class, 'index'] )->name('manager.brands');
        Route::get('/add/',[BrandsController::class, 'create'])->name('manager.brands.add');
        Route::post('/add/',[BrandsController::class, 'store'])->name('manager.brands.store');
        Route::get('/edit/{id}',[BrandsController::class, 'show'])->name('manager.brands.show');
        Route::post('/edit/{id}',[BrandsController::class, 'update'])->name('manager.brands.update');
        Route::post('/delete/{id}',[BrandsController::class, 'destroy'])->name('manager.brands.destroy');
    });

});
