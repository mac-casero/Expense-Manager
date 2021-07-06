<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function expenseTotalPerCategoryList(){
        $expense_total_per_category = Expense::select('expense_categories.name', DB::raw('sum(amount) as total'))
                    ->rightJoin('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
                    ->groupBy('expense_categories.name')
                    ->get();
        return $expense_total_per_category;
    }

    function rand_color() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    public function getExpensePieChartData(Request $request)
    {
        //return $this->rand_color();
        $expense_category = $this->expenseTotalPerCategoryList();
        if($expense_category->count() <= 0){
            return null;
        }
        $labels = array();
        $amounts = array();
        $background_colors = array();
        foreach($expense_category as $category){
            array_push($labels, $category->name);
            array_push($amounts, $category->total);
            array_push($background_colors, $this->rand_color());
        }
        //return $background_colors;
        $pie_chart_data = [
            'labels' =>  $labels,
            'data' => $amounts,
            'backgroundColor' =>$background_colors,
            'hoverOffset' => 6
        ];

        return $pie_chart_data;
    }
}
