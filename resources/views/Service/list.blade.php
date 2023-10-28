@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN #content -->
    <div id="content" class="app-content">
        <!-- END breadcrumb -->
        <!-- BEGIN page-header -->
        <h1 class="page-header">
            {{ __("messages.Services") }}
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
                    <a href="{{ uri('service/form') }}">{{ __("messages.New Record") }}</a>
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
                                <th>{{ __("messages.Service Name English") }}</th>
                                <th>{{ __("messages.Service Name Arabic") }}</th>
                                <th>{{ __("messages.Service Name Chinese") }}</th>
                                <th>{{ __("messages.Service Fee") }}</th>
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
                                url: '/service/get',
                                dataSrc: '',
                            },
                            columns: [
                                { data: 'ms_service_id' },
                                { data: 'ms_service_name_en' },
                                { data: 'ms_service_name_ar' },
                                { data: 'ms_service_name_cn' },
                                { data: 'ms_service_fees' },
                                {
                                    data: null,
                                    render: function(data, type, row) {
                                        return `
                                        <a href='{{ uri("service/form") }}/copy/${data.ms_service_id}' class="btn btn-lg btn-warning ml-3">
                                            <i class="fa-solid fa-copy"></i>
                                        </a>
                                        <a href='{{ uri("service/form") }}/${data.ms_service_id}' class="btn btn-lg btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button data-delete-record class="btn btn-lg btn-danger">
                                            <i class="fa-solid fa-delete-left"></i>
                                        </button>`;
                                    }
                                },
                            ]
                        });

                        $('[data-add-record]').click(function() {
                            loadHtml('#addUpdateModal .modal-content', "{{ uri('service/form') }}");
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
