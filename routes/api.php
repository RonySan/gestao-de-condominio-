<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\http\controllers\BilletsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DocController;
use App\http\Controllers\FoundAndLostController;
use App\Http\Controllers\ReservationsController;
use App\http\Controllers\UnitsController;
use App\Http\Controllers\UsersController;
use App\http\Controllers\WallController;
use App\Http\Controllers\WarnigController;
use App\Models\warnig;

Route::get('/ping', function(){

    return ['pong' => true];
});

Route::get('/Erro401', [AuthController::class, 'NãoAltorizado'])->name('Login');

Route::post('/auth/login',[AuthController::class,'login']);
Route::post('/auth/register',[AuthController::class,'register']);

        // Area de Login

Route::middleware('auth:api')->group(function(){
    Route::post('/auth/validente', [AuthController::class,'validenteToken']);
    Route::post('auth/logout', [AuthController::class,'logout']);

        // Area de Mural de Avisos

    Route::get('/walls', [WallController::class,'getWall']);
    Route::post('/walls/{id}/like',[WallController::class,'like']);

        // Area de Documentos
    Route::get('/docs',[DocController::class,'getAll']);

        // Livros de Ocorrencias
    Route::get('/warning',[WarnigController::class,'getMyWarnings']);
    Route::post('/warning',[WarnigController::class,'setWarning']);
    Route::post('/warning',[WarnigController::class,'addWarning']);

        // boletos
    Route::get('/billets',[BilletsController::class,'getAll']);

        //achados e perdidos
        // ver todas os achados e pardidos
    Route::get('/fondandlosts',[FoundAndLostController::class,'getAll']);
        // inserrir uma achado e perdido
    Route::Post('/fondandlosts',[FoundAndLostController::class,'inset']);
        // atualizar um achado ou perdidpo
    Route::put('fondandlosts',[FoundAndLostController::class,'update']);

    // unidades
    //adicionar
    Route::get('/unit/{id}',[UnitsController::class,'getInfo']);
    Route::post('/unit/{id}/addPerson',[UnitsController::class,'addPerson']);
    Route::post('/unit/{id}/addVehicle',[UnitsController::class,'addVehicle']);
    Route::post('/unit/{id}/addpets',[UnitsController::class,'addPets']);
    // remover
    Route::post('/units/{id}/removerPerson',[UnitsController::class,'removerperson']);
    Route::post('/units{id}/removerVehicle',[unitsController::class,'removerVehicle']);
    Route::post('/units/{id}/removerPets',[UnitsController::class,'removerPets']);

    // reservas
    Route::get('/reservantion',[ReservationsController::class, 'getReservations']);
    Route::post('/reservantion/{id}',[ReservationsController::class, 'setReservations']);

    Route::get('/reservantion/{id}/disableddates',[ReservationsController::class,'getDisable']);
    Route::get('/reservantions/{id}/times',[ReservationsController::class,'getTimes']);

    Route::get('/myreservantion',[ReservationsController::class,'getMyReservantion']);
    Route::delete('/myreservantion/{id}',[ReservationsController::class,'delMyReservation']);
});
