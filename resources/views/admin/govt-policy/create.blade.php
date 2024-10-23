@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Create Policy</h5> <small class="text-body float-end">New Policy</small>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('govt-policy.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for="">Category</label>
                        <select name="category_id" class="form-select" id="">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- title --}}
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for="">Policy</label>
                      <input type="text" name="policy" class="form-control" id="" placeholder="Title" value="{{old('policy')}}">
                        @error('policy')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- date --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Year</label>
                        <input type="text" name="year" class="form-control" id="" placeholder="" value="{{ old('year') }}">
                        @error('year')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">State</label>
                        <input type="text" name="state" class="form-control" id="" placeholder="" value="{{ old('state') }}">
                        @error('state')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- attachments --}}
                <div class="col-md-6 mt-2">
                  <div class="mb-6">
                      <label class="form-label" for="">Attachments</label>
                      <input accept=".pdf,.doc,.docx,image/*" type="file" name="attachment" class="form-control" id="attachment">
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

@push('styles')

@endpush

@push('scripts')

@endpush

