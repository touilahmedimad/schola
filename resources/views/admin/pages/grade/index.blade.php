@extends('admin.layout.auth')

@section('content')
<h2>Grade Page </h2>
<a href="{{ url('/admin/grade/create') }}"> <button class="btn btn-success pull-right">{{ trans('messages.grade_btn_create') }}</button></a>
    @if(session('status'))
        <br/>
        <br/>
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
                <a href="{{ url('/admin/grade/update/'. $category->id)  }}"><button class="btn btn-default"> {{ trans('messages.edit') }}</button></a>
                <button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $category->id }}"> {{ trans('messages.delete') }}</button>
                <div class="modal fade" id="myModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-warning" id="myModalLabel">Warning</h4>
                            </div>
                            <div class="modal-body">
                                {{ trans('messages.warning_delete') }} : {{ $category->name }}
                            </div>
                            <div class="modal-footer">
                                <form action="{{ url('/admin/grade',$category->id)}}" method="post">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn btn-danger" type="submit"> {{ trans('messages.delete') }}</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>




@endsection