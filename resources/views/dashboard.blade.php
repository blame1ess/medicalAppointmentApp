<x-app-layout>

    @if($type == 'patient')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

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
                            <p class="font-bold text-lg">Welcome, {{ $user->name }}!</p>
                            <p class="text-md">
                                Before making an appointment, be sure that you have filled your personal data
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12" style="margin-top: -45px">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ 'Here you will see any new messages and updates' }}
                        @foreach($messages as $message)
                            @if(strpos($message['content'], 'approved'))
                                <div class="message-container">
                                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mt-5" role="alert">
                                            <div class="flex place-content-between">
                                                <div class="flex">
                                                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                                    <div>
                                                        <p class="font-bold text-md">New message</p>
                                                        <p class="text-md">{{ $message['content'] }}</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="bg-blue-700 hover:px-6 hover:py-1.5 text-white font-bold py-1 px-5 border border-blue-700 rounded" href="{{ route('dashboard.delete', ['id'=>$message['id']]) }}">
                                                        @csrf
                                                        OK
                                                    </a>
                                                    {{--<form action="{{ route('dashboard.delete', ['id'=>$message['id']]) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                    </form>
                                                    <button type="submit" class="bg-blue-700 hover:px-6 hover:py-1.5 text-white font-bold py-1 px-5 border border-blue-700 rounded">
                                                        OK
                                                    </button>--}}
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            @elseif(strpos($message['content'], 'declined'))
                                <div class="message-container">
                                    <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md mt-5" role="alert">
                                        <div class="flex place-content-between">
                                            <div class="flex">
                                                <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                                <div>
                                                    <p class="font-bold text-md">New message</p>
                                                    <p class="text-md">{{ $message['content'] }}</p>
                                                </div>
                                            </div>
                                            <div>
                                                <a class="bg-blue-700 hover:px-6 hover:py-1.5 text-white font-bold py-1 px-5 border border-blue-700 rounded" href="{{ route('dashboard.delete', ['id'=>$message['id']]) }}">
                                                    @csrf
                                                    OK
                                                </a>

                                                {{--<form action="{{ route('dashboard.delete', ['id'=>$message['id']]) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                                <button type="submit" class="bg-blue-700 hover:px-6 hover:py-1.5 text-white font-bold py-1 px-5 border border-blue-700 rounded">
                                                    OK
                                                </button>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($message === null)
                                {{ 'You dont have messages yet' }}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    @elseif($type == 'admin')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Management Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold text-md">Success!</p>
                                    <p class="text-md">You are logged in as Super User.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else {{-- doctors dahboard --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dr. {{ $user->name }}'s Dashboard
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold text-md">Hello, Dr. {{ $user->name }}</p>
                                    <p class="text-md">You are logged in successfully. Have a good day!</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-blue-100 border-t-4 border-red-500 rounded-b text-blue-900 px-4 py-3 shadow-md mt-9" role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-blue-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold text-md text-red-400">Pay Attention!</p>
                                    <p class="text-md">If you didn't fill <a href="#" class="text-blue-400" style="cursor: pointer">personal information</a> yet, its time to do it!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif



</x-app-layout>
