@extends('admin.layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Sliders List</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Images</th>
            <th>Title</th>
            <th>Type</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($sliders as $slider)
            <tr>
                <td>{{ $slider->id }}</td>
                <td>
                    <img src="{{ asset('storage/'.$slider->image) }}" alt="" style="width: 100px; height: 100px;">
                </td>
                <td>{{Str::limit($slider->title, 50,'...')}}</td>
                <td>{{ ucfirst($slider->type) }}</td>
                <td>
                    
                    <a href="{{ route('sliders.edit', $slider->id) }}" >
                        <button type="button" class="btn rounded-pill btn-icon btn-primary btn-sm">
                            <span class="tf-icons bx bx-pencil "></span>
                        </button>
                    </a>
                    <form class="confirm-delete" action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display: inline-block">
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
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery.js@2.7.2/dist/css/lg-thumbnail.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery.js@2.7.2/dist/css/lg-fullscreen.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend') }}/assets/js/confirm-delete.js"></script>

    <script>
            
    </script>
@endpush