@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Auto Component</h5> <small class="text-body float-end">Edit Auto Component </small>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('auto-components.update',$autoComponent->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                
                {{-- Link --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Link</label>
                        <input type="text" name="link" class="form-control" value="{{$autoComponent->link}}">
                        @error('link')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                    
                {{-- image --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        @error('image')
                            <x-error-component :message="$message" />
                        @enderror
                        <img src="{{ asset('storage/'.$autoComponent->image) }}" alt="" style="width: 50px; height: 50px;">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush

