<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::name('accounts.')->group(function (){


    Route::get('/Accounts', function () {
        $users = User::with('designation')->get();

        return Inertia::render('Accounts/accounts',[
            'accounts' => $users
        ]);
    })->name('ListAccounts');

    Route::get('/Accounts/{User}/view', function (Request $request, User $User) {
        $User->load('designation');

        return Inertia::render('Accounts/SubPages/ViewAccount',[
            'account' => $User
        ]);

    })->name('ViewAccount');

    Route::get('/Accounts/create', function () {
        return Inertia::render('Accounts/SubPages/CreateAccount');
    })->name('CreateAccount');

    Route::get('/Accounts/{User}/edit', function (Request $request, User $User) {
        $User->load('designation');

        return Inertia::render('Accounts/SubPages/EditAccount',[
            'account' => $User
        ]);
    })->name('EditAccount');


    //actions
    Route::post('postUser',[UserController::class,'postUSer'])->name('postAccount');

    Route::post('putAccount/{User}',[UserController::class,'putAccount'])->name('putAccount');

    Route::put('putPassword/{User}',[UserController::class,'putPassword'])->name('putPassword');
});
