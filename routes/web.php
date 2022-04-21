<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\TestController@welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//MIDDLEWARE PARA ADMINISTRADORES
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){
	//PRODUCTOS
	Route::get('/products', 'App\Http\Controllers\ProductController@index'); //Listado
	Route::get('/products/create', 'App\Http\Controllers\ProductController@create'); //Formulario
	Route::post('/products', 'App\Http\Controllers\ProductController@store'); //Registrar
	Route::get('/products/{id}/edit', 'App\Http\Controllers\ProductController@edit'); //formulario de edicion
	Route::post('/products/{id}/edit', 'App\Http\Controllers\ProductController@update'); //Actualizar
	Route::delete('/products/{id}', 'App\Http\Controllers\ProductController@destroy'); //eliminar

	//IMAGENES
	Route::get('/products/{id}/images', 'App\Http\Controllers\ImageController@index');
	Route::post('/products/{id}/images', 'App\Http\Controllers\ImageController@store');
	Route::delete('/products/{id}/images', 'App\Http\Controllers\ImageController@destroy');
	Route::get('/products/{id}/images/select/{image}', 'App\Http\Controllers\ImageController@select');//destacar

	//USUARIOS
	Route::get('/users', 'App\Http\Controllers\UserController@index');
	Route::get('/users/{id}/edit', 'App\Http\Controllers\UserController@edit');
	Route::post('/users/{id}/edit', 'App\Http\Controllers\UserController@update');
	Route::delete('/users/{id}', 'App\Http\Controllers\UserController@destroy');

	//HORARIOS
	Route::get('/horario', 'App\Http\Controllers\sucursalController@index');
	Route::get('/horario/{id}/edit', 'App\Http\Controllers\sucursalController@edit');
	Route::post('/horario/{id}/edit', 'App\Http\Controllers\sucursalController@update');
	Route::delete('/horario/{id}', 'App\Http\Controllers\sucursalController@destroy');

	//CATEGORIAS
	Route::get('/categoria', 'App\Http\Controllers\categoriaController@index');
	Route::get('/categoria/create', 'App\Http\Controllers\categoriaController@create');
	Route::post('/categoria', 'App\Http\Controllers\categoriaController@store');
	Route::get('/categoria/{id}/edit', 'App\Http\Controllers\categoriaController@edit');
	Route::post('/categoria/{id}/edit', 'App\Http\Controllers\categoriaController@update');
	Route::delete('/categoria/{id}', 'App\Http\Controllers\categoriaController@destroy');

	//GRUPOS DE TOPPINGS
	Route::get('/grupo', 'App\Http\Controllers\gruposController@index');
	Route::get('/grupo/create', 'App\Http\Controllers\gruposController@create');
	Route::post('/grupo', 'App\Http\Controllers\gruposController@store');
	Route::get('grupo/{id}/show', 'App\Http\Controllers\gruposController@show');
	Route::get('/grupo/{id}/edit', 'App\Http\Controllers\gruposController@edit');
	Route::post('/grupo/{id}/edit', 'App\Http\Controllers\gruposController@update');
	Route::delete('/grupo/{id}', 'App\Http\Controllers\gruposController@destroy');

	//AGREGAR TOPPING A UNA LISTA
	Route::get('/combinaciones/create', 'App\Http\Controllers\gruposController@createTop');
	Route::post('/combinaciones', 'App\Http\Controllers\gruposController@storeTop');
});

Route::get('products/{id}/show', 'App\Http\Controllers\ProductController@show');//Mostrar
Route::post('cart/', 'App\Http\Controllers\CartDetailController@store');
Route::delete('cart/', 'App\Http\Controllers\CartDetailController@destroy');

Route::post('order/', 'App\Http\Controllers\CartCOntroller@update');

Route::post('pedido/', 'App\Http\Controllers\CartCOntroller@pedido');


//CATALOGO
Route::get('/birria', [App\Http\Controllers\catalogoController::class, 'index'])->name('birria');

Route::get('/tacos', [App\Http\Controllers\catalogoController::class, 'indexTacos'])->name('tacos');

Route::get('/combos', [App\Http\Controllers\catalogoController::class, 'indexCombos'])->name('combos');

Route::get('/bebidas', [App\Http\Controllers\catalogoController::class, 'indexBebidas'])->name('bebidas');

Route::get('/ALaPlancha', [App\Http\Controllers\catalogoController::class, 'indexPlancha'])->name('plancha');

Route::get('/Sucursal', [App\Http\Controllers\sucursalController::class, 'indexSucursal'])->name('sucursal');
