<?php

namespace App\Models\ExpenseTracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategories extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
    protected $table = 'expenses_categories';

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }


}
