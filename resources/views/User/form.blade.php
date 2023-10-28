
@extends('layouts.dashboard')

@section('content')
<!-- BEGIN #content -->
<div id="content" class="app-content">

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">
        User
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
                <a href="{{ uri('user/list') }}">All Record</a>
            </div>
        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body position-relative">
            {{ view('partials.loader') }}
            <form id="addUpdateForm" data-parsley-validate
                action="{{ $action === 'add' ? uri('user/add') : uri('user/update', ['recordId' => $user['ws_user_id']]) }}"
                method="POST">
                @csrf
                <input class="form-control" type="hidden" value="{{$user["id"]??''}}" name="id" id="id"> 


                <label for="ws_user_fname" class="col-form-label">ws_user_fname:</label>
                <input class="form-control" type="text" value="{{$user["ws_user_first_name"]??''}}" name="ws_user_fname" id="ws_user_fname"> 

                <label for="ws_user_lname" class="col-form-label">ws_user_lname:</label>
                <input class="form-control" type="text"   value="{{$user["ws_user_last_name"]??''}}" name="ws_user_lname" id="ws_user_lname"> 

                <label for="ws_user_email" class="col-form-label">ws_user_email:</label>
                <input class="form-control" type="text"  value="{{$user["ws_user_email"]??''}}" name="ws_user_email" id="ws_user_email"> 

                <label for="ws_user_password" class="col-form-label">ws_user_password:</label>
                <input class="form-control" type="text" name="ws_user_password" id="ws_user_password"  value="{{$user["ws_user_password"]??''}}"> 

                <label for="ws_user_address" class="col-form-label">ws_user_address:</label>
                <input class="form-control" type="text" name="ws_user_address" id="ws_user_address"  value="{{$user["ws_user_address"]??''}}"> 

                <label for="ws_user_phone" class="col-form-label">ws_user_phone:</label>
                <input class="form-control" type="text" name="ws_user_phone" id="ws_user_phone"  value="{{$user["ws_user_phone"]??''}}"> 


                <label for="ws_user_address" class="col-form-label">ws_user_country:</label>
                <select id="countryDropdown" class="form-control" name="countryDropdown">
                    <option value="0" selected>Select a Country</option>
                </select>
                
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
        $.ajax({
        url: '/getCountries', 
        type: 'GET',
        success: function(countries) {
           
            $('#countryDropdown').empty();
            // Add countries to the dropdown
            countries.forEach(function(country) {
                $('#countryDropdown').append($('<option>', {
                    value: country.ws_country_id,
                    text: country.ws_country_name_en
                }));
            });
            
        },
        error: function() {
            console.error('Failed to fetch countries.');
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
