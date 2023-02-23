<x-app-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="py-12" style="margin-bottom: -5%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{--<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                            <div>
                                <p class="font-bold text-md">Success!</p>
                                <p class="text-md">You are logged in as Super User.</p>
                            </div>
                        </div>
                    </div>--}}

                    <h2>Search for registered doctors:</h2>

                    <div class="mb-10">
                        <input type="text" name="search" id="search" class="mt-5 rounded-xl" style="width: 300px" placeholder="Write the doctor's name here">
                        {{--<button class="bg-blue-600 rounded-2xl py-2 px-5 ml-7 text-white">search</button>--}}
                    </div>

                    <div class="text-red-700">
                        @error('search')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div id="Content">

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    --}}{{--<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                            <div>
                                <p class="font-bold text-md">Success!</p>
                                <p class="text-md">You are logged in as Super User.</p>
                            </div>
                        </div>
                    </div>--}}{{--

                    <h2>Search for registered doctors:</h2>

                    <div class="mb-10">
                        <input type="text" name="search" id="search" class="mt-5 rounded-xl" style="width: 300px" placeholder="Write the doctor's name here">
                        --}}{{--<button class="bg-blue-600 rounded-2xl py-2 px-5 ml-7 text-white">search</button>--}}{{--
                    </div>

                    <div class="text-red-700">
                        @error('search')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div id="Content">

                    </div>
                </div>
            </div>
        </div>
    </div>--}}

    <script type="text/javascript">
        $('#search').on('keyup', function () {
            $value = $(this).val(); // whatever we write in search field, it will be storred in $value variable
            $.ajax({

                type:'get',
                url:'{{ route('search') }}',
                data:{'search':$value},

                success:function (data) {
                    console.log(data);
                    $('#Content').html(data);
                }

            });
        })
    </script>

</x-app-layout>



