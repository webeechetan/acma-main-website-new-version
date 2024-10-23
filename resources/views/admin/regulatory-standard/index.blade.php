@extends('admin.layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Regulatory Standard List</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Time</th>
            <th>Subject</th>
            <th>Place</th>
            <th>Notice Link</th>
            <th>Minutes Link</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $i = 1; @endphp
            @foreach($regulatory_standards as $regulatory)
            
            <tr>
                <td>{{ $i}}</td>
                <td>{{ $regulatory->meeting_date }}</td>
                <td>{{ $regulatory->meeting_time }}</td>
                <td>{{ Str::limit(strip_tags($regulatory->subject), 20, '...') }}</td>

                <td>{{ $regulatory->place }}</td>
                <td> 
                    
                    @if($regulatory->meeting_notice_link)

                        <a class="btn btn-primary btn-xs" href="{{ $regulatory->meeting_notice_link}}" target="_blank" >View Notice</a>
                    @else
                           NA
                    @endif

                </td>
                <td>
                    @if($regulatory->meeting_minutes)

                        <a class="btn btn-primary btn-xs" href="{{ $regulatory->meeting_minutes}}" target="_blank" >View Minutes</a>
                    @else
                           NA
                    @endif
                </td>
                <td>


                    <a href="{{ route('regulatory-standard.edit', $regulatory->id)}}" >
                        <button type="button" class="btn rounded-pill btn-icon btn-primary btn-sm">
                            <span class="tf-icons bx bx-pencil "></span>
                        </button>
                    </a>
                    <form class="confirm-delete" action="{{ route('regulatory-standard.destroy', $regulatory->id) }}" method="POST" style="display: inline-block">
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