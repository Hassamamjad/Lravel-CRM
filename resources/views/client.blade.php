@extends('layouts.app')

@section('content')

  
        <div class="d-flex justify-content-between align-item-center mb-3">
          <span style="font-size:20px;align-content:center;"><span style="color:grey; font-size:18px;">Dashboard /</span>Clients</span>
          <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Client</button>
        </div>
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table table-striped">
                      <thead  class="fw-bold">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">date</th>
                            <th scope="col">City</th>
                            <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <td>{{$client->name}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->contact}}</td>
                            <td>{{$client->date}}</td>
                            <td>{{$client->city}}</td>
                            <td>{{$client->status}}</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('client.store')}}" method="post">
          @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="recipient-name" name="email">
          </div>
          <div class="mb-3">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Contact</label>
            <input type="tel" class="form-control" id="recipient-name" name='contact'>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="date" class="form-control" id="recipient-name" name='date'>
          </div>
          <div class="mb-3">
              <label for="" class="form-label">City</label>
              <select class="form-select form-select-md" name="city">
                <option selected>Select one</option>
                <option value="Manchester">Manchester</option>
                <option value="London">London</option>
                <option value="Coney">Coney</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Status</label>
              <select class="form-select form-select-md" name="status" id="">
                <option selected>Select one</option>
                <option value="New<">New</option>
                <option value="On Hold">On Hold</option>
                <option value="Under Review">Under Review</option>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Submission">Submission</option>
              </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-success text-white">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection