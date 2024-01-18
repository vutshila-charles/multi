<div>
    {{-- Stop trying to control. --}}
    <div class="px-4 mx-auto mt-20 sm:px-6 lg:px-8 max-w-7xl">
        <div class="px-4 py-4 my-6 bg-white rounded-md sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Budgets</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all the budgets in your account</p>
          </div>
          <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            
            <button type="button" wire:click="toggleShowModal" class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Budget</button>
          </div>
        </div>
        <div class="flow-root px-4 mt-8 bg-white rounded-md">
          <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
              <table class="min-w-full divide-y divide-gray-300">
                <thead>
                  <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Spent</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($budgets as $budget)
                  <tr id="budget-{{ $budget->id }}">
                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-0">{{ $budget->name }}</td>
                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $budget->date }}</td>
                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $budget->amount }}</td>
                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $budget->spent }}</td>
                    <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-0">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $budget->id }}</span></a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div id="modal" class="fixed inset-0 items-center justify-center {{ $showModal }} bg-gray-800 bg-opacity-50">
        <!-- Modal content -->
        <div class="max-w-sm p-6 mx-auto mt-12 bg-white rounded shadow-lg">
            <h2 class="mb-4 text-2xl font-semibold">Modal Title</h2>
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-600">Name</label>
                <input type="text" id="name"  wire:model.defer="budgetAmount" class="w-full px-3 py-2 text-gray-700 border rounded-md focus:outline-none focus:border-blue-500" />
            </div>
            <div class="flex justify-between">
                <div ><button wire:click="toggleShowModal" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded">Close</button></div>
                <div><button wire:click="createBudget" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded">Create  Budget</button></div>
            </div>
            
        </div>
    </div>
      
</div>
