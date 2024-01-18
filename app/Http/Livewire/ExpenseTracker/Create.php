<?php

namespace App\Http\Livewire\ExpenseTracker;

use Livewire\Component;
 use App\Models\ExpenseTracker\Expense;
 use App\Models\ExpenseTracker\Budget;
 use App\Models\ExpenseTracker\ExpenseCategories;
 use App\Models\ExpenseTracker\BudgetItem;
use App\Models\User;

class Create extends Component
{
    public $budgetAmount;
    public $numberOfDivs = 0;

    public $price = [];

    public $expense = [];

    public $category = [];

    public $remainingBudget;

    public $rules = [
        'price.*' => 'required|numeric|min:0',
        'expense.*' => 'required|string',
        'category.*' => 'required|numeric',
    ];
    public function mount($budgetAmount){
        $this->budgetAmount = $budgetAmount;
    }

    public function addExpense()
    {
        $this->numberOfDivs++;
        $this->remainingBudget = $this->budgetAmount - array_sum($this->price);
    }

    public function removeExpense($index)
    {
        unset($this->price[$index]);
        $this->numberOfDivs--;
    }

    public function saveBudget()
    {
        //group  expenses , category,price by index
        $expenses = [];
        foreach($this->price as $index => $price){
            $expenses[] = [
                'price' => $price,
                'expense' => $this->expense[$index],
                'category' => $this->category[$index],
            ];
        }

        dd($expenses);
    }
    public function render()
    {
        return view('livewire.expense-tracker.create',[
            'categories' => ExpenseCategories::all(),
        ]);
    }
}
