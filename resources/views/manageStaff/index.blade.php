<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage staff') }}
        </h2>
    </x-slot>

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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-blue-100 text-lg border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                        <p class="font-bold">Be aware!</p>
                        <p class="text-sm">The doctor will not appear in search field until she will not fill personal information in her account.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12" style="margin-top: -5%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <div class="mb-10 flex">
                        <h2 class="text-lg">Register new doctor:</h2>
                        <button id="target" class="bg-blue-600 hover:py-2.5 hover:px-6 rounded-2xl py-2 px-5 ml-7 text-white">Add Doctor</button>
                    </div>

                    <div id="filling-form">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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

        $('#target').click(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#filling-form').html(
                '<div class="mb-5">' +
                    '<span class="mr-12">Name: </span>'+
                    '<input name="name" id="name" class="rounded-xl" style="width: 300px" type=text placeholder="Name Surname">'+
                '</div>' +
                '<div class="mb-5">' +
                    '<span class="mr-12">Email: </span>'+
                    '<input name="email" id="email" class="rounded-xl" style="width: 300px" type=email placeholder="email@example.com">'+
                '</div>' +
                '<div class="mb-5">' +
                    '<span class="mr-5">Password: </span>'+
                    '<input name="password" id="password" class="rounded-xl" style="width: 300px" type=text placeholder="Symbols allowed: A-z, 0-9, _">'+
                    '<button id="button" type="submit" class="bg-green-600 hover:py-2.5 hover:px-6 rounded-2xl py-2 px-5 ml-7 text-white" style="cursor: pointer">Register</butt>' +

                '</div>' +

                '<div id="message"></div>'
            )

            $(document).ready(function () {

            });

            $('#button').click(function () {

                console.log('submit button clicked!')

                var name = $('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();

                $.ajax({
                    url: '{{ route('admin.store') }}',
                    method: 'post',
                    data: {
                        name: name,
                        email: email,
                        password: password
                    },
                    success: function(data) {
                        console.log(data);
                        $('#message').html(data)
                    }

                })
            });

        })

    </script>

</x-app-layout>



