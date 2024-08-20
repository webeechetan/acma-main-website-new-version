@extends('admin.layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Members List</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>email</th>
                <th>User ID</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->user_id }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->website }}</td>
                    <td>
                        <a href="{{ route('members.edit', $member->id) }}" >
                            <button type="button" class="btn rounded-pill btn-icon btn-primary btn-sm">
                                <span class="tf-icons bx bx-pencil "></span>
                            </button>
                        </a>
                        <form class="confirm-delete" action="{{ route('members.destroy', $member->id) }}" method="POST" style="display: inline-block">
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
    {{ $members->links() }}
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend') }}/assets/js/confirm-delete.js"></script>
@endpush