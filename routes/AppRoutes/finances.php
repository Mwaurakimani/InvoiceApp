<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::name('finances.')->group(function () {
    Route::get('/Finances', function () {
        $accounts = DB::select('select t.id,
                           m.transaction_type,
                           amount,description,
                           m.created_at
                    from model_transactions m join transactions t on t.id = m.transaction_id');

        $count = 0;
        $totalRevenue =collect($accounts)->reduce(function ($count,$item ){
            if ($item->transaction_type == 'revenue'){
                return $item->amount + $count;
            }

            return  $count;
        });

        $count = 0;
        $totalExpenses =collect($accounts)->reduce(function ($count,$item ){
            if ($item->transaction_type == 'expense'){
                return $item->amount + $count;
            }

            return  $count;

        });


        $balance = $totalRevenue - $totalExpenses;

        return Inertia::render('Finances/finances',[
            'summary'=>[
                'revenue' => $totalRevenue,
                'expense' =>$totalExpenses,
                'balance' =>$balance
            ],
            'accounts' => $accounts
        ]);
    })->name('Finances');


    Route::post('payBooking', [TransactionController::class, 'payBooking'])->name('payBooking');

    Route::post('fuelVehicle', [TransactionController::class, 'fuelVehicle'])->name('fuelVehicle');

    Route::post('payDriver', [TransactionController::class, 'payDriver'])->name('payDriver');
});
