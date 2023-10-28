@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN #content -->
    <div id="content" class="app-content">
        <!-- END breadcrumb -->
        <!-- BEGIN page-header -->
        <h1 class="page-header">
            {{ __("messages.Employees") }}
        </h1>
        <!-- END page-header -->
        <!-- BEGIN panel -->
        <div class="panel panel-inverse">
            <!-- BEGIN panel-heading -->
            <div class="panel-heading">
                <div class="panel-heading-btn d-flex justify-content-between w-100">
                    <span>
                        {{ __("messages.All Records") }}
                    </span>
                    <a href="{{ uri('employee/form') }}">{{ __("messages.Add Employee") }}</a>
                </div>
            </div>
            <!-- END panel-heading -->
            <!-- BEGIN panel-body -->
            <div class="panel-body">
                <div class="container">
                    <table id="table" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>{{ __("messages.ID") }}</th>
                                <th>{{ __("messages.Employee Name") }}</th>
                                <th>{{ __("messages.Boarder Number") }}</th>
                                <th>{{ __("messages.Payment Proof Number") }}</th>
                                <th>{{ __("messages.Iqama Number") }}</th>
                                <th>{{ __("messages.Iqama Date of Birth") }}</th>
                                <th>{{ __("messages.Iqama Expiry Date") }}</th>
                                <th>{{ __("messages.Employee Fees") }}</th>
                                <th>{{ __("messages.Requested Date") }}</th>
                                <th>{{ __("messages.Completed Date") }}</th>
                                <th>{{ __("messages.Is Invoice") }}</th>
                                <th>{{ __("messages.Comment") }}</th>
                                <th>{{ __("messages.Created By") }}</th>
                                <th>{{ __("messages.Created Date") }}</th>
                                <th>{{ __("messages.Updated By") }}</th>
                                <th>{{ __("messages.Updated Date") }}</th>
                                <th>{{ __("messages.Company ID") }}</th>
                                <th>{{ __("messages.Country ID") }}</th>
                                <th>{{ __("messages.Service ID") }}</th>
                                <th>{{ __("messages.Status ID") }}</th>
                                <th>{{ __("messages.User ID") }}</th>
                                <th>{{ __("messages.Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <script>
                    var $table;
                    $(document).ready(function() {
                        $table = $('#table');
                        $table.DataTable({
                            ajax: {
                                url: '/employee/get',
                                dataSrc: '',
                            },
                            columns: [
                                { data: 'ms_employee_id' },
                                { data: 'ms_employee_name' },
                                { data: 'ms_employee_boarder_nb' },
                                { data: 'ms_employee_payment_proof_nb' },
                                { data: 'ms_employee_iqama_nb' },
                                { data: 'ms_employee_iqama_dob' },
                                { data: 'ms_employee_iqama_expiry' },
                                { data: 'ms_employee_fees' },
                                { data: 'ms_employee_requested_date' },
                                { data: 'ms_employee_completed_date' },
                                { data: 'ms_employee_is_invoice' },
                                { data: 'ms_employee_comment' },
                                { data: 'ms_employee_created_by' },
                                { data: 'ms_employee_created_date' },
                                { data: 'ms_employee_updated_by' },
                                { data: 'ms_employee_updated_date' },
                                { data: 'ms_company_id' },
                                { data: 'ms_country_id' },
                                { data: 'ms_service_id' },
                                { data: 'ms_status_id' },
                                { data: 'ws_user_id' },
                                {
                                    data: null,
                                    render: function(data, type, row) {
                                        return `
                                        <a href='{{ uri("employee/form") }}/copy/${data.ms_employee_id}' class="btn btn-lg btn-warning ml-3"><i class="fa-solid fa-copy"></i></a>
                                        <a href='{{ uri("employee/form") }}/${data.ms_employee_id}' class="btn btn-lg btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button data-delete-record class="btn btn-lg btn-danger"><i class="fa-solid fa-delete-left"></i></button>`;
                                    }
                                },
                            ]
                        });

                        $('[data-add-record]').click(function() {
                            loadHtml('#addUpdateModal .modal-content', "{{ uri('employee/form') }}");
                            $('#addUpdateModal').modal('show');
                        });
                    });
                </script>
            </div>
            <!-- END panel-body -->
        </div>
        <!-- END panel -->
    </div>
    <!-- END #content -->
@endsection
