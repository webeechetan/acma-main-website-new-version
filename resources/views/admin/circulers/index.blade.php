@extends('admin.layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Circulers List</h5>
    <div class="table-responsive text-nowrap">
        {{ $dataTable->table() }}
    </div>
  </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('backend') }}/assets/js/confirm-delete.js"></script>
<script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush