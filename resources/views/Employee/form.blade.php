@extends('layouts.dashboard')


@section('content')
<script>
    $(document).ready(function(){

        $(document).ready(function(){
        $.ajax({
        url: '/getSelect', 
        type: 'GET',
        success: function(data) {
           
            $('#ms_company_id').empty();
          
            data.company.forEach(function(company) {
                $('#ms_company_id').append($('<option>', {
                    value: company.ms_company_id,
                    text: company.ms_company_name_en
                }));
            });

            $('#ms_country_id').empty();
          
          data.country.forEach(function(country) {
              $('#ms_country_id').append($('<option>', {
                  value: country.ws_country_id,
                  text: country.ws_country_name_en
              }));
          });

          $('#ms_service_id').empty();
          
          data.service.forEach(function(service) {
              $('#ms_service_id').append($('<option>', {
                  value: service.ms_service_id,
                  text: service.ms_service_name_en
              }));
          });

          $('#ms_status_id').empty();
          
          data.status.forEach(function(status) {
              $('#ms_status_id').append($('<option>', {
                  value: status.ms_status_id,
                  text: status.ms_status_name_en
              }));
          });

          $('#ms_user_id').empty();
          
          data.user.forEach(function(user) {
              $('#ms_user_id').append($('<option>', {
                  value: user.ws_user_id,
                  text: user.ws_user_first_name
              }));
          });
            
        },
        error: function() {
            console.error('Failed to fetch Data.');
        }
    });



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
                                location.href = "{{ uri('employee/list') }}";
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

    })
</script>
    <!-- BEGIN #content -->
    <div id="content" class="app-content">

        <!-- END breadcrumb -->
        <!-- BEGIN page-header -->
        <h1 class="page-header">
            Employee
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
                    <a href="{{ uri('employee/list') }}">All Record</a>
                </div>
            </div>
            <!-- END panel-heading -->
            <!-- BEGIN panel-body -->
            <div class="panel-body position-relative">
                {{ view('partials.loader') }}
                <form id="addUpdateForm" data-parsley-validate
                    action="{{ $action === 'add' ? uri('employee/add') : uri('employee/update', ['recordId' => $employee['ws_employee_id']]) }}"
                    method="POST">



                    @csrf
                    <input class="form-control" type="hidden" value="{{ $employee['ms_employee_id'] ?? '' }}" name="id" id="id">
                    
                    <label for="ms_company_id" class="col-form-label">Company:</label>
                    <select class="form-control" name="ms_company_id" id="ms_company_id">
                        <option value="">Select a company</option>
                    </select>
                
                    <label for="ms_country_id" class="col-form-label">Country:</label>
                    <select class="form-control" name="ms_country_id" id="ms_country_id">
                        <option value="">Select a country</option>
                    </select>
                
                    <label for="ms_service_id" class a="col-form-label">Service:</label>
                    <select class="form-control" name="ms_service_id" id="ms_service_id">
                        <option value="">Select a service</option>
                    </select>
                
                    <label for="ms_status_id" class="col-form-label">Status:</label>
                    <select class="form-control" name="ms_status_id" id="ms_status_id">
                        <option value="">Select a status</option>
                    </select>
                
                    <label for="ms_user_id" class="col-form-label">User:</label>
                    <select class="form-control" name="ms_user_id" id="ms_user_id">
                        <option value="">Select a user</option>
                    </select>
                
                    <div class="form-group">
                        <label for="ms_employee_name" class="col-form-label">Employee Name:</label>
                        <input class="form-control" type="text" value="{{ $employee['ms_employee_name'] ?? '' }}" name="ms_employee_name" id="ms_employee_name">
                    </div>
                
                    <div class="form-group">
                        <label for="ms_employee_boarder_nb" class="col-form-label">Boarder Number:</label>
                        <input class="form-control" type="text" value="{{ $employee['ms_employee_boarder_nb'] ?? '' }}" name="ms_employee_boarder_nb" id="ms_employee_boarder_nb">
                    </div>
                
                    <div class="form-group">
                        <label for="ms_employee_payment_proof_nb" class="col-form-label">Payment Proof Number:</label>
                        <input class="form-control" type="text" value="{{ $employee['ms_employee_payment_proof_nb'] ?? '' }}" name="ms_employee_payment_proof_nb" id="ms_employee_payment_proof_nb">
                    </div>
                
                    <div class="form-group">
                        <label for="ms_employee_iqama_nb" class="col-form-label">Iqama Number:</label>
                        <input class="form-control" type="text" value="{{ $employee['ms_employee_iqama_nb'] ?? '' }}" name="ms_employee_iqama_nb" id="ms_employee_iqama_nb">
                    </div>
                
                    <div class="form-group">
                        <label for="ms_employee_iqama_dob" class="col-form-label">Iqama Date of Birth:</label>
                        <input class="form-control" type="text" value="{{ $employee['ms_employee_iqama_dob'] ?? '' }}" name="ms_employee_iqama_dob" id="ms_employee_iqama_dob">
                    </div>
                
                    <div class="form-group">
                        <label for="ms_employee_iqama_expiry" class="col-form-label">Iqama Expiry Date:</label>
                        <input class="form-control" type="text" value="{{ $employee['ms_employee_iqama_expiry'] ?? '' }}" name="ms_employee_iqama_expiry" id="ms_employee_iqama_expiry">
                    </div>
                
                    <div class="form-group">
                        <label for="ms_employee_fees" class="col-form-label">Employee Fees:</label>
                        <input class="form-control" type="text" value="{{ $employee['ms_employee_fees'] ?? '' }}" name="ms_employee_fees" id="ms_employee_fees">
                    </div>
                
                    <div class="form-group">
                        <label for="ms_employee_requested_date" class="col-form-label">Requested Date:</label>
                        <input class="form-control" type="text" value="{{ $employee['ms_employee_requested_date'] ?? '' }}" name="ms_employee_requested_date" id="ms_employee_requested_date">
                    </div>
                
                    <div class="form-group">
                        <label for="ms_employee_completed_date" class="col-form-label">Completed Date:</label>
                        <input class="form-control" type="text" value="{{ $employee['ms_employee_completed_date'] ?? '' }}" name="ms_employee_completed_date" id="ms_employee_completed_date">
                    </div>
                
                    <div class="form-group">
                        <label for="ms_employee_is_invoice" class="col-form-label">Is Invoice:</label>
                        <input class="form-control" type="text" value="{{ $employee['ms_employee_is_invoice'] ?? '' }}" name="ms_employee_is_invoice" id="ms_employee_is_invoice">
                    </div>
                
                    <div class="form-group">
                        <label for="ms_employee_comment" class="col-form-label">Comment:</label>
                        <input class="form-control" type="text" value="{{ $employee['ms_employee_comment'] ?? '' }}" name="ms_employee_comment" id="ms_employee_comment">
                    </div>
                



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

@endsection
