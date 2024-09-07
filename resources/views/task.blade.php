@extends('layouts.app')

@section('content')
<a href="http://127.0.0.1:8000/images/1725359431.pdf" download>download</a>
  
        <div class="d-flex justify-content-between align-item-center mb-3">
          <span style="font-size:20px;align-content:center;"><span style="color:grey; font-size:18px;">Dashboard /</span>Tasks</span>
          <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Create Task</button>
        </div>
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table table-striped">
                      <thead  class="fw-bold">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Project Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Target Date</th>
                            <th scope="col">Assigned User</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Download File</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->project_type }}</td>
                                <td>{{ $task->status }}</td>
                                <td>{{ $task->target_date }}</td>
                                <td>{{ $task->user->name }}</td>
                                <td>{{ $task->notes }}</td>
                                <td> 
                                  @if ($task->attachment)
                                    <a href="{{ $task->attachment }}" target="blank"><i class="mdi mdi-download-box icon-md mx-4 text-primary"></i></a>
                                    @else
                                    <i class="mdi mdi-download-off-outline icon-md mx-4 text-secondary">
                                    @endif
                                </td>
                                <td>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">Delete</i></button>
                               </form>
                                </td>
                            </tr>
                            @endforeach
                      </tbody>
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
        <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
        <form action="{{route('tasks.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name" placeholder="Add Title" name="title">
          </div>
          <div class="mb-3">
              <label for="" class="form-label">Project Type</label>
              <select class="form-select form-select-md" name="project_type" id="">
                <option selected value="Accounting">Accounting</option>
                <option value="Data Science">Data Science</option>
                <option value="Biology">Biology</option>
                <option value="Chemistry">Chemistry</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Status</label>
              <select class="form-select form-select-md" name="status" id="">
                <option selected value="New<">New</option>
                <option value="In Proegress">In Proegress</option>
                <option value="Completed">Completed</option>
                <option value="Submission">Submission</option>
              </select>
            </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Target Date</label>
            <input type="date" class="form-control" id="recipient-name" name="target_date">
          </div>
          <div class="mb-3">
              <label for="" class="form-label">Priority:</label>
              <select class="form-select form-select-md" name="priority" id="">
                <option selected>Low</option>
                <option value="Normal">Normal</option>
                <option value="High">High</option>
                <option value="Urgent">Urgent</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Assign To:</label>
              <select class="form-select form-select-md" name="user_id" id="">
             @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
              </select>
            </div>
            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Additional Notes</label>
            <textarea type="text" class="form-control" id="recipient-name" placeholder="Add Notes.." name="notes"></textarea>
          </div>
         
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Attach File:</label>
                <input type="file" class="form-control" id="recipient-name" name="attachment">
             </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success text-white">Assign</button>
      </div>
      </form>
    
    
    </div>
  </div>
</div>
@endsection