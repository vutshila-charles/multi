<?php

namespace App\Services;

use App\Models\ExpenseTracker\Expense;
use App\Models\ExpenseTracker\Budget;
use App\Models\ExpenseTracker\BudgetItem;

class ExpenseTrackerService
{
    public $expenses = [];
    public $budgetId;

    public function createRecords($data)
    {
        $this->createBudget($data);
        $this->createExpense($data);
        $this->createBudgetItem($data);
    }
    public function createBudget($data)
    {
        $budget = new Budget();
        $budget->user_id = $data['user_id'];
        $budget->amount = $data['budget_amount'];
        $budget->spent = 0;
        $budget->remaining = $data['remaining_budget'];
        $budget->name = $data['date'].' Budget';
        $budget->date = $data['date'];
        $budget->save();
        $this->budgetId = $budget->id;
    }
    public function createExpense($data)
    {
        // dd($data['expenses']);
        foreach($data['expenses'] as $expenseData){
            $expense = new Expense();
            $expense->category_id = $expenseData['category'];
            $expense->user_id = $data['user_id'];
            $expense->amount = $expenseData['price'];
            $expense->name = $expenseData['expense'];
            $expense->date = $data['date'];
            $expense->description = 'test';
            $expense->save();
            $this->expenses[] = $expense;
        }
        //dd($this->expenses);
    }

    public function createBudgetItem($data)
    {
        foreach($this->expenses as $expense){
            $budgetItem = new BudgetItem();
            $budgetItem->budget_id = $this->budgetId ;
            $budgetItem->expense_id = $expense->id;
            $budgetItem->amount = $expense->amount;
            $budgetItem->market_value = 0;
            $budgetItem->is_paid = false;
            $budgetItem->date = $data['date'];
            $budgetItem->save();
        }
    }

}