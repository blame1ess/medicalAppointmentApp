<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
{{--            {{ __('Enter your Personal Data:') }}--}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form
{{--                        action="{{ route('personal_data.create') }}"--}}
                        method="post"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="mb-4">
                            <label class="mr-4">Phone Number:</label>
                            <input type="text" name="phone_number" style="border-radius: 10px; min-width: 500px" placeholder="+X - XXX - XXX - XX - XX">
                        </div>
                        <div class="mb-4">
                            <label class="mr-16">Address:</label>
                            <input type="text" name="address" style="border-radius: 10px; min-width: 500px" placeholder="city, street, no. of house, zip-code">
                        </div>
                        <div class="mb-4">
                            <label class="mr-11">Blood Type:</label>
                            <input type="text" name="blood_type" style="border-radius: 10px; min-width: 500px" placeholder="A, B, AB, or O">
                        </div>
                        <button type="submit" class="bg-green-600 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">ADD DATA</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12" style="margin-top: -45px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                        <p class="font-bold">Informational message</p>
                        <p class="text-sm">NOTE: If you are entering your data first time, use field above and create your medicine card. If you want to update already existing data, press UPDATE button.</p>
                    </div>
                    <h2 class="mt-8 mb-5 text-lg">Your Personal Information:</h2>
                    @if($patient_data == null)
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Be Warned</p>
                            <p>You did not fill your personal information yet.</p>
                        </div>
                    @else
                        <div class="text-lg">
                            <label class="text-blue-600">Name:</label> {{ $patient_data->name }}<br>
                            <label class="text-blue-600">Phone number:</label> {{ $patient_data->phone_number }}<br>
                            <label class="text-blue-600">Email:</label> {{ $patient_data->email }}<br>
                            <label class="text-blue-600">Address:</label> {{ $patient_data->address }}<br>
                            <label class="text-blue-600">Blood type:</label> {{ $patient_data->blood_type }}<br>
                        </div>
                    @endif

                    <form
                        method="post"
                        action="{{ route('personal_data.destroy', $patient_data->id) }}"
                    >
                        @csrf
                        @method('delete')
{{--                        <a href="{{ route('personal_data.destroy', $patient_data->id) }}" class="bg-blue-700 hover:bg-red-600 text-white font-bold py-2 px-4 border border-blue-700 rounded mt-8">RESET</a>--}}
                        <button type="submit" class="bg-blue-700 hover:bg-red-600 text-white font-bold py-2 px-4 border border-blue-700 rounded mt-8">RESET</button>
                    </form>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
