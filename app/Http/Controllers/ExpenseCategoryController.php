<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        return view('expense-category');
    }
    
    public function viewExpenseCategoryList(Request $request)
    {
        $expense_category_list = ExpenseCategory::all();
        return $expense_category_list;
    }

    
    public function getCategoryItem(Request $request){
        $expense_category = ExpenseCategory::find($request->id);
        return $expense_category;
    }

    public function createCategoryItem(Request $request){
        $expense_category = ExpenseCategory::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return $expense_category;
    }

    public function updateCategoryItem(Request $request){
        $expense_category = ExpenseCategory::find($request->id);
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $expense_category->update($data);
        return $expense_category;
    }

    public function deleteCategoryItem(Request $request){
        $expense = ExpenseCategory::find($request->id) ?? abort(400);
        $expense->delete();

        return response()->json('Deleted Category Successfully', 200);
    }
}
