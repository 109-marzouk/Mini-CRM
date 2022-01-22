@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span style="float: left; font-size: 1.5em;">
                            {{ __('Employees of ' . $company->name) }}
                        </span>
                        <span style="float: right">
                            <a class="btn btn-primary"
                               href="{{ URL::route('employees.create') . '?company_id=' . $company->id }}">
                                Add new Employee
                            </a>
                        </span>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered yajra-datatable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>LinkedIn URL</th>
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
                ajax: "{{ route('company_employees.table', $company->id) }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {
                        data: 'email',
                        name: 'email',
                        render: function (data) {
                            return '<a href="mailto:' + data + '">' + data + '</a>';
                        }
                    },
                    {data: 'phone', name: 'phone'},
                    {
                        data: 'linkedin_url',
                        name: 'linkedin_url',
                        render: function (data) {
                            return '<a href="' + data + '" target="_blank">view profile<a>';
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
