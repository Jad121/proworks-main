@extends('admin.layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{$tablename}}</h1>
    <div>
        Add to this table:
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FormModal" >
            <i class="fa-solid fa-add"></i>
        </button>

    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$tablename}}</h6>
        </div>
      
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            @foreach ($columns as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                            <th>Update</th>
                            <th>Delete</th>
                           
                        </tr>    
                    </thead>
                    <tfoot>
                        <tr>
                            @foreach ($columns as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                            <th>Update</th>
                            <th>Delete</th>
            
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $item)
                        @php
                             $idn=$tablename.'_id';

                        @endphp
                        
                       
                                 <tr>
                                    <form action="{{ route('editRecord', ['tablename' => $tablename, 'id' => $item->$idn]) }}" method="POST"> 
                                        @csrf
                                            @method('PUT')
                                    @foreach ($columns as $column)
                                            <td class="overflow-auto">
                                              <input type="text" name="{{$column}}" id="" value="{{ $item->$column }}"> 
                                            </td>        
                                    @endforeach
                                    <td>
                                        <button type="submit"  class="btn btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </form>
                                    <td>
                                        <form action="{{ route('admin.delete', ['tablename' => $tablename, 'id' => $item->$idn]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-delete-left"></i>
                                            </button>                              
                                         </form>
                                    </td>
                                   
                                        
                                   
                                </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
<div class="modal fade" id="FormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form id="form_add">
            @csrf
            @foreach ($columns as $column)
            <td class="overflow-auto">
              <label for="{{$column}}" class="col-form-label">{{$column}}:</label>
              <input class="form-control" type="text" name="{{$column}}" id="{{$column}}"> 
            </td>        
            @endforeach
            <input type="hidden" name="" id="tablename" value="{{$tablename}}">

          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addRecordSubmit">Add</button>
        </div>
      </div>
    </div>
  
  
  </div>
  
  

</div>
   <!-- Page level plugins -->
   <script src="{{asset("admin/vendor/datatables/jquery.dataTables.min.js")}}"></script>
   <script src="{{asset("admin/vendor/datatables/dataTables.bootstrap4.min.js")}}"></script>

   <!-- Page level custom scripts -->
   <script src="{{asset("admin/js/demo/datatables-demo.js")}}"></script>
   <script src="{{asset("admin/vendor/jquery/jquery.min.js")}}"></script>

   <script>
        $(document).ready(function() {
            $('#addRecordSubmit').click(function() {
                var formData = $('#form_add').serialize(); 
                var tn=$('#tablename').val()
                $.ajax({
                    type: 'POST',
                    url: '/dashboard/addRecord/'+tn,
                    data: formData,
                    success: function(response) {
                        $('#FormModal').modal('hide');
                    }
                });
            })
        })
   </script>

@endsection