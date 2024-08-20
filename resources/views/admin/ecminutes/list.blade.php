@extends('admin.layouts.app')

@section('content')



<div class="card">

  <h5 class="card-header">EC-Minute List</h5>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#flipInXAnimationModal">
  Add Minutes
</button>


  
  <div class="table-responsive text-nowrap"> 
    <table class="table">
      <thead>
        <tr>
          <th>Sr.no</th>
          <th>Title</th>
          <th>Upload Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">

        @foreach($ecminutes as $ecminute)
        <tr>
          <td><span>{{ $ecminute->id }}</span></td>
          <td><span>{{ $ecminute->title }} </span></td>
          <td> {{ $ecminute->attachment}} </td>
          
        
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
</div>



<!-- Modal -->
<div class="modal animate__animated animate__flipInX" id="flipInXAnimationModal" tabindex="-1" aria-labelledby="flipInXAnimationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">

    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Minutes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>

      <form method="POST" action="{{ route('add.ecminutes') }}">
        @csrf
        <div class="modal-body">
          <div class="row">
          
            <div class="mb-3 col">
              <label for="nameFlipInX" class="form-label">Title</label>
              <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title">
            </div>
          </div>
          <div class="row">
          
            <div class="mb-3 col mb-0">
              <label for="formFile" class="form-label">Default file input example</label>
              <input class="form-control" type="file" name="ec_attachment" id="ec_attachment	">
            </div>

            <div class="mb-3 col mb-0">
              <label for="dobFlipInX" class="form-label">Upload Date</label>
              <input type="date" id="upload_date" name="upload_date" class="form-control" >
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Minutes</button>
        </div>
      </form>
    </div>

  </div>
</div>




  

@endsection