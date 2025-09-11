@extends('layouts.app')
@section('content')
    <div class="container-fluid py-5">
@if (session('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="bi bi-check2-all me-2"></i> <!-- Double tick icon -->
        <div>{{ session('success') }}</div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="bi bi-x-circle-fill me-2"></i> <!-- Cross icon -->
        <div>{{ session('error') }}</div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        @if ($errors->any())
            <ul class="alert alert-danger d-flex align-items-center">
                @foreach ($errors->all() as $error)
                    <li><i class="bi bi-x-circle-fill me-2"></i> <!-- Cross icon -->{{ $error }}</li>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
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
                    <a data-bs-toggle="modal" data-bs-target="#banner" class="btn btn-primary"><i class="bi bi-plus"></i>Add
                        {{ ucwords(PageTitle::getPageTitle()) }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($banners as $key => $banner)
                        <div class="col-md-2 mb-4">
                            <div class="card h-100">

                                    <img src="{{ asset($banner->image) }}" class="card-img-top" alt="Banner Image"
                                        style="height: 180px; object-fit: cover;">

                                <div class="card-body pb-0">
                                    <h5 class="card-title lh-1">{{ $banner->title ?? 'No Title' }}</h5>
                                </div>
                                <p class="card-text mx-3 lh-0">{{ $banner->subtitle ?? 'No Subtitle' }}</p>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="{{ $banner->link }}" target="_blank" class="btn btn-sm btn-primary">Visit
                                        Link</a>
                                    <button class="btn btn-sm btn-warning"
                                        onclick="editBanner({{ $banner->id }})">Edit</button>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="deleteBanner({{ $banner->id }})">Delete</button>
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
                                <input type="file" id="image" name="image" class="form-control mb-2"
                                    accept="image/*" />
                                <img id="bimage" width="50px">
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
                    <h5 class="modal-title" id="deleteModalLabel"><i
                            class="bi bi-exclamation-triangle-fill me-2"></i>Confirm Deletion</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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

    </script>
@push('backend_script')

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
        function editBanner(id) {
            $.ajax({
                url: `banner-edit/${id}`,
                type: "GET",
                success: function(response) {
                    if (response.status === 'success') {
                        $('#btitle').val(response.data.title)
                        $('#bannerid').val(response.data.id)
                        $('#bsubtitle').val(response.data.subtitle)
                        $('#blink').val(response.data.link)
                        var img = new Image();
                        img.onload = function() {
                            $('#bimage').attr('src', response.data.image);
                        };
                        img.onerror = function() {
                            $('#bimage').attr('src',
                                "http://myapp.org:8080/pracfy/public/assets/img/No_Image_Available.jpg");
                        };
                        img.src = response.data.image;
                        $('#bsummernote').summernote('code', response.data.description);
                        $('#editbanner').modal('show');
                    } else {
                        $('#ajaxerrmsg').html(`<li class="alert alert-danger">${response.status}</li>`)
                    }
                }
            });
        }

        function deleteBanner(id) {
            $('#bdeleteid').val(id);
            $('#deleteModal').modal('show');
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#banner').on('hidden.bs.modal', function() {
                location.reload(); // Page reload when modal is closed
            });
        });
    </script>
        
@endpush
@endsection
