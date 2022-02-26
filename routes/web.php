<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateController;
use App\Http\Livewire\SupervisorLivewire;
use App\Http\Livewire\CoordinatorLivewire;
use App\Http\Livewire\LiderLivewire;
use App\Http\Livewire\VoterLivewire;
use App\Http\Controllers\ListController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum','verified'])->get('/supervisors', SupervisorLivewire::class)->name('supervisors.main');
Route::middleware(['auth:sanctum','verified'])->get('/coordinators', CoordinatorLivewire::class)->name('coordinators.main');
Route::middleware(['auth:sanctum','verified'])->get('/liders', LiderLivewire::class)->name('liders.main');
Route::middleware(['auth:sanctum','verified'])->get('/voters', VoterLivewire::class)->name('voters.main');
Route::middleware(['auth:sanctum','verified'])->get('/reports', function(){
    return response('reports.main');
})->name('reports.main');


//DROPDOWN STATE AND CITIES
Route::get('state/{state}/cities', [StateController::class, 'getCities'])->name('getCities');

//Route::group(['middleware'])

Route::get('/listados', [ListController::class, 'index'])->name('listados.index');
Route::post('/listados', [ListController::class, 'income'])->name('listados.income');

