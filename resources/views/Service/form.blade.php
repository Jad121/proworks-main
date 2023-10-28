@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN #content -->
    <div id="content" class="app-content">

        <!-- END breadcrumb -->
        <!-- BEGIN page-header -->
        <h1 class="page-header">
            Services
        </h1>
        <!-- END page-header -->
        <!-- BEGIN panel -->
        <div class="panel panel-inverse">
            <!-- BEGIN panel-heading -->
            <div class="panel-heading">

                <div class="panel-heading-btn d-flex justify-content-between w-100">
                    <span>
                        New Record
                    </span>
                    <a href="{{ uri('service/list') }}">All Record</a>
                </div>
            </div>
            <!-- END panel-heading -->
            <!-- BEGIN panel-body -->
            <div class="panel-body position-relative">
                {{ view('partials.loader') }}
                <form id="addUpdateForm" data-parsley-validate
                    action="{{ $action === 'add' ? uri('service/add') : uri('service/update', ['recordId' => $service['ms_service_id']]) }}"
                    method="POST">
                    @csrf
                    <input class="form-control" type="hidden" value="{{$service["ms_service_id"]??''}}" name="id" id="id"> 


                    <label for="ms_service_name_en" class="col-form-label">service Name English:</label>
                    <input class="form-control" type="text" value="{{$service["ms_service_name_en"]??''}}" name="ms_service_name_en" id="ms_service_name_en"> 

                    <label for="ms_service_name_ar" class="col-form-label">ms_service_name_ar:</label>
                    <input class="form-control" type="text"   value="{{$service["ms_service_name_ar"]??''}}" name="ms_service_name_ar" id="ms_service_name_ar"> 

                    <label for="ms_service_name_cn" class="col-form-label">ms_service_name_cn:</label>
                    <input class="form-control" type="text"  value="{{$service["ms_service_name_cn"]??''}}" name="ms_service_name_cn" id="ms_service_name_cn">
                    
                    <label for="ms_service_fees" class="col-form-label">ms_service_fees:</label>
                    <input class="form-control" type="text"  value="{{$service["ms_service_fees"]??''}}" name="ms_service_fees" id="ms_service_fees">
                    
                    @if ($action == 'add')
                        <button class="btn btn-lg btn-success px-5">
                            Add
                        </button>
                    @else
                        <button class="btn btn-lg btn-primary px-5">
                            Update
                        </button>
                        <button class="btn btn-lg btn-danger px-5">
                            delete
                        </button>
                    @endif

                </form>

            </div>
            <!-- END panel-body -->

        </div>
        <!-- END panel -->
    </div>
    <!-- END #content -->


    <script>
        $(document).ready(function() {

            $("#addUpdateForm").submit(function(e) {
                e.preventDefault();

                if ($(".parsley-required").length) {
                    //form is not valid
                    return;
                }
                 
                $("#formLoader").removeClass("d-none");
                var action = $(this).attr("action");
                var formData = $(this).serialize();
                $.ajax({
                    method: "post",
                    url: action,
                    headers: csrfHeader(),
                    data: formData,
                    complete: function() {
                        $("#formLoader").addClass("d-none");
                    },
                    success: function(response) {
                        toast(response);

                        if (response.status == "success") {
                            setTimeout(function() {
                                location.href = "{{ uri('service/list') }}";
                            }, 1000);
                        }

                    },
                    error: function(jqXHR, exception) {

                        toast({
                            message: jqXHR.statusText,
                            type: "danger",
                            duration: 5000,
                            style: "top:5rem !important"
                        });
                    }

                });

            });

        })
    </script>
@endsection
