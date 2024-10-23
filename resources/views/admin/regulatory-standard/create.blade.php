@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Create Regulatory Standard</h5> <small class="text-body float-end"></small>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('regulatory-standard.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                {{-- date --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Meeting Date</label>
                        <input type="date" name="meeting_date" class="form-control" id="" placeholder="" value="{{ old('meeting_date') }}">
                        @error('meeting_date')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for="">Meeting Time</label>
                      <input name="meeting_time" type="text" class="form-control" id="" placeholder="Meeting Time" value="{{old('meeting_time')}}">
                        @error('meeting_time')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                

                {{-- About us --}}
                <div class="col-md-12 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Subject</label>
                        <textarea name="subject" id="subject">{{ old('subject') }}</textarea>
                        @error('subject')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Place of Meeting</label>
                      <input type="text" name="place" class="form-control" id="place" placeholder="place" value="{{old('place')}}">
                        @error('place')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Meeting Notice Link</label>
                      <input type="text" name="meeting_link" class="form-control" id="meeting_link" placeholder="place" value="{{old('meeting_link')}}">
                        @error('meeting_link')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>


                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Meeting Minutes Link</label>
                      <input type="text" name="meeting_minutes" class="form-control" id="meeting_minutes" placeholder="place" value="{{old('meeting_minutes')}}">
                        @error('meeting_minutes')
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
        .create( document.querySelector( '#subject' ), {
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

