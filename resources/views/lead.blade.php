@extends('layouts.app')

@section('content')

  
        <div class="d-flex justify-content-between align-item-center mb-3">
          <span style="font-size:20px;align-content:center;"><span style="color:grey; font-size:18px;">Dashboard /</span>Leads</span>
          <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Leads</button>
        </div>
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                    <table id="lead-table" class="table table-striped">
                    <thead  class="fw-bold">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Email</th>
                            <th scope="col">City</th>
                            <th scope="col">Project Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($leads as $lead)
                        <tr>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->contact }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->city }}</td>
                            <td>{{ $lead->project_name }}</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Lead</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('lead.store') }}" method="post">
          @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Contact</label>
            <input type="tel" class="form-control" id="recipient-name" name="contact">
          </div>
          <div class="mb-3">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="recipient-name" name="email">
          </div>
          <div class="mb-3">
              <label for="" class="form-label">City</label>
              <select class="form-select form-select-md" name="city">
                <option selected>Select one</option>
                <option value="Manchester">Manchester</option>
                <option value="London">London</option>
                <option value="Sheftusbury">Sheftusbury</option>
              </select>
            </div>
            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Project Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="project_name">
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
@endsection