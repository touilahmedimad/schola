
@extends('admin.layout.auth')

@section('content')
<h2>{{ trans('messages.teacher_page') }} </h2>
<a href="{{ url('/admin/teacher/create') }}"> <button class="btn btn-success pull-right">{{ trans('messages.teacher_btn_create') }}</button></a>
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
            <th>{{ trans('messages.name') }}</th>
            <th>{{ trans('messages.email') }}</th>
            <th>{{ trans('messages.control') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher )
        <tr>
            <td> {{ $teacher->name }}</td>
            <td> {{ $teacher->email }}</td>
            <td>
                <button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $teacher->id }}"> {{ trans('messages.delete') }}</button>
                <div class="modal fade" id="myModal{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-warning" id="myModalLabel">{{ trans('messages.warning') }}</h4>
                            </div>
                            <div class="modal-body">
                                {{ trans('messages.warning_delete') }} : {{ $teacher->name }}
                            </div>
                            <div class="modal-footer">
                                <form action="{{ url('/admin/teacher',$teacher->id)}}" method="post">
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

<div style="text-align: center">
    {{ $teachers->links() }}
</div>





@endsection