@extends('layouts.app')
@section('content')
    <div class="container-fluid py-5">
        @if (session('success'))
            <li class="alert alert-success">{{ session('success') }}</li>
        @endif
        @php
            use App\Helpers\PageTitle;
        @endphp
        <div class="card shadow-sm border-0">
            <div class="card-header bg-secodary text-primary">
                <div class="d-flex justify-content-between w-100">
                    <h3 class="mb-0">{{ ucwords(PageTitle::getPageTitle()) }} List</h3>
                    <a data-bs-toggle="modal" data-bs-target="#social" class="btn btn-primary"><i class="bi bi-plus"></i> Add
                        {{ ucwords(PageTitle::getPageTitle()) }}</a>
                </div>
            </div>
            <div class="card-body">
                <table id="taskTable" class="table table-bordered table-striped align-middle" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">S.No</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($socialmedias as $key => $socialmedia)
                            <tr>
                                <td width="5%">{{ $key + 1 }}</td>
                                <td>{{ $socialmedia->name ?? '' }}</td>
                                <td>{{ $socialmedia->link ?? '' }}</td>
                                <td>
                                    <a class="text-warning"
                                        onclick="editSocialMedia({{ $socialmedia->id }}, '{{ $socialmedia->name }}', '{{ $socialmedia->link }}')"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a class="text-danger" onclick="deleteSocialMedia({{ $socialmedia->id }})"><i
                                            class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Add Social Media --}}
    <div class="modal fade" id="social" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('social.process') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="addressInput" placeholder=""
                                required>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <label for="addressInput"><i class="bi bi-facebook me-2"></i>Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="link" id="cityInput" placeholder="Link"
                                required>
                            <label for="cityInput"><i class="bi bi-link me-2"></i>Link</label>
                        </div>
                        <button class="btn btn-primary btn-sm" style="width: 100px; margin-left: 15px;"
                            type="submit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Edit Social Media --}}
    <div class="modal fade" id="editsocial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('social.update') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="socialname" placeholder=""
                                required>
                            <input type="hidden" name="social_id" id="socialid">
                            <label for="socialname"><i class="bi bi-facebook me-2"></i>Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="link" id="sociallink" placeholder="Link"
                                required>
                            <label for="sociallink"><i class="bi bi-link me-2"></i>Link</label>
                        </div>
                        <button class="btn btn-primary btn-sm" style="width: 100px; margin-left: 15px;"
                            type="submit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete Social Media --}}
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
                    <form id="deleteForm" method="POST" action="{{ route('social.delete') }}">
                        <!-- Include this for Laravel -->
                        @csrf
                        <input type="hidden" name="deleteid" id="sdeleteid">
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

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
        function editSocialMedia(id, name, link) {
            $('#socialname').val(name)
            $('#socialid').val(id)
            $('#sociallink').val(link)
            $('#editsocial').modal('show')
        }

        function deleteSocialMedia(id) {
            $('#sdeleteid').val(id);
            $('#deleteModal').modal('show');
        }
    </script>
        <script>
    $(document).ready(function () {
        $('#social').on('hidden.bs.modal', function () {
            location.reload(); // Page reload when modal is closed
        });
    });
</script>
@endsection
