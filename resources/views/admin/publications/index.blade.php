@extends('admin.layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Publications List</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Thumbnail</th>
            <th>File</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($publications as $publication)
            <tr>
                <td>{{ $publication->id }}</td>
                <td>{{Str::limit($publication->title, 50,'...')}}</td>
                <td>{{ $publication->category->name }}</td>
                <td>
                    <img src="{{ asset('storage/'.$publication->thumbnail) }}" alt="" width="50">
                </td>
                <td>
                    <a href="{{ asset('storage/'.$publication->file) }}" target="_blank" class="btn btn-primary btn-sm">View</a>
                </td>
                
                <td>
                    <a href="{{ route('publications.edit', $publication->id) }}" >
                        <button type="button" class="btn rounded-pill btn-icon btn-primary btn-sm">
                            <span class="tf-icons bx bx-pencil "></span>
                        </button>
                    </a>
                    <form class="confirm-delete" action="{{ route('publications.destroy', $publication->id) }}" method="POST" style="display: inline-block">
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend') }}/assets/js/confirm-delete.js"></script>
@endpush