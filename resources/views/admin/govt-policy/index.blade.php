@extends('admin.layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Govt Policy List</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Policy</th>
            <th>Category</th>
            <th>Year</th>
            <th>State</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">

          @php $i = 1; @endphp 
           @foreach($policies as $policy)
           
            <tr>
                <td>{{ $i }} </td>
                <td>{{$policy->policy}}</td>
                <td>{{ $policy->category->name}}</td>
                <td>{{ $policy->year }}</td>
                <td>{{ $policy->state }}</td>
                <td>
                    
                    <a href="{{ route('govt-policy.edit',$policy->id )}}" >
                        <button type="button" class="btn rounded-pill btn-icon btn-primary btn-sm">
                            <span class="tf-icons bx bx-pencil "></span>
                        </button>
                    </a>
                    <form class="confirm-delete" action="{{ route('govt-policy.destroy', $policy->id )}}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn rounded-pill btn-icon btn-danger btn-sm">
                            <span class="tf-icons bx bx-trash "></span>
                        </button>
                    </form>
                </td>
            </tr>

            <?php $i++; ?>
            @endforeach
           
        </tbody>
      </table>
    </div>
    {{-- {{ $galleries->links() }} --}}
    <div id="lightgallery" class="d-none">
        
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
   
@endpush