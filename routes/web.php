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


/* Se genera auomaticamente al instalar ui:auth al igual que la ruta /home */
/* ['verify' => true] con esto indicamos que debe validar el correo de verificación */
Auth::routes(['verify' => true]);

/* Rutas NO asociadas a Controladores */
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::group(['middleware' => ['auth','verified']], function() { // Dentro de [] se agregan los middlewares que queramos utilizar.
    Route::get('/proyectos', 'ProyectoController@index')->name('proyectos.index');
    Route::get('/proyectos/nuevo', 'ProyectoController@create')->name('proyectos.create');
    Route::post('/proyectos', 'ProyectoController@store')->name('proyectos.store');
    // Route::post('/proyectos', 'ProyectoController@store')->middleware('auth')->name('proyectos.store'); /* Así se agregaría el middleware auth si no existiera una agrupación */
});




/* Rutas asociadas a Controladores */
// Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.index');
// Route::post('/usuarios', 'UsuarioController@create')->name('usuarios.create'); /* Crear Usuario */
// Route::get('/usuarios/{usuario}', 'UsuarioController@show')->name('usuarios.show'); /* Obtener usuario especifico */
// Route::put('/usuarios/{usuario}', 'UsuarioController@update')->name('usuarios.update'); /* Actualizar un usuario */
// Route::delete('/usuarios/{usuario}', 'UsuarioController@destroy')->name('usuarios.destroy'); /* Eliminar un usuario */

/* el método group() nos ayuda para agrupar rutas */
// Route::group(function() {
    // Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.index');
    // Route::post('/usuarios', 'UsuarioController@store')->name('usuarios.create'); /* Crear Usuario */
    // Route::get('/usuarios/{usuario}', 'UsuarioController@show')->name('usuarios.show'); /* Obtener usuario especifico */
    // Route::put('/usuarios/{usuario}', 'UsuarioController@update')->name('usuarios.update'); /* Actualizar un usuario */
    // Route::delete('/usuarios/{usuario}', 'UsuarioController@destroy')->name('usuarios.destroy'); /* Eliminar un usuario */
// });

/* Prefijos sirven para evitar tener que escribir algo tantas veces, en este ejemplo la palabra usuarios que van. Los prefijos son opcionales pero si no los utilizamos tendriamos que pasar la variable {usuario} en cada ruta */
// Route::prefix('usuarios')->group(function() {
//     Route::get('/', 'UsuarioController@index');
//     Route::post('/', 'UsuarioController@store'); /* Crear Usuario */
//     Route::get('/{usuario}', 'UsuarioController@show'); /* Obtener usuario especifico */
//     Route::put('/{usuario}', 'UsuarioController@update'); /* Actualizar un usuario */
//     Route::delete('/{usuario}', 'UsuarioController@destroy'); /* Eliminar un usuario */
// });

/*
    - Ruta resources: Aqui no es necesario agregar el tipo de peticion http ni enlazarla a un metodo especifico, al ser resource conforme se mande a llamar se asignara al metodo correspondiente.
    - Lo malo de utilizar este tipo de rutas es que Laravel no asigna bien unos nombres (Ejemplo: Cotizaciones lo deja como Cotizacione. Esto sucede más que nada cuando dejamos los nombres en español).
*/
// Route::resource('cliente', ClienteController::class);
