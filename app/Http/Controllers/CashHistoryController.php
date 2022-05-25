<?php

namespace App\Http\Controllers;

use App\Models\CashHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class CashHistoryController extends Controller
{
    //
    // index
    public function index()
    {
        $transactions = CashHistory::all();
//        dd($transactions);
        foreach ($transactions as $transaction) {
            if($transaction->type === 'recette'){
                $transaction->transaction_amount = '+'.$transaction->transaction_amount;
            }else $transaction->transaction_amount = '-'.$transaction->transaction_amount;
        }


        return view('dashboard', compact('transactions'));
    }

    // store transaction
    public function store()
    {
        request()->validate([
            'montant' => 'required',
            'caisse' => 'required',
            'date' => 'required',
            'libelle' => 'required',
        ]);

        $transaction = new CashHistory();
        $transaction->transaction_amount = request('montant');
        $transaction->type = request('caisse');
        $transaction->label = request('libelle');
        $transaction->date = request('date');
        $transaction->save();

        return redirect()->back()->with('message', 'Transaction ajoutée avec succès');
    }

    // edit cash history
    public function edit($id)
    {
        $transaction = CashHistory::find($id);
        return view('editCash', compact('transaction'));
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(CashHistory $cashHistory)
    {
        request()->validate([
            'montant' => 'required',
            'caisse' => 'required',
            'date' => 'required',
            'libelle' => 'required',
        ]);

        $last_transaction = CashHistory::orderBy('id', 'desc')->first();
        $balance = $last_transaction->balance;
        if(request('caisse') === 'depense' && $balance < request('montant')){
            return redirect()->back()->withErrors(['Le montant est supérieur au solde de la caisse']);

        }

        $balance = (request('caisse') === 'depense') ? $balance - request('montant') : $balance + request('montant');

        $fields = [
            'transaction_amount' => request('montant'),
            'date' => request('date'),
            'label' => request('libelle'),
            'type' => request('caisse'),
            'balance' => $balance,
        ];

        $cashHistory->update($fields);
        return redirect()->route('index')->with('message', 'Transaction modifiée avec succès');
    }

}
