@extends('admin.layouts.app')

@section('content')



<div class="card">

  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">All Docs List</h5> <small class="text-body float-end"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_alldocs_modal">
      Add All Doc
    </button></small>
  </div>
  
  <div class="table-responsive text-nowrap"> 
    <table class="table">
      <thead>
        <tr>
          <th>Sr.no</th>
          <th>Title</th>
          <th>Copy Url</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($alldocs as $alldoc)
          <tr>
            <td><span>{{ $alldoc->id }}</span></td>
            <td><span>{{ $alldoc->title }} </span></td>
            <td><span>{{ env('APP_URL') . '/storage/' . $alldoc->attachment }}</span></td>
            <td>         
              <form class="confirm-delete" action="{{ route('alldocs.destroy', $alldoc->id) }}" method="POST" style="display: inline-block">
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
<div class="modal animate__animated animate__flipInX" id="edit_alldocs_modal" tabindex="-1" aria-labelledby="flipInXAnimationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">

    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add AllDoc</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>

      <form method="POST" action="{{ route('alldocs.store') }}" enctype="multipart/form-data">
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
              <input class="form-control" type="file" name="doc_attachment" id="doc_attachment">
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="id" name="id">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Doc</button>
        </div>
      </form>
    </div>

  </div>
</div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend') }}/assets/js/confirm-delete.js"></script>

@endpush