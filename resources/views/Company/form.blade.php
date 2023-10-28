@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN #content -->
    <div id="content" class="app-content">
        <!-- END breadcrumb -->
        <!-- BEGIN page-header -->
        <h1 class="page-header">
            Countries
        </h1>
        <!-- END page-header -->
        <!-- BEGIN panel -->
        <div class="panel panel-inverse">
            <!-- BEGIN panel-heading -->
            <div class="panel-heading">
                <div class="panel-heading-btn d-flex justify-content-between w-100">
                    <span>
                        @if ($action == 'add')
                            Add Company
                        @else
                            Update Company
                        @endif
                    </span>
                    <a href="{{ route('country.list') }}">All Record</a>
                </div>
            </div>
            <!-- END panel-heading -->
            <!-- BEGIN panel-body -->
            <div class="panel-body position-relative">
                {{ view('partials.loader') }}
                <form id="addUpdateForm" data-parsley-validate
                    action="{{ $action === 'add' ? uri('company/add') : uri('company/update', ['recordId' => $company['ms_company_id']]) }}"
                    method="POST">
                    @csrf
                    <input class="form-control form-control-lg" type="hidden" value="{{ $company['ms_company_id'] ?? '' }}"
                        name="id" id="id">
                    <div class="form-group">
                        <label for="ms_company_name_en" class="col-form-label">Name(En)</label>
                        <input class="form-control form-control-lg" type="text"
                            value="{{ $company['ms_company_name_en'] ?? '' }}" name="ms_company_name_en"
                            id="ms_company_name_en">
                    </div>
                    <div class="form-group">
                        <label for="ms_company_name_ar" class="col-form-label">Name(AR)</label>
                        <input class="form-control form-control-lg" type="text" dir="rtl"
                            value="{{ $company['ms_company_name_ar'] ?? '' }}" name="ms_company_name_ar"
                            id="ms_company_name_ar">
                    </div>
                    <div class="form-group">
                        <label for="ms_company_name_cn" class="col-form-label">Name(CN)</label>
                        <input class="form-control form-control-lg" type="text"
                            value="{{ $company['ms_company_name_cn'] ?? '' }}" name="ms_company_name_cn"
                            id="ms_company_name_cn">
                    </div>
                    <div class="modal-footer justify-content-center p-2 m-2">
                        @if ($action == 'add')
                            <button class="btn btn-lg btn-success px-5">Add</button>
                        @else
                            <button class="btn btn-lg btn-primary px-5">Update</button>
                        @endif
                    </div>
                </form>
            </div>
            <!-- END panel-body -->
        </div>
        <!-- END panel -->
    </div>
    <!-- END #content -->
</section>

<script>
    $(document).ready(function() {
        $("#addUpdateForm").submit(function(e) {
            e.preventDefault();

            if ($(".parsley-required").length) {
                // The form is not valid
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
                            location.href = "{{ route('country.list') }}"; // Redirect to the country list page
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
    });
</script>

@endsection