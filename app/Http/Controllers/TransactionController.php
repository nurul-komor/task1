<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Transaction::with('transaction_type', 'khat');
        $transactions = $query->get();
        $income = $transactions->where('transaction_types_id', 1)->sum('amount');
        $expense = $transactions->where('transaction_types_id', 2)->sum('amount');
        $ballance = $income - $expense;
        $khat_types = DB::table('khat_types')->get();
        $transaction_types = DB::table('transaction_types')->get();
        return view('welcome', [
            'transactions' => $transactions,
            'ballance' => $ballance,
            'income' => $income,
            'expense' => $expense,
            'khat_types' => $khat_types,
            'transaction_types' => $transaction_types,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $khat_types = DB::table('khat_types')->get();
        $transaction_types = DB::table('transaction_types')->get();
        return view('create', [
            'khat_types' => $khat_types,
            'transaction_types' => $transaction_types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTransactionRequest $request)
    {
        // return $request->validated();
        Transaction::create([
            'amount' => $request->amount,
            'transaction_types_id' => $request->transaction_type,
            'khat_type_id' => $request->khat_name,
        ]);
        session()->flash('message', 'The specified resource created successfully');
        return redirect()->route('reports.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($transaction)
    {
        $transaction = Transaction::find($transaction);
        $khat_types = DB::table('khat_types')->get();
        $transaction_types = DB::table('transaction_types')->get();
        return view('update', [
            'transaction' => $transaction,
            'khat_types' => $khat_types,
            'transaction_types' => $transaction_types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $transaction)
    {

        Transaction::find($transaction)->update([
            'amount' => $request->amount,
            'transaction_types_id' => $request->transaction_type,
            'khat_type_id' => $request->khat_name,
        ]);
        session()->flash('message', 'The specified resource updated successfully');
        return redirect()->route('reports.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        session()->flash('message', 'The specified resource deleted successfully');
        return redirect()->route('reports.index');
    }
}
