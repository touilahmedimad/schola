@extends('admin.layout.auth')

@section('content')
<h2>Grade Page </h2>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@endsection