@extends('admin.layout.auth')

@section('content')

    <a href="{{ url('admin/teacher') }}"> <button class="btn btn-default pull-right"> {{ trans('messages.cancel') }}</button></a>
    <h3>{{ trans('messages.teacher_add') }} </h3>
    <form class="form-horizontal" name="myform" role="form" method="POST" action="{{ url('/admin/teacher') }}">
        {{ csrf_field() }}
        <input type="hidden" name="length" value="10">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">{{ trans('messages.name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">{{ trans('messages.email') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">{{ trans('messages.password') }}</label>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        <input id="password"  class="form-control" name="password">
                    </div>
                    <div class="col-md-2">

                        <input type="button" class="button" value="Generate" onClick="generate()" tabindex="2">
                    </div>
                </div>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="passwordconfirm" class="col-md-4 control-label">{{ trans('messages.password_confirmation') }}</label>

            <div class="col-md-6">
                <input id="passwordconfirm"  class="form-control" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="mail" value="1" checked>{{ trans('messages.send_email_data') }}
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    {{ trans('messages.save') }}
                </button>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        function randomPassword(length) {
            var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
            var pass = "";
            for (var x = 0; x < length; x++) {
                var i = Math.floor(Math.random() * chars.length);
                pass += chars.charAt(i);
            }
            return pass;
        }

        function generate() {
            var password = randomPassword(myform.length.value);
            var passwordconfirmation = password
            myform.password.value = password;
            myform.passwordconfirm.value = passwordconfirmation;
        }
    </script>

@endsection