@extends('admin.layout.auth')

@section('content')
    <h3>{{ trans('messages.grade_create') }} </h3>
    <form class="form-horizontal" method="POST" action="{{ url('/admin/grade') }}">
        {{ csrf_field() }}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" placeholder="Name">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong> {{ $errors->first('name') }}</strong>
                    </span>
                @endif

            </div>
        </div>
        <button class="btn btn-success pull-right" type="submit" >Submit</button>
    </form>
@endsection