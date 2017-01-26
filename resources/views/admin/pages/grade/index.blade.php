@extends('admin.layout.auth')

@section('content')
<h2>Grade Page </h2>
<a href="{{ url('/admin/grade/create') }}"> <button class="btn btn-success pull-right">{{ trans('messages.grade_btn_create') }}</button></a>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>{{ trans('messages.id') }}</th>
            <th>{{ trans('messages.name') }}</th>
            <th>{{ trans('messages.control') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category )
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td> {{ $category->name }}</td>
            <td>
                <a href="{{ url('/admin/grade/update/'. $category->id)  }}"><button class="btn btn-default"> {{ trans('messages.modify') }}</button></a>
                <a href="{{ url('/admin/grade/destroy/'. $category->id)  }}"><button class="btn btn-danger"> {{ trans('messages.delete') }}</button></a>
            </td>
        </tr>
        @endforeach
    </table>




@endsection