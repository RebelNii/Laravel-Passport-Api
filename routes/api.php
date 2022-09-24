<?php

use App\Http\Controllers\ProductsController;
use App\Models\products;
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

/*
Route::get('/products', [ProductsController::class, 'index']);

Route::get('/products/search/{name}',[ProductsController::class, 'find']);

Route::get('/products/{products}', [ProductsController::class, 'search']);

Route::post('/products', [ProductsController::class, 'store']);

Route::put('/products/{id}',[ProductsController::class, 'update']);

Route::delete('/products/{products}',[ProductsController::class, 'destroy']);*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:api')->prefix('v1')->group(function(){
    Route::get('/user',function(Request $request){
        return $request->user();
    });

    Route::get('/products',[ProductsController::class,'index']);

    //get a single product
    Route::get('/product/{product}',[ProductsController::class,'get']);
    //create new product
    Route::post('/products/create',[ProductsController::class,'store']);

    Route::put('/products/{product}',[ProductsController::class,'update']);
    //delete product
    Route::delete('/products/{product}',[ProductsController::class,'destroy']);
    //search product
    Route::get('/products/search/{name}',[ProductsController::class,'search']);
});


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function(Request $request){
    return 'Hello';
});*/