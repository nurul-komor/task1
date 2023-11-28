@extends('components.body')
@section('body')
    <div class="m-4 ">
        <div class="flex justify-end">
            <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                href="{{ route('reports.index') }}">All Transcation</a>
        </div>
    </div>
    <div class="flex">
        <div>
            <div>
                {{-- <h4>You Current ballance: ${{ $ballance }}</h4> --}}
            </div>
            <div class="my-4">
                <h4>
                    Total Income: {{ $income }} <br>
                    Total Expence: {{ $expense }}
                </h4>
            </div>
        </div>
    </div>

    <div>
        @include('filterBox')
    </div>
    <div class="relative  shadow-md sm:rounded-lg py-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Transaction Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Khat (Sector)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($transactions as $transaction)
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $i++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $transaction->amount }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($transaction->transaction_type->id == 1)
                                <p class="p-2 rounded-md bg-green-500 text-white inline-block">
                                    {{ $transaction->transaction_type->transaction_types_name }}</p>
                            @else
                                <p class="p-2 rounded-md bg-yellow-500 text-white inline-block">
                                    {{ $transaction->transaction_type->transaction_types_name }}</p>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $transaction->khat->khat_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transaction->created_at }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('reports.edit', ['report' => $transaction]) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('reports.destroy', ['report' => $transaction]) }}" method="post"> @csrf
                                @method('DELETE') <button type="submit"
                                    onclick="return confirm('do you want to delete this')"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                            </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
