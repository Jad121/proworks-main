@extends('layouts.dashboard')

@section('content')
<!-- BEGIN #content -->
<div id="content" class="app-content">

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        Status
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
                <a href="{{ uri('status/list') }}">All Record</a>
            </div>
        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body position-relative">
            {{ view('partials.loader') }}
            <form id="addUpdateForm" data-parsley-validate
                action="{{ $action === 'add' ? uri('status/add') : uri('status/update', ['recordId' => $status['ms_status_id']]) }}"
                method="POST">
                @csrf
                <input class="form-control" type="hidden" value="{{$status["ms_status_id"]??''}}" name="id" id="id"> 
        
        
                <label for="ms_status_name_en" class="col-form-label">status Name English:</label>
                <input class="form-control" type="text" value="{{$status["ms_status_name_en"]??''}}" name="ms_status_name_en" id="ms_status_name_en"> 
        
                <label for="ms_status_name_ar" class="col-form-label">ms_status_name_ar:</label>
                <input class="form-control" type="text"   value="{{$status["ms_status_name_ar"]??''}}" name="ms_status_name_ar" id="ms_status_name_ar"> 
        
                <label for="ms_status_name_cn" class="col-form-label">ms_status_name_cn:</label>
                <input class="form-control" type="text"  value="{{$status["ms_status_name_cn"]??''}}" name="ms_status_name_cn" id="ms_status_name_cn">
                
                <label for="ms_status_key" class="col-form-label">ms_status_key:</label>
                <input class="form-control" type="text"  value="{{$status["ms_status_key"]??''}}" name="ms_status_key" id="ms_status_key">
                
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
                            location.href = "{{ uri('status/list') }}";
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
