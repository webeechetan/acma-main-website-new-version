@extends('admin.layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Gallery List</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Images</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($galleries as $gallery)
            <tr>
                <td>{{ $gallery->id }}</td>
                <td>
                    <a href="javascript:void(0)" class="show_lightgallery" data-images='{{ json_encode($gallery->attachments) }}'>
                        
                        <div id="gallery_id_{{ $gallery->id }}" class="create_lightgallery">
                            @foreach($gallery->attachments as $attachment)
                                <a href="{{ asset('storage/'.$attachment->path) }}" data-lg-size="1600-2400"
                                    @if(!$loop->first)
                                        class="d-none"
                                    @endif
                                    >
                                    <img alt="img1" src="{{ asset('storage/'.$attachment->path) }}"  height="100" width="100" />
                                </a>
                            @endforeach
                        </div>
                        
                    </a>
                </td>
                <td>{{Str::limit($gallery->title, 50,'...')}}</td>
                <td>{{ $gallery->category->name }}</td>
                <td>{{ $gallery->date }}</td>
                <td>
                    <a href="javascript:void(0)" class="change_status btn_id_{{$gallery->id}}" data-status="{{ $gallery->status }}" data-id="{{ $gallery->id }}">
                        @if($gallery->status == 1)
                            <button type="button" class="btn rounded-pill btn-icon btn-success btn-sm">
                                <span class="tf-icons bx bx-check "></span>
                            </button>
                        @else
                            <button type="button" class="btn rounded-pill btn-icon btn-danger btn-sm">
                                <span class="tf-icons bx bx-x "></span>
                            </button>
                        @endif
                    </a>
                    <a href="{{ route('galleries.edit', $gallery->id) }}" >
                        <button type="button" class="btn rounded-pill btn-icon btn-primary btn-sm">
                            <span class="tf-icons bx bx-pencil "></span>
                        </button>
                    </a>
                    <form class="confirm-delete" action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" style="display: inline-block">
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
    {{-- {{ $galleries->links() }} --}}
    <div id="lightgallery" class="d-none">
        
    </div>
  </div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery.js@2.7.2/dist/css/lg-thumbnail.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery.js@2.7.2/dist/css/lg-fullscreen.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend') }}/assets/js/confirm-delete.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js@2.7.2/dist/js/lg-thumbnail.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js@2.7.2/dist/js/lg-fullscreen.min.js"></script>

    <script>
        $(document).on('click', '.change_status', function(){
            var status = $(this).data('status');
            var id = $(this).data('id');
            if(status == 1){
                status = 0;
            }else{
                status = 1;
            }
            $.ajax({
                url: "{{ route('galleries.change-status') }}",
                type: "POST",
                data: {
                    id: id,
                    status: status,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response){
                    if(response.status){
                        
                        let message = status == 1 ? 'Gallery is active' : 'Gallery is inactive';
                        if(status == 1){
                            $(".btn_id_"+id).html('<button type="button" class="btn rounded-pill btn-icon btn-success btn-sm"><span class="tf-icons bx bx-check "></span></button>');
                        }else{
                            $(".btn_id_"+id).html('<button type="button" class="btn rounded-pill btn-icon btn-danger btn-sm"><span class="tf-icons bx bx-x "></span></button>');
                        }
                        Swal.fire(
                            message
                        );

                        $(".btn_id_"+id).data('status', status);

                    }
                }
            });
        });


        // Ensure the gallery is initialized properly

        var galleries = document.querySelectorAll('.create_lightgallery');

        galleries.forEach(function(gallery){
            lightGallery(gallery, { 
                speed: 500,
                download: true,
                thumbnail: true,
                animateThumb: true,
                showThumbByDefault: true,
                counter: true,
                selector: 'a',
                mode: 'lg-fade',
            });
        });

            
    </script>
@endpush