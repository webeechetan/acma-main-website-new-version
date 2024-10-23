@extends('admin.layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Vehicle Report List</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Link</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($autoComponents as $component)
            <tr>
                <td>{{ $component->id }}</td>
                <td>
                    <img src="{{ asset('storage/'.$component->image) }}" alt="" style="width: 50px; height: 50px;">
                </td>
                <td>{{ $component->link }}</td>
                <td>
                    <a href="{{ route('auto-components.edit', $component->id) }}" >
                        <button type="button" class="btn rounded-pill btn-icon btn-primary btn-sm">
                            <span class="tf-icons bx bx-pencil "></span>
                        </button>
                    </a>
                    <form class="confirm-delete" action="{{ route('auto-components.destroy', $component->id) }}" method="POST" style="display: inline-block">
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