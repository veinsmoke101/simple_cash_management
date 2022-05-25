<?php

namespace App\Http\Controllers;

use App\Models\CashHistory;
use Illuminate\Http\Request;
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


}
