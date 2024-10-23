@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Create Event</h5> <small class="text-body float-end">New Event</small>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('event_masters.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for="">Event Category</label>
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
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for="">Event Title</label>
                      <input name="event_title" type="text" class="form-control" id="" placeholder="Title" value="{{old('event_title')}}">
                        @error('event_title')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                
                {{-- date --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Event Date</label>
                        <input type="date" name="event_date" class="form-control" id="" placeholder="" value="{{ old('event_date') }}">
                        @error('event_date')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">URL</label>
                      <input type="text" name="url" class="form-control" id="url" placeholder="URL" value="{{old('url')}}">
                        @error('url')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>

                {{-- About us --}}
                <div class="col-md-12 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">About Us</label>
                        <textarea name="about_us" id="about_us">{{ old('about_us') }}</textarea>
                        @error('about_us')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>

                {{-- Location --}}
                <div class="col-md-12 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Location</label>
                        <textarea name="location" id="location">{{ old('location') }}</textarea>
                        @error('location')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>

                {{-- attachments --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Event Image</label>
                        <input class="form-control" type="file" name="event_attachment" id="event_attachment">
                    </div>
                </div>

                {{-- key words --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">How to Get There</label>
                        <input type="text" name="howto" class="form-control" id="key_words" placeholder="">
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
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css">
<style>
    .ck-editor__editable_inline:not(.ck-comment__input *) {
    height: 300px;
    overflow-y: auto;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font,
        List,
        Indent,
        IndentBlock,
        Alignment,
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#about_us' ), {
            plugins: [ Essentials, Paragraph, Bold, Italic, Font, List, Indent, IndentBlock, Alignment ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor',
                'bulletedList', 'numberedList', '|',
                'indent', 'outdent', 'indentBlock', '|',
                'alignment', '|',
            ],
        } )
        .then( editor => {
            window.editor = editor;

        } )
        .catch( error => {
            console.error( error );
        } );
</script>

<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font,
        List,
        Indent,
        IndentBlock,
        Alignment,
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#location' ), {
            plugins: [ Essentials, Paragraph, Bold, Italic, Font, List, Indent, IndentBlock, Alignment ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor',
                'bulletedList', 'numberedList', '|',
                'indent', 'outdent', 'indentBlock', '|',
                'alignment', '|',
            ],
        } )
        .then( editor => {
            window.editor = editor;

        } )
        .catch( error => {
            console.error( error );
        } );
</script>


<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<script>
    var input = document.querySelector('input[name=key_words]'),
        tagify = new Tagify(input, {
            whitelist: [],
            dropdown: {
                classname: "color-blue",
                enabled: 0,
                maxItems: 5
            }
        });
</script>
@endpush

