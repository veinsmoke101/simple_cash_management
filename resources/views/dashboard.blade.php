<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 bg-white border-b border-gray-200">
                    <p>Cash History</p>
                    <a href="#" class=" flex inline-block text-center">
                        <img src="{{asset('images/plus-svgrepo-com.svg')}}" class="mr-2 w-6 h-6 text-red-400" alt="new-record">
                        new record
                    </a>
                </div>
                <div class="w-full">
                    <div class="flex flex-col">
                        <div class="w-full">
                            <div class="p-8 border-b border-gray-200 shadow">
                                <table class="table-auto w-full divide-y divide-gray-300" id="dataTable">
                                    <thead class="text-left bg-black" style="text-align: left; background-color: black">
                                    <tr>
                                        <th class="px-6 py-2 text-xs text-white">
                                            ID
                                        </th>
                                        <th class="px-6 py-2 text-xs text-white">
                                            DATE
                                        </th>
                                        <th class="px-6 py-2 text-xs text-white">
                                            LIBELLE
                                        </th>
                                        <th class="px-6 py-2 text-xs text-white">
                                            CAISSE
                                        </th>
                                        <th class="px-6 py-2 text-xs text-white">
                                            MONTANT
                                        </th>
                                        <th class="px-6 py-2 text-xs text-white">
                                            SOLDE
                                        </th>
                                        <th class="px-6 py-2 text-xs text-white">

                                        </th>
                                        <th class="px-6 py-2 text-xs text-white">

                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-300">
                                    @foreach($transactions as $transaction)
                                    <tr class="text-left whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$transaction->id}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$transaction->created_at}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500">
                                                {{ucfirst($transaction->label)}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ucfirst($transaction->type)}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$transaction->transaction_amount}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$transaction->balance}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="inline-block text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="inline-block text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>




</x-app-layout>
