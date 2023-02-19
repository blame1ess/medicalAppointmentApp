
Admin's page

{{--
<x-app-layout>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Appointments') }}
        </h2>
    </x-slot>

    --}}
{{-- search field --}}{{--

    <div class="py-12" style="min-width: 825px">
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
    </div>


    <div class="py-12" style="margin-top: -70px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5 text-lg">
                        {{ __("Enter your doctor's name or service. List of available fields you can see below:") }}
                    </div>

                    <div class="inline-grid grid-cols-3 gap-4">
                        @foreach($fields as $field)
                            --}}
{{-- modal activation --}}{{--


                            <button data-modal-target="{{ $field->field }}" data-modal-toggle="{{ $field->field }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                {{ $field->field }}
                            </button>

                            --}}
{{-- modal itself --}}{{--

                            --}}
{{--<div id="{{ $field->field }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <div class="relative w-full h-full max-w-2xl md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Static modal
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                            </p>
                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                                            </p>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button data-modal-hide="staticModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                                            <button data-modal-hide="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}{{--

                            --}}
{{--<a href="#" class="text-lg text-blue-600 mr-4 hover:underline md:mr-6">{{ $field->field }}</a>--}}{{--

                        @endforeach

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
                        <h2 class="mr-5" style="font-size: 18px">Your appointments:</h2>
                    </div>
                    <table class="p-5">
                        <tr>
                            <th>id</th>
                            <th>doctor</th>
                            <th>service</th>
                            <th>appointment time</th>
                            <th>status</th>
                            <th>action</th>

                        </tr>

                        @forelse($table_datas as $row)
                            <tr>
                                <td class="p-6 text-lg">{{ $row[0] }}</td>
                                <td>{{ $row[1] }}</td>
                                <td>{{ $row[2] }}</td>
                                <td>{{ $row[3] }}</td>
                                <td>{{ $row[4] }}</td>
                                <td>
                                    <div class="align-middle" style="display: flex; justify-content: center">
                                        --}}
{{--<a href="{{ route('appointments.edit', ['id' => $row[0]]) }}"
                                           class="bg-yellow-600 hover:bg-white text-white hover:text-yellow-600 font-bold py-2 px-4 border border-yellow-600 rounded mt-8 mr-5 mb-7"
                                        >EDIT</a>--}}{{--

                                        <form
                                            action="{{ route('appointments.destroy', ['id' => $row[0]]) }}"
                                            method="post"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-700 hover:bg-white text-white hover:text-red-700 font-bold py-2 px-4 border border-red-700 rounded mt-8 mb-7"
                                                    onclick="return confirm('Are you sure you want to delete your appointment?')"
                                            >DELETE</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 mb-5" role="alert">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                <p>You did not have appointments yet.</p>
                            </div>
                        @endforelse
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

--}}
