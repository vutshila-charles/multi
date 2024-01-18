<?php

namespace App\Http\Livewire\ExpenseTracker;

use Livewire\Component;

class Index extends Component
{

    public $showModal = 'hidden';
    public $budgets;
    public $budgetAmount;
    public function toggleShowModal()
    {
        $this->showModal = $this->showModal === 'hidden' ? '' : 'hidden';
    }
    public function mount()
    {
        $budgets = auth()->user()->budgets;
        $this->budgets = $budgets;
    }
    public function gotoBuget($budgetId)
    {
        return redirect()->route('expense-tracker.budget', $budgetId);
    }

    public function createBudget()
    {
        return redirect()->route('budgets.create', $this->budgetAmount);
    }
    public function render()
    {
        return view('livewire.expense-tracker.index');
    }
}
