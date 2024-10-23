@extends('admin.layouts.app')

@section('content')

<div class="row">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-6">
          <div class="card ">
            <div class="card-body text-center">
              <p class="mb-1">Members</p>
              <h4 class="card-title mb-3">{{ $membersCount }}</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-6">
            <div class="card ">
              <div class="card-body text-center">
                <p class="mb-1">Circulars</p>
                <h4 class="card-title mb-3">{{ $circulersCount }}</h4>
              </div>
            </div>
          </div>
          <div class="col-lg-12 mt-2">
            <div class="card ">
              <div class="card-body">
                <p class="">Payments</p>
                <div class="table-responsive text-nowrap">
                  {{ $dataTable->table() }}
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
@endpush

@push('scripts')
<script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('backend') }}/assets/js/confirm-delete.js"></script>
@endpush

