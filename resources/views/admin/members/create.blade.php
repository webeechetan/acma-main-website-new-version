@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Create Member</h5> <small class="text-body float-end">New Member</small>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                {{-- name --}}
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for="">Name</label>
                      <input name="name" type="text" class="form-control" id="" placeholder="john" value="{{old('name')}}">
                        @error('name')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- email --}}
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for="">Email</label>
                        <input name="email" type="email" class="form-control" id="" placeholder="john@gmail.com" value="{{old('email')}}">
                        @error('email')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- user_id --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">User ID</label>
                        <input type="text" name="user_id" class="form-control" id="" placeholder="User ID" value="{{old('user_id')}}">
                        @error('user_id')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- password --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Password</label> 
                      <span>
                        <small class="text-primary">
                             must contain at least 8 characters, including UPPER/lowercase and numbers.
                        </small>
                      </span>
                        <input type="password" name="password" class="form-control" id="" placeholder="Password" value="{{old('password')}}">
                        @error('password')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- phone --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Phone</label>
                        <input type="text" name="phone" class="form-control" id="" placeholder="Phone" value="{{old('phone')}}">
                        @error('phone')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- region --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Region</label>
                        <input type="text" name="region" class="form-control" id="" placeholder="Region" value="{{old('region')}}">
                        @error('region')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- company --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Company</label>
                        <input type="text" name="company" class="form-control" id="" placeholder="Company" value="{{old('company')}}">
                        @error('company')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- website --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Website</label>
                        <input type="text" name="website" class="form-control" id="" placeholder="Website" value="{{old('website')}}">
                        @error('website')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- trademark --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Trademark</label>
                        <input type="text" name="trademark" class="form-control" id="" placeholder="Trademark" value="{{old('trademark')}}">
                        @error('trademark')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- address --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Address</label>
                        <textarea class="form-control" name="address" id="address">{{ old('address') }}</textarea>
                        @error('address')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection


