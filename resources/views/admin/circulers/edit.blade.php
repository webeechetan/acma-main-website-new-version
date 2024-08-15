@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Circuler</h5> <small class="text-body float-end">Edit Circuler</small>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('circulers.update',$circuler->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for="">Circuler Category</label>
                        <select name="category_id" class="form-select" id="">
                            @foreach($categories as $category)
                                @if($circuler->category_id == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-6">
                      <label class="form-label" for="">Circuler NO</label>
                      <input name="circuler_no" type="text" class="form-control" id="" placeholder="ACMA/2024-25" value="{{$circuler->circuler_no}}">
                        @error('circuler_no')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Circuler Title</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Title" value="{{$circuler->title}}">
                        @error('title')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- date --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Circuler Date</label>
                        <input type="date" name="circuler_date" class="form-control" id="" placeholder="" value="{{ $circuler->circuler_date }}">
                        @error('circuler_date')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>
                {{-- description --}}
                <div class="col-md-12 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Description</label>
                        <textarea name="description" id="description">{{ $circuler->description }}</textarea>
                        @error('description')
                            <x-error-component :message="$message" />
                        @enderror
                    </div>
                </div>

                {{-- attachments --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Attachments</label>
                        <input type="file" name="attachments[]" class="form-control" id="attachments" placeholder="" multiple>
                        @error('attachments')
                            <x-error-component :message="$message" />
                        @enderror
                        <ul class="list-group mt-2">
                            @foreach($circuler->attachments as $attachment)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ asset('storage/'.$attachment->path) }}" target="_blank" download>{{ $attachment->name }}</a>
                                    <a href="{{ route('circulers.delete-attachment', ['circuler' => $circuler->id,'attachment'=>$attachment->id]) }}">
                                        <span class="badge badge-center bg-danger"><i class="bx bx-trash"></i></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- key words --}}
                <div class="col-md-6 mt-2">
                    <div class="mb-6">
                      <label class="form-label" for="">Key Words</label>
                        <input type="text" name="key_words" class="form-control" id="key_words" placeholder="" value="{{ implode(',',$circuler->keywords) }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
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
