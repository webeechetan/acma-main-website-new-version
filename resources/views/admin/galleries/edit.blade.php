@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Gallery</h5> <small class="text-body float-end">Edit Gallery</small>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('galleries.update',$gallery->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for="">Category</label>
                        <select name="category_id" class="form-select" id="">
                            @foreach($categories as $category)
                                @if($gallery->category_id == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- title --}}
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for=""> Title</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Title" value="{{$gallery->title}}">
                        @error('title')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- date --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Date</label>
                        <input type="date" name="date" class="form-control" id="" placeholder="" value="{{$gallery->date }}">
                        @error('date')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- attachments --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Attachments</label>
                        <input accept="image/*" type="file" name="attachments[]" class="form-control" id="attachments" placeholder="" multiple>
                    </div>
                    <ul class="list-group mt-2">
                      @foreach($gallery->attachments as $attachment)
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <a href="{{ asset('storage/'.$attachment->path) }}" target="_blank" download>{{ $attachment->name }}</a>
                              <a href="{{ route('gallery.delete-attachment', ['attachment'=>$attachment->id]) }}">
                                  <span class="badge badge-center bg-danger"><i class="bx bx-trash"></i></span>
                              </a>
                          </li>
                      @endforeach
                  </ul>
                </div>                
            </div>
            <button type="submit" class="btn btn-primary mt-3">Send</button>
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

