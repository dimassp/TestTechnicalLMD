@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row margin-10 w-100 bg-primary" style="padding: 20px;">
            Edit Role
        </div>
        <br>
        <form action="{{ route('role.update', $item->id) }}" method="post">
            @csrf
            <div class="row margin-10 w-100" style="padding: 20px;">
                <div class="col-lg-12">
                    Role Name
                </div>
                <div class="col-lg-12 mt-2">
                    <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                </div>
                <div class="col-lg-12">
                    Role Code
                </div>
                <div class="col-lg-12 mt-2">
                    <input type="text" name="code" class="form-control" value="{{ $item->code }}">
                </div>
            </div>
            <div class="row margin-10 w-100" style="padding: 20px;">
                @foreach (\App\Models\Role::getMenuAccess() as $access)
                    <div class="col-lg-12">
                        @if ($item->checkAccess($access->key))
                            <input type="checkbox" name="access_control[{{ $access->key }}]" id="{{ $access->key }}"
                                checked="checked">
                        @else
                            <input type="checkbox" name="access_control[{{ $access->key }}]" id="{{ $access->key }}">
                        @endif
                        <label for="{{ $access->key }}">{{ $access->label }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-success" style="color: white !important">Save</button>
        </form>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
