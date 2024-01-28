@extends('layouts.app')
@section('head')
    <title>{{__('Example formBuilder')}}</title>
@endsection

@section('content')
    <div class="">
        <div class="">
            <form method="POST" action="{{ URL('save-form-transaction') }}" class="">
                @csrf
                <input type="number" id="form_id" name="form_id" hidden/>
                <div id="fb-reader" class="
                block w-full border border-gray-300 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none dark:placeholder-gray-400
                text-l text-black focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"></div>
                <input type="submit" value="Save" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" />
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="{{ URL::asset('assets/form-builder/form-render.min.js') }}"></script>
    <script>
        $(function() {
            $.ajax({
                type: 'get',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                },
                url: '{{ URL('get-form-builder') }}',
                data: {
                    'id': {{ $id }}
                },
                success: function(data) {
                    $("#form_id").val(data.id);
                    $('#fb-reader').formRender({
                        formData: data.content
                    });
                }
            });
        });
    </script>
@endsection
