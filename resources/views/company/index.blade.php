@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span style="float: left; font-size: 1.5em;">
                            {{ __('Companies') }}
                        </span>
                        <span style="float: right">
                            <a class="btn btn-primary" href="{{ URL::route('companies.create') }}">Add new company</a>
                        </span>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered yajra-datatable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website URL</th>
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

@section('custom_js')
    <script type="text/javascript">
        $(function () {

            let table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ URL::route('companies.table') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {
                        data: 'email',
                        name: 'email',
                        render: function (data) {
                            return '<a href="mailto:' + data + '">' + data + '</a>';
                        }
                    },
                    {
                        data: 'logo',
                        name: 'logo',
                        render: function (data) {
                            return '<img ' +
                                ' class="rounded-circle border d-flex justify-content-center align-items-center"' +
                                ' src="' + data + '"' +
                                ' style="width:50px;height:50px;margin: 0 auto"' +
                                ' alt="Company Logo">';
                        }
                    },
                    {
                        data: 'website_url',
                        name: 'website_url',
                        render: function (data) {
                            return '<a href="' + data + '" target="_blank">Visit</a>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endsection
