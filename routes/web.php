<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/budgets',\App\Http\Livewire\ExpenseTracker\Index::class)->name('budgets.index');
    Route::get('/create/budget/{budgetAmount}',\App\Http\Livewire\ExpenseTracker\Create::class)->name('budgets.create');
});


// use App\Models\ExpenseTracker\Expense;
// use App\Models\ExpenseTracker\Budget;
// use App\Models\ExpenseTracker\ExpenseCategories;
// use App\Models\ExpenseTracker\BudgetItem;
// use App\Models\User;

// Route::get('/expenses', function () {
//     $categories = ExpenseCategories::all();
//     $user = User::find(1);
//     $arrayOfExpenses = [
//         'Household' =>[
//             'Rent',
//             'Electricity',
//             'Water',
//             'Internet',
//             'Phone',
//             'Groceries',
//         ],
//         'Entertainment' => [
//             'Movies',
//             'Concerts',
//             'Games',
//             'Books',
//             'Music',
//             'Subscriptions',
//         ],
//         'Communication' => [
//             'Phone',
//             'Internet',
//             'Subscriptions',
//         ],
//         'Medical' => [
//             'Doctor',
//             'Dentist',
//             'Medicine',
//             'Health Insurance',
//         ],
//         'Education' => [
//             'Books',
//             'Supplies',
//             'Tuition',
//         ],
//         'Transport' => [
//             'Gas',
//             'Parking',
//             'Repairs',
//             'Insurance',
//             'Public Transportation',
//         ],
//     ];


//     $budget = new Budget();
//     $budget->user_id = $user->id;
//     $budget->amount = 1000;
//     $budget->spent = 0;
//     $budget->remaining = 1000;
//     $budget->name = 'test';
//     $budget->date = '2021-01-01';
//     $budget->save();
//     foreach($categories as $category) {
//         $expense = new Expense();
//         $expense->category_id = $category->id;
//         $expense->user_id = $user->id;
//         $expense->amount = 100;
//         $expense->name = $arrayOfExpenses[$category->name][0];
//         $expense->date = '2021-01-01';
//         $expense->description = 'test';
//         $expense->save();
//     }

//     $userExpenses = Expense::where('user_id', $user->id)->get();
//     $budgetItems = [];
//     foreach($userExpenses as $expense) {
//         $budgetItem = new BudgetItem();
//         $budgetItem->budget_id = $budget->id;
//         $budgetItem->expense_id = $expense->id;
//         $budgetItem->amount = $expense->amount;
//         $budgetItem->market_value = $expense->amount;
//         $budgetItem->is_paid = false;
//         $budgetItem->date = '2021-01-01';
//         $budgetItem->save();
//         $budgetItems[] = $budgetItem;
//     }

//     dd($budgetItems);

// });
//->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->name('expenses.index');
