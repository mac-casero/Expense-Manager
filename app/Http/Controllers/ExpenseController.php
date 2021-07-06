<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseController extends Controller
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
        return view('expenses');
    }
    
    public function viewExpenseList(Request $request)
    {
        $expense_list = ExpenseCategory::select('*')
        ->join('expenses', 'expenses.expense_category_id', '=', 'expense_categories.id')
        ->get();

        return $expense_list;
    }

    public function getExpenseItem(Request $request){
        $expense = Expense::find($request->id);
        return $expense;
    }

    public function createExpenseItem(Request $request){
        $expense = Expense::create([
            'expense_category_id' => $request->expense_category_id,
            'amount' => $request->amount,
            'entry_date' => $request->entry_date
        ]);
        return $expense;
    }

    public function updateExpenseItem(Request $request){
        $expense = Expense::find($request->id);
        $data = [
            'expense_category_id' => $request->expense_category_id,
            'amount' => $request->amount,
            'entry_date' => $request->entry_date
        ];
        $expense->update($data);
        return $expense;
    }

    public function deleteExpenseItem(Request $request){
        $expense = Expense::find($request->id) ?? abort(400);
        $expense->delete();

        return response()->json('Deleted Expense Successfully', 200);
    }
}
