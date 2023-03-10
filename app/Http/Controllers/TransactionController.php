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

    public function index() {
        $transactions = Transactions::join('categorys', 'transactions.category_id', '=', 'categorys.id')
                                ->join('typecategorys', 'categorys.typeCategory_id', '=', 'typecategorys.id')
                                ->select('transactions.total', 'transactions.time', 'categorys.name_category', 'categorys.icon', 'typecategorys.type', 'typecategorys.name_typeCategory')
                                ->orderBy('transactions.id', 'DESC')
                                ->get();

        return response()->json([
            'status' => true,
            'message' => 'Transaction Query Successfully',
            'transactions' => $transactions
        ], 200);
    }
}
