@extends('layouts.app')

@section('content')


    <div class="alert alert-success" id="success" style="display: none">
        message successfully
    </div>
    <div class="content text-center">
    {!! Form::open(['method'=>'POST', 'id'=>'offerForm', 'files'=>true]) !!}
{{--        <form method="POST">--}}

        <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Viewer') !!}
            {!! Form::text('viewer', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
{{--            {!! Form::submit('send', ['class'=>'btn btn-success']) !!}--}}
            {!! Form::label('Image') !!}
            <br>
            {!! Form::file('photo') !!}
            <br>
            <button id="saveOffer" class="btn btn-success">Send</button>
        </div>
        {!! Form::close() !!}
{{--        </form>--}}
    </div>

@stop

@section('scripts')
    <script>
        $(document).on('click', '#saveOffer', function (e) {

            e.preventDefault();
            let formData = new FormData($('#offerForm')[0]);
        $.ajax({
            type:'POST',
            enctype:'multipart/form-data',
            url:'{{ route('ajax.store') }}',
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            success: function( data ) {
                if(data.stu == true){
                    alert(data.msg)
                    $('#success').show().text(data.msg);


                }

            },error: function( reject ) {

            },
        });
        });

    </script>


@stop
