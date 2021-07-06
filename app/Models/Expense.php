<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'expense_category_id',
        'amount',
        'entry_date'
    ];
    
    public function expense_categories()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
