@extends('admin.layouts.app')
@section('content')

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">EC-Minute List</h5> <small class="text-body float-end"> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_ecminute_modal">
      Add Minutes
    </button></small>
  </div>
  
  
  <div class="table-responsive text-nowrap"> 
    <table class="table">
      <thead>
        <tr>
          <th>Sr.no</th>
          <th>Title</th>
          <th>Upload Date</th>
          <th>Attachement</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($ecminutes as $ecminute)
        {{-- {{ json_encode($ecminute->attachment->path)}} --}}
          <tr>
            <td><span>{{ $ecminute->id }}</span></td>
            <td><span>{{ $ecminute->title }} </span></td>
            <td>{{ $ecminute->upload_date}}</td>
            <td>
             
            
                <a href="{{ env('APP_URL') }}/storage/{{ $ecminute->attachment?->path }}">
                    <img alt="img1" src="{{ asset('storage/' . $ecminute->attachment?->path ) }}" height="100" width="100" /> 
                </a>
            </td>
            <td>         
              <button type="button" class="btn rounded-pill btn-icon btn-primary btn-sm edit_ecminute"  data-bs-toggle="modal" data-bs-target="#edit_ecminute_modal" data-id="{{ $ecminute->id }}" data-title="{{ $ecminute->title }}" data-upload-date="{{ $ecminute->upload_date }}">
                <span class="tf-icons bx bx-pencil "></span>
              </button>
              <form class="confirm-delete" action="{{ route('ecminutes.destroy', $ecminute) }}" method="POST" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn rounded-pill btn-icon btn-danger btn-sm">
                    <span class="tf-icons bx bx-trash "></span>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal animate__animated animate__flipInX" id="edit_ecminute_modal" tabindex="-1" aria-labelledby="flipInXAnimationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Minutes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>

      <form method="POST" action="{{ route('ecminutes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="mb-3 col">
              <label for="nameFlipInX" class="form-label">Title</label>
              <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter Title">
              @error('title')
                <x-error-component :message="$message" />
              @enderror
            </div>
          </div>
          <div class="row">
          
            <div class="mb-3 col mb-0">
              <label for="formFile" class="form-label">Attachement</label>
              <input class="form-control" type="file" name="ec_attachment" id="ec_attachment">
            </div>

            <div class="mb-3 col mb-0">
              <label for="dobFlipInX" class="form-label">Upload Date</label>
              <input type="date" id="upload_date" name="upload_date" value="{{ old('upload_date') }}" class="form-control">
              @error('upload_date')
                <x-error-component :message="$message" />
              @enderror
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="id" name="id">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Minutes</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend') }}/assets/js/confirm-delete.js"></script>

    <script>
      $(document).ready(function() {   
             $(".edit_ecminute").click(function(e){
              e.preventDefault();
                    
              let id = $(this).data("id");       
              let title = $(this).data("title");
              let upload_date = $(this).data("upload-date");
              let ec_attachment = $(this).data("upload-attachment");
           
              $('#id').val(id);
              $('#title').val(title);
              $('#upload_date').val(upload_date);
              $('#ec_attachment').val(ec_attachment);
 
          });
      });
    </script>
@endpush