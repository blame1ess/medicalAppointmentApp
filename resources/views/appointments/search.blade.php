<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Results') }}
        </h2>
    </x-slot>

    @forelse($doctor_data_arr as $one_doctor)
            <div class="py-12" style="margin-bottom: -50px">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="mb-5" style="display: flex">
                                <div>
                                    <img src="{{URL::asset('/images/default-profile.jpg') }}" style="min-width: 150px; height: 150px">
                                </div>
                                <div style="display: block; min-width: 700px">
                                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Name:</label> {{ $one_doctor[2] }}</h2>
                                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Education:</label> {{ $one_doctor[0] }}</h2>
                                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Work Address:</label> {{ $one_doctor[1] }}</h2>
                                </div>
{{--                                <label class="text-black-600 ml-6 mt-1" style="font-size: 18px" href="#"><h2>field: {{ $field }}</h2></label>--}}
                                <a href="{{ route('appointments.create', $one_doctor[2]) }}" class="bg-green-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-5 mt-20" style="cursor: pointer; min-width: 180px; height: 40px; text-align: center">Make appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @empty
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("No results was found :(") }}
                    </div>
                </div>
            </div>
        </div>
    @endforelse
</x-app-layout>
