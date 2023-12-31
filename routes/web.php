<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

    return Inertia::render('Welcome', [
    ]);
})->name('homePage')->middleware(['guest']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard/Dashboard');
    })->name('dashboard');

    include "AppRoutes/index.php";
});

Route::get('/action',function (){
    $Dess = collect(['Administrator','Moderator','Driver','Client']);

    $Dess->map(function ($item){
        $des = new \App\Models\Designation();

        $des->name = $item;
        $des->save();
    });

});
