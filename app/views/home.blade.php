@extends('layouts/default')

@section('content')
    <div class='row'>
        <div class="col-sm-5"></div>
        <div class='col-sm-2'>
            {{ Form::open((['route' => 'sessions.store','class'=>'form-inline login-form','role'=>'form'])) }}
            {{-- Login attempt fails, show a message --}}
            @if(Session::get('message'))
                <?php echo '<h4 class="red text-center">' . Session::get('message') . '</h4>'; ?>
            @endif

                <div class='form-group'>
                    {{ Form::label('username','Enter Username:',array('class'=>'sr-only')) }}
                    {{ Form::text('username',null,array('class'=>'form-control','placeholder'=>'Enter Username')) }}
                    <p>{{ $errors->first('username', '<span class="error red">:message</span>') }}</p>
                </div><br>
                <div class='form-group'>
                    {{ Form::label('password','Enter Password:',array('class'=>'sr-only')) }}
                    {{ Form::password('password',array('class'=>'form-control login-pass','placeholder'=>'Enter Password')) }}
                    <p>{{ $errors->first('password', '<span class="error red">:message</span>') }}</p>
                </div>
                <div class="text-center">
                    {{ Form::submit('Login',array('class'=>'btn btn-default')) }}
                </div>
            {{ Form::close() }}
        </div>
        <div class="col-sm-5"></div>
    </div>
@stop