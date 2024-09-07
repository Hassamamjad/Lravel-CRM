@extends('layouts.app')

@section('content')

  
        <div class="d-flex justify-content-between align-item-center mb-3">
          <span style="font-size:20px;align-content:center;"><span style="color:grey; font-size:18px;">Dashboard /</span>Users</span>
          <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add User</button>
        </div>
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                    <table id="user-table" class="table table-striped">
                    
                    </table>
                  </div>
                </div>
              </div>
            </div>
        
        <!-- content-wrapper ends -->

<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="createUserForm" action="">
          @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email</label>
            <input type="text" class="form-control" id="recipient-name" name="email">
          </div>
          <div class="mb-3">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Password</label>
            <input type="password" class="form-control" id="recipient-name" name="password">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Position</label>
            <input type="text" class="form-control" id="recipient-name" name="position">
          </div>
          <div class="mb-3">
              <label for="" class="form-label">Role</label>
              <select class="form-select form-select-md" name="role" id="">
              @foreach($roles as $role)
                <option value="{{ $role?->id }}">{{ $role->name }}</option>
                @endforeach
              </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success text-white">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
     $(document).ready(function() {
      $('#user-table').DataTable({
    "processing": true,
    "serverSide": true, // Enable server-side processing
    "ajax": {
        "url": "/api/userList", // Your API endpoint
        "type": "GET",
        "dataSrc": function (json) {
            // Verify data structure
            console.log(json);
            return json.data;
        }
    },
    "columns": [
        { "data": "name" }, // Name column
        { "data": "email" }, // Name column
        { 
            "data": "role", // Access the role object directly
            render: function(data, type, row) {
                // Check if the role object and its name property exist
                return  `${row?.role?.name}`;
            }
        },
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                       <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-xs me-3 btn-success"><i class="mdi mdi-eye text-white"></i></button>
                          <button type="button" class="btn btn-xs me-3 btn-warning"><i class="mdi mdi-lead-pencil text-white"></i></button>
                          <button type="button" class="btn btn-sm me-3 btn-danger" onclick="deleteUser(${row?.id})"><i class="mdi mdi-delete text-white"></i></button>
                        </div>
                          </td>`;
            }
        }
    ],
    "pageLength": 10, // Number of rows per page
    "lengthMenu": [5, 10, 25, 50], // Page length options
    "pagingType": "simple_numbers" // Pagination controls
});
$('#createUserForm').on('submit', function(event) {
        event.preventDefault(); 

        $.ajax({
            url: "/api/user-create", 
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $('#user-table').DataTable().ajax.reload(); 
                $('#exampleModal').modal('hide'); 
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while creating the user');
            }
        });
    });
        });

        function deleteUser(id){
          $.ajax({
            url: `http://127.0.0.1:8000/api/user-delete/${id}`, 
            type: "delete",
            success: function(response) {

              $(`#user-table button[onclick="${id}"]`).closest('tr').remove();

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while creating the user');
            }
        });
        }
</script>
@endsection