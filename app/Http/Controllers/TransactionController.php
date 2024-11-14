<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TransactionController extends Controller
{

    public function index()
    {
        $transactionsList = Transactions::all();

        return view('transactions/list', compact('transactionsList'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }

    public function filter(Request $request)
    {
        $transactions = Transactions::filterBy(
            $request->type,
            $request->montant,
            $request->date,
            $request->artisanId,
            $request->paiementId,
            $request->comptesequestreId
        );

        return view('transactions.list', compact('transactions'));
    }
}
