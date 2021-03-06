<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateController;
use App\Http\Livewire\SupervisorLivewire;
use App\Http\Livewire\CoordinatorLivewire;
use App\Http\Livewire\LiderLivewire;
use App\Http\Livewire\VoterLivewire;
use App\Http\Livewire\VoterFieldLivewire;
use App\Http\Controllers\ListController;

use Illuminate\Support\Facades\DB;
use App\Models\Censo;
use App\Models\Coordinator;
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
Route::middleware(['auth:sanctum','verified'])->get('/voters-field', VoterFieldLivewire::class)->name('voters.field');
Route::middleware(['auth:sanctum','verified'])->get('/reports', function(){
    return response('reports.main');
})->name('reports.main');


//DROPDOWN STATE AND CITIES
Route::get('state/{state}/cities', [StateController::class, 'getCities'])->name('getCities');

//Route::group(['middleware'])

Route::get('/listados', [ListController::class, 'index'])->name('listados.index');
Route::post('/listados', [ListController::class, 'income'])->name('listados.income');
Route::get('/listado-coordinadores', [ListController::class, 'coordinators'])->name('listados.coordinators');
Route::get('/listado-puestos', [ListController::class, 'places'])->name('listados.places');
Route::get('/listado/{id}/votantes', [ListController::class, 'voters'])->name('listados.voters');
Route::get('/listado/{place}/puestos', [ListController::class, 'placers'])->name('listados.placers');
Route::get('/listado/{place}/mesas', [ListController::class, 'tables'])->name('listados.tables');

Route::get('/votaciones', [ListController::class, 'votation'])->name('votaciones.index');
Route::get('/votaciones/registro', [ListController::class, 'registro'])->name('votaciones.registro');
Route::get('/votaciones/consulta', [ListController::class, 'consulta'])->name('votaciones.consulta');
Route::post('/votaciones/consulta', [ListController::class, 'consultaDni'])->name('votaciones.consultaDni');
Route::post('/votaciones/registro', [ListController::class, 'registroDni'])->name('votaciones.registroDni');

Route::middleware(['auth:sanctum', 'verified'])->get('/votations', function () {

    $censos = DB::table('censos')
                    ->join('voter01s',DB::raw('trim(voter01s.place)'),'=',DB::raw('trim(censos.place)'))
                    ->select(DB::raw('count(*) as cantidad, censos.place as puesto'))
                    ->where('voter01s.guide','=',true)
                    ->groupBy('censos.place')
                    ->orderBy('cantidad','desc')
                    ->get();
    return view('lists.votations', compact('censos'));
})->name('votations.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/coordinator-count', function () {
    $coordinators = Coordinator::all();

    $voters = DB::table('coordinators as c')
                    ->join('voter01s as v',DB::raw('v.coordinator_dni'),'=',DB::raw('c.dni'))
                    ->select(DB::raw('count(*) as cantidad, c.dni as cedula'))
                    ->where('v.guide','=',true)
                    ->groupBy('c.dni')
                    ->orderBy('cantidad','desc')
                    ->get();

    return view('lists.votations-coor', compact('voters','coordinators'));
})->name('coordinators.count');