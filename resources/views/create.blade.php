@extends('components.body')
@section('body')
    <div class="max-w-[400px]">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-red-400 py-2">{{ $error }}</p>
            @endforeach
        @endif

        <form action="{{ route('reports.store') }}" method="post">
            @csrf
            <div class="mb-5">
                <label for="transaction_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction
                    Type</label>
                <select id="transaction_type" name="transaction_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="">Choose a country</option>
                    @foreach ($transaction_types as $type)
                        <option value="{{ $type->id }}">{{ $type->transaction_types_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Khat(sector)</label>
                <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="khat_name">
                    <option selected value="">Choose a country</option>
                    @foreach ($khat_types as $type)
                        <option value="{{ $type->id }}">{{ $type->khat_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                <input type="number" id="amount" name="amount"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    min="0">
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
@endsection
