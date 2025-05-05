@extends('layouts.app')
@section('content')
<h1>
    Page User
</h1>
    <div class="container-fluid">
        <div class="row margin-10  w-100" style="padding: 20px">
            <div class="panel float">
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                        <table class="table table-hover" id="master_table">
                            <thead>
                                <tr class="theader">
                                    <th>Role Name</th>
                                    <th>Role Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            var table = $('#master_table').DataTable({
                "processing": true,
                "serverSide": true,
                "searching": false,
                "paging": false,
                "ajax": "{{ route('role.search') }}",
            });
        });
    </script>
@endsection
