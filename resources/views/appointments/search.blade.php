<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Results') }}
        </h2>
    </x-slot>

    @forelse($services_doctors as $service_doctor)
            <div class="py-12" style="margin-bottom: -50px">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="mb-5" style="display: flex">
                                <div>
                                    <img src="{{URL::asset('/images/default-profile.jpg') }}" style="min-width: 150px; height: 150px">
                                </div>
                                <div style="display: block; min-width: 700px">
                                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Name:</label> {{ $service_doctor->name }}</h2>
                                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Field:</label> {{ $service_doctor->field }}</h2>
                                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Education:</label> {{ $service_doctor->education }}</h2>
                                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Work Address:</label> {{ $service_doctor->work_address }}</h2>
                                </div>
                                @if($data_checker)
                                    <a href="{{ route('appointments.create', $service_doctor->name) }}" class="bg-green-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-5 mt-20" style="cursor: pointer; min-width: 180px; height: 40px; text-align: center">Make appointment</a>
                                @else
                                    <div role="alert">
                                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                            You can not make an appointment yet
                                        </div>
                                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                            <p>Fill your personal data first</p>
                                        </div>
                                    </div>
                                @endif
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
