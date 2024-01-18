<?php

namespace App\Models\ExpenseTracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'budget_id',
        'expense_id',
        'amount',
        'market_value',
        'is_paid',
        'date',
    ];
    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function expenses()
    {
        return $this->belongsTo(Expense::class);
    }
}
