<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{--            {{ __('Enter your Personal Data:') }}--}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($existence == null)
                        <form
                            action="{{ route('doctor.personal_data.store') }}"
                            method="post"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @method('put')
                            <div class="mb-4">
                                <label class="mr-12">Education:</label>
                                <input type="text" name="education" style="border-radius: 10px; min-width: 500px" placeholder="Your alma mater and any other education">
                            </div>
                            <div class="mb-4 flex">
                                <label class="mr-12">Experience:</label>
                                <textarea type="text" name="experience" style="border-radius: 10px; min-width: 500px; min-height: 150px;" placeholder="Share your experience in full details"></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="mr-5">Work Address:</label>
                                <input type="text" name="work_address" style="border-radius: 10px; min-width: 500px" placeholder="Enter your work address here">
                            </div>

                            <div class="mb-6 mt-8">
                                <fieldset>
                                    <legend class="text-lg mb-5">Select your field (if you can not find your field below, make a
                                        <a class="text-blue-500 cursor-pointer">Field Add Request</a>):
                                    </legend>
                                    <div class="grid grid-cols-3 gap-2 justify-between">
                                        @foreach($fields as $field)
                                            <div class="mb-6">
                                                <input type="radio" name="field"
                                                       checked required value="{{ $field['field'] }}">
                                                <label for="service">{{ $field['field'] }}</label>

                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>

                            <button type="submit" class="bg-green-600 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-green-600 rounded">ADD DATA</button>
                        </form>
                    @else
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold text-md">Your personal data filled successfully</p>
                                    <p class="text-md">You can update your data by pressing button update</p>
                                </div>
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
                    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                        <p class="font-bold text-lg">Read carefully!</p>
                        <p class="text-md">
                            NOTE: Always check your filled data, it must be absolutely accurate.
                            In case of discrepancy or providing fake data, administration of the service
                            has the right to ban doctor and restrict from service usage.

                        </p>
                    </div>
                    <h2 class="mt-8 mb-5 text-lg">Your Personal Information:</h2>
                    @if($existence == null)
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold text-lg">Be Warned</p>
                            <p class="text-md">You did not fill your personal information yet. You can not accept appointments without filled personal data.</p>
                        </div>
                    @else
                        <div class="text-lg">
                            <label class="text-blue-600">Name:</label> {{ auth()->user()->name }}<br>
                            <label class="text-blue-600">Field:</label> {{ $doctor_data->field }}<br>
                            <label class="text-blue-600">Education:</label> {{ $doctor_data->education }}<br>
                            <label class="text-blue-600">Experience:</label> {{ $doctor_data->experience }}<br>
                            <label class="text-blue-600">Work Address:</label> {{ $doctor_data->work_address }}<br>
                        </div>
                        <button id="update" type="button" class="bg-blue-700 hover:bg-red-600 text-white font-bold py-2 px-4 border border-blue-700 rounded mt-8">
                            UPDATE
                        </button>

                        <div id="update-form"></div>

                    @endif

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $('#update').click( function (){
            console.log('Update button clicked');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#update-form').html(

            '<h1 class="text-lg mt-9">Update Personal Data Form:</h1>' +
            '<div class="mb-4 mt-7">' +
                '<label class="mr-12">Education:</label>' +
                '<input id="u-education" type="text" value=" {{ $doctor_data->education }} " name="u-education" style="border-radius: 10px; min-width: 500px" placeholder="Your alma mater and any other education">' +
            '</div>' +
            '<div class="mb-4 flex">' +
                '<label class="mr-12">Experience:</label>' +
                '<textarea id="u-experience" type="text" value= "{{ $doctor_data->experience }}" name="u-experience" style="border-radius: 10px; min-width: 500px; min-height: 150px;" placeholder="Share your experience in full details"></textarea>' +
            '</div>' +
            '<div class="mb-4">' +
                '<label class="mr-5">Work Address:</label>' +
                '<input id="u-work_address" type="text" value= "{{ $doctor_data->work_address }}" name="u-work_address" style="border-radius: 10px; min-width: 500px" placeholder="Enter your work address here">' +
            '</div>' +
            '<div class="mb-6 mt-8">'+
                '<fieldset>' +
                    '<legend class="text-lg mb-5">Select your field (if you can not find your field below, make a' +
                        '<a class="text-blue-500 cursor-pointer"> Field Add Request</a>):' +
                    '</legend>' +
                    '<div class="grid grid-cols-3 gap-2 justify-between">' +
                        '@foreach($fields as $field)' +
                        '<div class="mb-6">' +
                        '<input type="radio" id="u-field" name="u-field"' +
                               'checked required value="{{ $field['field'] }}">'+
                            '<label for="service"> {{ $field['field'] }}</label>' +

                        '</div>' +
                        '@endforeach' +
                    '</div>' +
                '</fieldset>' +
            '</div>' +
            '<div class="flex justify-end">' +
                '<button id="save" type="submit" class="bg-green-700 hover:bg-red-600 text-white font-bold py-2 px-4 border border-green-700 rounded mt-8 mr-24">SAVE</button>' +
            '</div>' +
            '<div id="result"></div>'
            );

            $('#save').click( function () {

                console.log('Save button is clicked!')

                let education = $('#u-education').val()
                let experience = $('#u-experience ').val()
                let work_address = $('#u-work_address').val()
                let field = $('#u-field').val()

                $(document).ready( function () {

                });

                $.ajax({
                    url: '{{ route('doctor.personal_data.update') }}',
                    method: 'post',
                    data: {
                        education: education,
                        experience: experience,
                        work_address: work_address,
                        field: field
                    },

                    success: function (data) {
                        console.log(data);
                        $('#result').html(data);
                    }

                })
            });

        })
    </script>

</x-app-layout>
