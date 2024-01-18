<?php

namespace App\Models\ExpenseTracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Expense extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount',
        'description',
        'expense_category_id',
        'budget_item_id',
        'user_id',
        'date',
        'name',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(ExpenseCategories::class, 'category_id');
    }

    public function budgetItem()
    {
        return $this->belongsTo(BudgetItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
