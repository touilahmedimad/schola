@extends('admin.layout.auth')

@section('content')
    <a href="{{ url('admin/grade') }}"> <button class="btn btn-default pull-right"> {{ trans('messages.cancel') }}</button></a>
    <h3>{{ trans('messages.grade_edit') }} </h3>
    <form class="form-horizontal" method="POST" action="{{ url('/admin/grade/'. $category->id )}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $category->name }}">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong> {{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <button class="btn btn-success pull-right" type="submit" >{{ trans('messages.save') }}</button>
    </form>
@endsection