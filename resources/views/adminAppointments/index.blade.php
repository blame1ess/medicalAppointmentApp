<x-app-layout>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Appointments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5 text-lg">
                        {{ __("Here you can manage all appointments") }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12" style="margin-top: -70px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="table-header" style="display: flex">
                        <h2 class="mr-5" style="font-size: 18px">All appointments:</h2>
                    </div>
                    <table class="p-5">
                        <tr>
                            <th>id</th>
                            <th>doctor</th>
                            <th>patient</th>
                            <th>service</th>
                            <th>appointment time</th>
                            <th>status</th>
                            <th>action</th>

                        </tr>

                        @foreach($table as $row)
                            <tr>
                                <td class="p-6 text-lg">{{ $row->id }}</td>
                                <td>{{ $row->doctor_name }}</td>
                                <td>{{ $row->patient_name }}</td>
                                <td>{{ $row->service }}</td>
                                <td>{{ $row->time_date }}</td>
                                @if($row->status == 'waiting')
                                    <td class="text-blue-800">{{ $row->status . '...' }}</td>
                                @elseif($row->status == 'approved')
                                    <td class="text-green-700">{{ $row->status }}</td>
                                @else
                                    <td class="text-red-700">{{ $row->status }}</td>
                                @endif

                                <td>
                                    @if($row->status == 'waiting')
                                        <button type="button" class="bg-green-700 hover:bg-white text-white hover:text-green-700 font-bold py-2 px-4 border border-green-700 rounded mt-8 mb-7">
                                            <a href="{{ route('admin.accept', ['id' => $row->id]) }}">Accept</a>
                                        </button>
                                        <button type="button" class="bg-red-700 hover:bg-white text-white hover:text-red-700 font-bold py-2 px-4 border border-red-700 rounded mt-8 mb-7">
                                            <a href="{{ route('admin.decline', ['id' => $row->id]) }}">Decline</a>
                                        </button>

                                    @else
                                        {{--<button type="button" class="bg-red-700 hover:bg-white text-white hover:text-red-700 font-bold py-2 px-4 border border-red-700 rounded mt-8 mb-7">
                                            Nothing to do...
                                        </button>--}}
                                        {{ 'No action required' }}
                                    @endif

                                </td>
                            </tr>

                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>



    {{-- search field --}}
    {{--<div class="py-12" style="min-width: 825px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <div class="inline-flex flex-row">
                            <form action="{{ route('appointments.search') }}" method="get" accept-charset="utf-8">
                                <input type="text" class="border-black rounded-2xl" name="search_name" style="width: 600px" placeholder="Enter the doctor's name">
                                <button type="submit" class="ml-8 inline-block bg-teal-400 rounded-2xl" style="padding: 10px 20px">Search</button>
                            </form>
                        </div>
                        <div class="mt-5 alert alert-danger text-red-700 mb-1">
                            @error('search_name')
                            <span class="">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
</x-app-layout>

