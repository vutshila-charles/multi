<?php

namespace App\Http\Livewire\ExpenseTracker;

use Livewire\Component;
 use App\Models\ExpenseTracker\ExpenseCategories;
use App\Services\ExpenseTrackerService;

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
        //group  expenses , category,price by indexs
        $expenses = [];
        foreach($this->price as $index => $price){
            $expenses[] = [
                'price' => $price,
                'expense' => $this->expense[$index],
                'category' => $this->category[$index],
            ];
        }

        $data =[
            'user_id' =>auth()->user()->id,
            'budget_amount' => $this->budgetAmount,
            'remaining_budget' => $this->remainingBudget,
            'date' => now(),
            'expenses' => $expenses,
        ];

        $create = new ExpenseTrackerService();
        $create->createRecords($data);

    }
    public function render()
    {
        return view('livewire.expense-tracker.create',[
            'categories' => ExpenseCategories::all(),
        ]);
    }
}
