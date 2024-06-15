<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Test\TuControlador;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/writeme', function () {
    return 'Contact';
});
Route::get('/contact', function () {
    $name = "rudy";
    return view('contact',['name'=>$name]);
})->name('contact');

Route::get('/contact2', function () {
    return view('contact2');
})->name('contact2');

Route::get('/custom', function () {
    $msj2 ="Bienvenido";
    $data= ['msj2' => $msj2, "age" =>15];
    return view('custom',$data);
});

Route::get('test', [TuControlador::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
