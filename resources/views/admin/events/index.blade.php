@extends('admin.layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Events List</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Category</th>
            <th>Event Name</th>
            <th>About</th>
            <th>Location</th>
            <th>Event Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($events as $event)
            
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->category->name }}</td>
                <td>{{Str::limit($event->title, 10,'...')}}</td>
                <td>{{ Str::limit(strip_tags($event->about_us), 20, '...') }}</td>

                <td>{{ strip_tags($event->location) }}</td>
                <td>{{ $event->event_date}}</td>
                <td>
                    <a href="" >
                        <button type="button" class="btn rounded-pill btn-icon btn-primary btn-sm">
                            <span class="tf-icons bx bx-pencil "></span>
                        </button>
                    </a>
                    <form class="confirm-delete" action="{{ route('eventmasters.destroy', $event->id) }}" method="POST" style="display: inline-block">
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