 @if ($errors->any())
     @foreach ($errors->all() as $error)
         <p class="text-red-400 py-2">{{ $error }}</p>
     @endforeach
 @endif
 <form action="{{ route('reports.filter') }}" method="post">
     @csrf
     <div class="flex space-x-2 items-center my-4">


         <div>
             <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                 Khat(sector)</label>
             <select id="countries" name="khat_type_id"
                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 <option selected value="">Choose a khat(sector)</option>
                 @foreach ($khat_types as $type)
                     <option value="{{ $type->id }}">{{ $type->khat_name }}</option>
                 @endforeach
             </select>

         </div>

         <div>
             <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                 Transaction Type</label>
             <select id="countries" name="transaction_types_id"
                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 <option selected value="">Choose a type</option>
                 @foreach ($transaction_types as $type)
                     <option value="{{ $type->id }}">{{ $type->transaction_types_name }}</option>
                 @endforeach
             </select>
         </div>


         <div class="relative max-w-sm">
             <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                 option</label>
             <input type="date" name="start_date" class="border-2 p-2 rounded-md text-sm" placeholder="Select date">
         </div>
         <div class="relative max-w-sm">
             <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                 option</label>
             <input type="date" name="end_date" class="border-2 p-2 rounded-md text-sm" placeholder="Select date">
         </div>


     </div>
     <div>
         <button type="submit"
             class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Filter</button>
     </div>
 </form>
