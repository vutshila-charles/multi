<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="px-4 mx-auto mt-20 sm:px-6 lg:px-8 max-w-7xl">
        <div class="px-4 py-4 my-6 bg-white rounded-md sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Budgets</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the budgets in your account</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">

                <button type="button" wire:click="addExpense"
                    class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                    Expense</button>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-2">
            @for($i = 0; $i < $numberOfDivs ; $i++ )
            <div>
                <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    <div class="px-4 py-6 sm:p-8">
                        <div >
                            <div class="sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Expense</label>
                                <div class="mt-2">
                                    <input type="text" name="first-name" wire:model='expense.{{ $i }}' id="first-name" autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                                <div class="mt-2">
                                    <select type="text" name="last-name" wire:model='category.{{ $i }}' id="last-name" autocomplete="family-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option>Select an option</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                                <div class="mt-2">
                                    <input type="text" name="last-name" wire:model='price.{{ $i }}' id="last-name" autocomplete="family-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endfor
        </div>
        @if($numberOfDivs >0)
        <div class="py-4 mt-4 bg-blue-400 rounded-md">
            <button wire:click="saveBudget" class="w-full text-center text-white">Save </button>
        </div>
            
           <div class="text-white">
            Remaining Balance: {{ $remainingBudget }}
           </div>
        @endif
    </div>
</div>
