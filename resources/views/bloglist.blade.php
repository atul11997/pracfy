@extends('layouts.app')
@section('content')
    <div class="container-fluid py-5">
        @if (session('success'))
            <li class="alert alert-success">{{ session('success') }}</li>
        @endif
        @if (session('error'))
            <li class="alert alert-danger">{{ session('error') }}</li>
        @endif
    @php
      use App\Helpers\PageTitle;
    @endphp
          <div id="ajaxerrmsg"></div>
        <div class="card shadow-sm border-0">
            <div class="card-header bg-secodary text-primary">
                <div class="d-flex justify-content-between w-100">
                    <h3 class="mb-0">{{ ucwords(PageTitle::getPageTitle()) }} List</h3>
                    <a data-bs-toggle="modal" data-bs-target="#blog" class="btn btn-primary"><i class="bi bi-plus"></i> Add {{ ucwords(PageTitle::getPageTitle()) }}</a>
                </div>
            </div>
            <div class="card-body">
                <table id="taskTable" class="table table-bordered table-striped align-middle" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $key => $blog)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $blog->title ?? '' }}</td>
                                <td><img src="{{ $blog->image ?? '' }}" width="25px"></td>
                                <td>
                                    <a class="text-warning" onclick="editBlog({{ $blog->id }})"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a class="text-danger" onclick="deleteBlog({{ $blog->id }})"><i
                                            class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Add Blog --}}
    <div class="modal fade" id="blog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('blog.process') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" id="title" placeholder=""
                                required>
                            <label for="title">Title</label>
                            <input type="hidden" class="form-control" value="{{ Auth::id() }}" name="userid">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="image" accept="image/*" id="image" placeholder=""
                                required>
                            <label for="image">Image</label>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" id="summernote" name="description" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm" style="width: 100px; margin-left: 15px;"
                            type="submit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Blog --}}
        <div class="modal fade" id="editblog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('blog.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" id="btitle" placeholder=""
                                required>
                            <label for="btitle">Title</label>
                            <input type="hidden" name="blog_id" id="blogid">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="image" accept="image/*" id="image" placeholder=""
                                >
                            <label for="image">Image</label>
                            <img id="bimage" width="25px">
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" id="bsummernote" name="description" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm" style="width: 100px; margin-left: 15px;"
                            type="submit">Save</button>
                </div>
                </form>
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
            <form id="deleteForm" method="POST" action="{{ route('blog.delete') }}">
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
            $('#summernote2').summernote({
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
        function editBlog(id) {
            $.ajax({
                url: `blog-edit/${id}`,
                type: "GET",
                success: function(response) {
                    if (response.status === 'success') {
                        $('#btitle').val(response.data.title)
                        $('#blogid').val(response.data.id)
                        $('#bimage').attr('src', response.data.image)
                        $('#summernote2').summernote('code', response.data.description);
                        $('#editblog').modal('show');
                    } else {
                        $('#ajaxerrmsg').html(`<li class="alert alert-danger">${response.status}</li>`)
                    }
                }
            });
        }

        function deleteBlog(id){
          $('#bdeleteid').val(id)
          $('#deleteModal').modal('show');
        }
    </script>
        <script>
    $(document).ready(function () {
        $('#blog').on('hidden.bs.modal', function () {
            location.reload(); // Page reload when modal is closed
        });
    });
</script>
@endsection
