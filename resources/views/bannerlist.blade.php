@extends('layouts.app')
@section('content')
    <div class="container-fluid py-5">
        @if (session('success'))
            <li class="alert alert-success">{{ session('success') }}</li>
        @endif
        @if (session('error'))
            <li class="alert alert-danger">{{ session('error') }}</li>
        @endif
        @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <div id="ajaxerrmsg"></div>
        <div class="card shadow-sm border-0">
            <div class="card-header bg-secodary text-primary">
                <div class="d-flex justify-content-between w-100">
    @php
      use App\Helpers\PageTitle;
    @endphp
                    <h3 class="mb-0">{{ ucwords(PageTitle::getPageTitle()) }} List</h3>
                    <a data-bs-toggle="modal" data-bs-target="#banner" class="btn btn-primary"><i class="bi bi-plus"></i>Add {{ ucwords(PageTitle::getPageTitle()) }}</a>
                </div>
            </div>
<div class="card-body">
    <div class="row">
        @foreach ($banners as $key => $banner)
            <div class="col-md-2 mb-4">
                <div class="card h-100">
                    <img src="{{ $banner->image }}" class="card-img-top" alt="Banner Image" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title mb-2">{{ $banner->title ?? 'No Title' }}</h5>
                        <p class="card-text">{{ $banner->subtitle ?? 'No Subtitle' }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ $banner->link }}" target="_blank" class="btn btn-sm btn-primary">Visit Link</a>
                        <button class="btn btn-sm btn-warning" onclick="editBanner({{ $banner->id }})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteBanner({{ $banner->id }})">Delete</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

        </div>
    </div>

{{-- Add Form --}}
    <div class="modal fade" id="banner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="post" action="{{ route('banner.process') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row p-2">
                            <div class="col-md-12 mb-3">
                                <label for="title">Title<span class="text-danger">*</span></label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Enter title" />
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control"
                                    placeholder="Enter title" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" id="subtitle" name="subtitle" class="form-control"
                                    placeholder="Enter subtitle" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="link">Link</label>
                                <input type="text" id="link" name="link" class="form-control"
                                    placeholder="Enter Link" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control" accept="image/*" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="summernote" class="form-control mb-2" placeholder="Write something about..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"
                                style="width: 100px; margin-left: 15px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Form --}}
        <div class="modal fade" id="editbanner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="post" action="{{ route('banner.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row p-2">
                            <div class="col-md-12 mb-3">
                                <label for="title">Title</label>
                                <input type="text" id="btitle" name="title" class="form-control"
                                    placeholder="Enter title" required />
                                <input type="hidden" id="bannerid" name="banner_id" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" id="bsubtitle" name="subtitle" class="form-control"
                                    placeholder="Enter subtitle" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="link">Link</label>
                                <input type="text" id="blink" name="link" class="form-control"
                                    placeholder="Enter Link" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control mb-2" accept="image/*" />
                                <img id="bimage" width="25px">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="bsummernote" class="form-control mb-2" placeholder="Write something about..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"
                                style="width: 100px; margin-left: 15px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete About --}}
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="deleteModalLabel"><i class="bi bi-exclamation-triangle-fill me-2"></i>Confirm Deletion</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <p class="fs-5">Are you sure you want to <strong>permanently delete</strong> this item?</p>
            <p class="text-muted small">This action cannot be undone.</p>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <form id="deleteForm" method="POST" action="{{ route('banner.delete') }}">
            <!-- Include this for Laravel -->
            @csrf
            <input type="hidden" name="deleteid" id="bdeleteid">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </form>
        </div>
        </div>
    </div>
    </div>


    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
       
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $('#taskTable').DataTable({
                "pagingType": "simple_numbers",
                "lengthMenu": [5, 10, 25, 50],
                "language": {
                    "search": "🔍 Search:",
                    "lengthMenu": "Show _MENU_ entries",
                    "paginate": {
                        "previous": "&laquo;",
                        "next": "&raquo;"
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
        $(document).ready(function() {
            $('#asummernote').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
    <script>
       function editBanner(id){
            $.ajax({
                url: `banner-edit/${id}`,
                type: "GET",
                success: function(response){
                    if(response.status === 'success'){
                        $('#btitle').val(response.data.title)
                        $('#bannerid').val(response.data.id)
                        $('#bsubtitle').val(response.data.subtitle)
                        $('#blink').val(response.data.link)
                        $('#bimage').attr('src', response.data.image)
                        $('#bsummernote').summernote('code', response.data.description);
                        $('#editbanner').modal('show');
                    }else{
                        $('#ajaxerrmsg').html(`<li class="alert alert-danger">${response.status}</li>`)
                    }
                }
            });
       }

       function deleteBanner(id){
           $('#bdeleteid').val(id);
           $('#deleteModal').modal('show');
       }
    </script>
        <script>
    $(document).ready(function () {
        $('#banner').on('hidden.bs.modal', function () {
            location.reload(); // Page reload when modal is closed
        });
    });
</script>
@endsection
