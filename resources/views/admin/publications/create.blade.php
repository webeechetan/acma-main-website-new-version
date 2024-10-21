@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Create Publications</h5> <small class="text-body float-end">New Publications</small>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('publications.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                {{-- Category --}}
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for="">Publications Category</label>
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

                {{-- Title --}}

                <div class="col-md-6 ">
                    <div class="mb-6">
                      <label class="form-label" for="">Title</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Title" value="{{old('title')}}">
                        @error('title')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                
                {{-- description --}}

                <div class="col-md-12 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Description</label>
                        <textarea name="description" id="description">{{ old('description') }}</textarea>
                        @error('description')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>

                {{-- attachments --}}

                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Attachment</label>
                        <input type="file" name="attachment" class="form-control" id="attachment">
                        @error('attachment')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                    
                {{-- thumbnail --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                        @error('thumbnail')
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
        .create( document.querySelector( '#description' ), {
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
@endpush

