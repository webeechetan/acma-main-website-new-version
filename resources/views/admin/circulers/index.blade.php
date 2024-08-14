@extends('admin.layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Circulers List</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Circuler No</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Key Words</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($circulers as $circuler)
            <tr>
                <td>{{ $circuler->id }}</td>
                <td>{{ $circuler->circuler_no }}</td>
                <td>{{Str::limit($circuler->title, 50,'...')}}</td>
                <td>{{ $circuler->circuler_date }}</td>
                <td>{{ $circuler->category->name }}</td>
                <td>
                    @foreach($circuler->key_words as $key_word)
                        <span class="badge bg-primary">{{ $key_word }}</span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('circulers.edit', $circuler->id) }}" >
                        <button type="button" class="btn rounded-pill btn-icon btn-primary btn-sm">
                            <span class="tf-icons bx bx-pencil "></span>
                        </button>
                    </a>
                    <form class="confirm-delete" action="{{ route('circulers.destroy', $circuler->id) }}" method="POST" style="display: inline-block">
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