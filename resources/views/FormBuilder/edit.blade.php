@extends('layouts.app')
@section('head')
    <title>{{__('Edit Form')}}</title>
@endsection

@section('content')
    <div>
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="pb-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Nama Form')}}</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: Server" required/>
            </div>
            <div id="fb-editor" class="border-dashed border bg-gray-50 border-gray-300 p-4"></div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="{{ URL::asset('assets/form-builder/form-builder.min.js') }}"></script>
    <script>
        var fbEditor = document.getElementById('fb-editor');
        var formBuilder = $(fbEditor).formBuilder({
            onSave: function(evt, formData) {
                saveForm(formData);
            },
        });

        $(function() {
            $.ajax({
                type: 'get',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                },
                url: '{{ URL('get-form-builder-edit') }}',
                data: {
                    'id': '{{ $id }}'
                },
                success: function(data) {
                    $("#name").val(data.name);
                    formBuilder.actions.setData(data.content);
                }
            });
        });

        function saveForm(form) {
            $.ajax({
                type: 'post',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                },
                url: '{{ URL('update-form-builder') }}',
                data: {
                    'form': form,
                    'name': $("#name").val(),
                    'id': {{ $id }},
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    location.href = "/form-builder";
                }
            });
        }
    </script>
@endsection
