<?php

namespace App\Http\Controllers;

use App\Models\ModelTransaction;
use App\Models\Transaction;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function payBooking(Request $request)
    {
        $validatedData = $request->validate([
            "bookingId" => ['required', Rule::exists('bookings', 'id')],
            "amount" => ['required', 'numeric', 'min:0', 'max:2000000'],
            "paidVia" => ['required', 'string', 'max:190'],
            "referenceType" => ['required', 'string', 'max:190'],
            "reference" => ['required', 'string', 'max:190'],
            "description" => ['required', 'string', 'max:190'],
        ]);

        DB::beginTransaction();

        try {
            $transaction = new Transaction;

            $transaction->amount = $validatedData['amount'];
            $transaction->paidVia = $validatedData['paidVia'];
            $transaction->referenceType = $validatedData['referenceType'];
            $transaction->reference = $validatedData['reference'];
            $transaction->description = $validatedData['description'];

            $transaction->save();

            $model_transaction = new ModelTransaction();

            $model_transaction->model_type = "Booking";
            $model_transaction->transaction_type = "revenue";
            $model_transaction->model_id = $validatedData['bookingId'];
            $model_transaction->transaction_id = $transaction->id;

            $model_transaction->save();

            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();

        }

        return redirect()->back();
    }

    public function fuelVehicle(Request $request)
    {
        $validatedData = $request->validate([
            "regNo" => ['required', Rule::exists('vehicles', 'id')],
            "amount" => ['required', 'numeric', 'min:0', 'max:2000000'],
            "paidVia" => ['required', 'string', 'max:190'],
            "referenceType" => ['required', 'string', 'max:190'],
            "reference" => ['required', 'string', 'max:190'],
            "description" => ['required', 'string', 'max:190'],
        ]);

        DB::beginTransaction();

        try {
            $transaction = new Transaction;

            $transaction->amount = $validatedData['amount'];
            $transaction->paidVia = $validatedData['paidVia'];
            $transaction->referenceType = $validatedData['referenceType'];
            $transaction->reference = $validatedData['reference'];
            $transaction->description = $validatedData['description'];

            $transaction->save();

            $model_transaction = new ModelTransaction();

            $model_transaction->model_type = "Vehicle";
            $model_transaction->transaction_type = "expense";
            $model_transaction->model_id = $validatedData['regNo'];
            $model_transaction->transaction_id = $transaction->id;

            $model_transaction->save();

            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();

        }

        return redirect()->back();
    }
    public function payDriver(Request $request)
    {
        $validatedData = $request->validate([
            "driverID" => ['required', Rule::exists('users', 'id')],
            "amount" => ['required', 'numeric', 'min:0', 'max:2000000'],
            "paidVia" => ['required', 'string', 'max:190'],
            "referenceType" => ['required', 'string', 'max:190'],
            "reference" => ['required', 'string', 'max:190'],
            "description" => ['required', 'string', 'max:190'],
        ]);

        DB::beginTransaction();

        try {
            $transaction = new Transaction;

            $transaction->amount = $validatedData['amount'];
            $transaction->paidVia = $validatedData['paidVia'];
            $transaction->referenceType = $validatedData['referenceType'];
            $transaction->reference = $validatedData['reference'];
            $transaction->description = $validatedData['description'];

            $transaction->save();

            $model_transaction = new ModelTransaction();

            $model_transaction->model_type = "User";
            $model_transaction->transaction_type = "expense";
            $model_transaction->model_id = $validatedData['driverID'];
            $model_transaction->transaction_id = $transaction->id;

            $model_transaction->save();

            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();

        }

        return redirect()->back();
    }


}
