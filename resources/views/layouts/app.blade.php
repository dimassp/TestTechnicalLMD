@extends('layouts.base')

@section('body')
    <body>
        <div style="display: flex;">
            @include('layouts.sidebar')
            @yield('content')
        </div>
    </body>
@endsection
