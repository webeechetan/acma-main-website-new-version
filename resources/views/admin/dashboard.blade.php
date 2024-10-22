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
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Sr.No</th>
                      <th scope="col">Billing Details</th>
                      <th scope="col">Company Name</th>
                      <th scope="col">Event Details</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Order ID</th>
                      <th scope="col">Form Name</th>
                      <th scope="col">Order Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($payments as $key => $payment)
                    <tr>
                      <th scope="row">{{ $key + 1 }}</th>
                      <td >
                        Name : {{ $payment->name }}
                        <br>
                        Designation : {{ $payment->designation }}
                        <br>
                        Email : {{ $payment->email }}
                        <br>
                        Phone : {{ $payment->phone }}
                        <br>
                        GST No : {{ $payment->gst_no }}
                        <br>
                        Address : {{ $payment->address }}
                      </td>
                      <td>{{ $payment->company_name }}</td>
                      <td>{{ $payment->event_details }}</td>
                      <td>{{ $payment->amount }}</td>
                      <td>{{ $payment->order_id }}</td>
                      <td>{{ $payment->form_name }}</td>
                      <td>{!! $payment->gateway_response !!}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $payments->links() }}
              </div>
            </div>
          </div>
      </div>
  </div>

@endsection

