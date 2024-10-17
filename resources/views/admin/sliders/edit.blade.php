@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Update Slide</h5> <small class="text-body float-end">Update Slide</small>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('sliders.update',$slider->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                {{-- type --}}
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for=""> Type</label>
                      <select name="type" class="form-select" id="">
                        <option value="hero"
                        @if($slider->type == 'hero')
                            selected
                        @endif
                        >Hero</option>
                        <option
                        @if($slider->type == 'event')
                            selected
                        @endif
                         value="event">Event</option>
                      </select>
                        @error('type')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                
                {{-- title --}}
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for=""> Title</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Title" value="{{ $slider->title }}">
                        @error('title')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- image --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Image</label>
                        <input accept="image/*" type="file" name="image" class="form-control" >
                        @error('image')
                            <x-error-component :message="$message" />
                        @enderror
                        <img src="{{ asset('storage/'.$slider->image) }}" alt="" style="width: 100px; height: 100px;">
                    </div>
                </div>      
                {{--  Link  --}}

                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Link</label>
                      <input type="text" name="link" class="form-control" id="" placeholder="Link" value="{{$slider->link}}">
                        @error('link')
                            <x-error-component :message="$message" />
                        @enderror
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
