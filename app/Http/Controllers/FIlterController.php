<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FIlterController extends Controller
{
    public function index(Request $request)
    {
        // return $request->all();
        // // Validate input
        // $request->validate([
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date|after:start_date',
        // ]);



        // Retrieve transactions between the specified dates
        $query = Transaction::with('transaction_type', 'khat');

        /* ------------------------------- for sector ------------------------------- */

        if ($request->khat_type_id) {
            $query = $query->where('khat_type_id', $request->khat_type_id);
        }
        /* ----------------------------- for transaction ---------------------------- */
        if ($request->transaction_types_id) {
            $query = $query->where('transaction_types_id', $request->transaction_types_id);
        }
        /* --------------------------- for date filtering --------------------------- */
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        if ($start_date && $end_date) {
            $startDate = Carbon::parse($start_date)->format("Y-m-d");
            $endDate = $end_date ? Carbon::parse($end_date)->format("Y-m-d") : Carbon::now();
            if ($startDate && $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }
        }
        $transactions = $query->get();

        // return $transactions;

        $income = $transactions->where('transaction_types_id', 1)->sum('amount');
        $expense = $transactions->where('transaction_types_id', 2)->sum('amount');
        $ballance = $income - $expense;
        $khat_types = DB::table('khat_types')->get();
        $transaction_types = DB::table('transaction_types')->get();


        return view('filterPage', [
            'transactions' => $transactions,
            'ballance' => $ballance,
            'income' => $income,
            'expense' => $expense,
            'khat_types' => $khat_types,
            'transaction_types' => $transaction_types,
        ]);
    }
}
