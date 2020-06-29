<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('backoffice.template');
});

//CRUD de productos
Route::resource('/backoffice/productos','backoffice\ProductosController');
//Imágenes de los productos
Route::get('/backoffice/imagenes/{id}','backoffice\ImagenesController@ver')->name('imagenes');