<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Requests') }}
        </h2>
    </x-slot>

    <div class="mb-5">
        @include('flash_message')
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{--<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                            <div>
                                <p class="font-bold text-md">Success!</p>
                                <p class="text-md">You are logged in successfully.</p>
                            </div>
                        </div>
                    </div>--}}
                    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 mt-5" role="alert">
                        <p class="font-bold text-lg">Dr. {{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                        <p class="text-md">
                            Here you can manage your requests
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12" style="margin-top: -5%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg mb-4">You can ask administration of web-site to add new fields:</h2>

                    <form action="{{ route('manage_requests.field_request') }}" method="post">
                        @csrf
                        @method('put')

                        <div class="mb-4">
                            <label class="mr-24">Field Name:</label>
                            <input type="text" name="field" style="border-radius: 10px; min-width: 300px" placeholder="Write in lower case letters">
                            @error('field')
                            <div class="text-red-700">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        </div>



                        <div class="mb-4">
                            <label class="mr-9">Additional Message:</label>
                            <input type="text" name="message" style="border-radius: 10px; min-width: 300px" placeholder="Any additional info (not required)">
                            <button type="submit" class="bg-blue-600 text-white py-1 px-5 rounded-xl ml-5 hover:bg-red-700">SEND</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="py-12" style="margin-top: -5%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg mb-4">Or you can make custom requests in form of message:</h2>

                    <form action="{{ route('manage_requests.custom_request') }}" method="post">
                        @csrf
                        @method('put')

                        <div class="mb-4 flex">
                            <label class="mr-24">Request Description:</label>
                            <textarea type="text" name="request_content" style="border-radius: 10px; min-width: 400px; min-height: 150px" placeholder="Provide detailed description of your request"></textarea>

                            @error('field')
                                <div class="text-red-700">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4 flex justify-end" style="width: 50%">
                            <button type="submit" class="bg-blue-600 text-white py-1 px-5 rounded-xl ml-5 hover:bg-red-700 mt-2">SEND</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>


