<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::post("/register", [\App\Http\Controllers\AuthController::class, "register"])->name("register");
Route::post("/login", [\App\Http\Controllers\AuthController::class, "login"])->name("login");
Route::get("/user", [\App\Http\Controllers\UserController::class, "index"])->name("index");
//               CLIENTE
Route::get("/cliente", [\App\Http\Controllers\ClientesController::class, "index"]);
Route::post("/cliente", [\App\Http\Controllers\ClientesController::class, "store"]);
Route::get("/cliente/{id}", [\App\Http\Controllers\ClientesController::class, "show"]);
Route::post("/cliente/{id}", [\App\Http\Controllers\ClientesController::class, "update"]);
Route::delete("/cliente/{id}", [\App\Http\Controllers\ClientesController::class, "destroy"]);
//               PRODUCTO
Route::get("/producto", [\App\Http\Controllers\ProductosController::class, "index"]);
Route::post("/producto", [\App\Http\Controllers\ProductosController::class, "store"]);
Route::get("/producto/{id}", [\App\Http\Controllers\ProductosController::class, "show"]);
Route::post("/producto/{id}", [\App\Http\Controllers\ProductosController::class, "update"]);
Route::delete("/producto/{id}", [\App\Http\Controllers\ProductosController::class, "destroy"]);
//               PEDIDO
Route::get("/pedido", [\App\Http\Controllers\PedidosController::class, "index"]);
Route::post("/pedido", [\App\Http\Controllers\PedidosController::class, "store"]);
Route::get("/pedido/{id}", [\App\Http\Controllers\PedidosController::class, "show"]);
Route::post("/pedido/{id}", [\App\Http\Controllers\PedidosController::class, "update"]);
Route::delete("/pedido/{id}", [\App\Http\Controllers\PedidosController::class, "destroy"]);
//               FACTURA
Route::get("/factura", [\App\Http\Controllers\FacturaController::class, "index"]);
Route::post("/factura", [\App\Http\Controllers\FacturaController::class, "store"]);
Route::get("/factura/{id}", [\App\Http\Controllers\FacturaController::class, "show"]);
Route::post("/factura/{id}", [\App\Http\Controllers\FacturaController::class, "update"]);
Route::delete("/factura/{id}", [\App\Http\Controllers\FacturaController::class, "destroy"]);
//               RECETA
Route::get("/receta", [\App\Http\Controllers\RecetasController::class, "index"]);
Route::post("/receta", [\App\Http\Controllers\RecetasController::class, "store"]);
Route::get("/receta/{id}", [\App\Http\Controllers\RecetasController::class, "show"]);
Route::post("/receta/{id}", [\App\Http\Controllers\RecetasController::class, "update"]);
Route::delete("/receta/{id}", [\App\Http\Controllers\RecetasController::class, "destroy"]);
//               INGREDIENTE
Route::get("/ingrediente", [\App\Http\Controllers\IngredientesController::class, "index"]);
Route::post("/ingrediente", [\App\Http\Controllers\IngredientesController::class, "store"]);
Route::get("/ingrediente/{id}", [\App\Http\Controllers\IngredientesController::class, "show"]);
Route::post("/ingrediente/{id}", [\App\Http\Controllers\IngredientesController::class, "update"]);
Route::delete("/ingrediente/{id}", [\App\Http\Controllers\IngredientesController::class, "destroy"]);
//               CATEGORIA
Route::get("/categoria", [\App\Http\Controllers\CategoriaController::class, "index"]);
Route::post("/categoria", [\App\Http\Controllers\CategoriaController::class, "store"]);
Route::get("/categoria/{id}", [\App\Http\Controllers\CategoriaController::class, "show"]);
Route::post("/categoria/{id}", [\App\Http\Controllers\CategoriaController::class, "update"]);
Route::delete("/categoria/{id}", [\App\Http\Controllers\CategoriaController::class, "destroy"]);
//               STOCK PRODUCTO
Route::get("/stockproducto", [\App\Http\Controllers\StockProductoController::class, "index"]);
Route::post("/stockproducto", [\App\Http\Controllers\StockProductoController::class, "store"]);
Route::get("/stockproducto/{id}", [\App\Http\Controllers\StockProductoController::class, "show"]);
Route::post("/stockproducto/{id}", [\App\Http\Controllers\StockProductoController::class, "update"]);
Route::delete("/stockproducto/{id}", [\App\Http\Controllers\StockProductoController::class, "destroy"]);



