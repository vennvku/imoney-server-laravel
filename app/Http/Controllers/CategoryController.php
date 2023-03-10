<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\TypeCategory;

use DB;

class CategoryController extends Controller
{
    public function index() {
        $typeCategorys = TypeCategory::orderBy('type', 'DESC')->get();
        $categorys = Category::all();

        return response()->json([
            'status' => true,
            'typeCategorys' => $typeCategorys,
            'categorys' => $categorys
        ], 200);
                    
    }
}
