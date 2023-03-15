<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transactions;
use App\Models\Category;
use App\Models\TypeCategory;



class TransactionController extends Controller
{
    public function create(Request $request) {

        $transaction = Transactions::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Transaction Created Successfully'
        ], 200);

    } 
 
    public function index(Request $request) {

        $user = $request->user();

        $transactions = Transactions::join('categorys', 'transactions.category_id', '=', 'categorys.id')
                                ->join('typecategorys', 'categorys.typeCategory_id', '=', 'typecategorys.id')
                                ->where('transactions.user_id', $user->id)
                                ->select('transactions.id as id_transaction', 'transactions.total', 'transactions.time', 'categorys.name_category', 
                                'categorys.icon', 'typecategorys.type', 'typecategorys.name_typeCategory',
                                'categorys.id as id_category', 'transactions.note', 'transactions.location', 'transactions.withPerson')
                                ->orderBy('transactions.id', 'DESC')
                                ->get();

        return response()->json([
            'status' => true,
            'message' => 'Transaction Query Successfully',
            'transactions' => $transactions
        ], 200);
    }

    public function update($id, Request $request) {
        $transaction = Transactions::findOrFail($id);
        $transaction->update($request->all());
        $transaction->save();

        return response()->json([
            'status' => true,
            'message' => 'Update Transaction Successfully',
            'transaction' => $transaction
        ], 200);
    }

    public function destroy($id) {
        $transaction = Transactions::findOrFail($id);
        $transaction->delete();

        return response()->json([
            'status' => true,
            'message' => 'Delete Transaction Successfully'
        ], 200);
    }
}
