<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 mb-6" role="alert">
                        <p class="font-bold">Informational message</p>
                        <p class="text-lg">All appointments created by patient will become valid after administration approve.</p>
                    </div>

                    @if($patient_data == null)
                        <div role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                Danger
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <p>You did not fill your personal data. Fill it before making appointment!</p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="py-12" style="margin-top: -45px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form
                        action="{{ route('appointments.store'), $name }}"
                        method="post"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="mb-6">
                            <label class="mr-12">Doctor's Name:</label>
                            <input type="text" name="doctor_name" style="border-radius: 10px; min-width: 500px" value="{{ $name }}" required>
                        </div>
                        <div class="mb-6">
                            <fieldset>
                                <legend class="text-lg mb-4">Select a service:</legend>
                                <div style="display: inline">
                                    @foreach($services as $service)
                                        <div class="mb-6">
                                            <input type="radio" id="service" name="service"
                                                   checked required value="{{ $service->service }}">
                                            <label for="service">{{ $service->service }}</label>

                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>
                        <div class="mb-4">
                            <label class="mr-12">Date:</label>
                            <input type="date" name="date" style="border-radius: 10px; min-width: 500px" required>
                        </div>
                        <div class="mb-4">
                            <label class="mr-11">Time:</label>
                            <input type="time" name="time" style="border-radius: 10px; min-width: 500px" required>
                        </div>
                        <button type="submit" class="bg-green-600 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">MAKE AN APPOINTMENT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
