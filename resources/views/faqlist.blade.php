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
        <div class="card shadow-sm border-0">
            <div class="card-header bg-secodary text-primary">
                <div class="d-flex justify-content-between w-100">
                    <h3 class="mb-0">{{ ucwords(PageTitle::getPageTitle()) }} List</h3>
                    <a data-bs-toggle="modal" data-bs-target="#faq" class="btn btn-primary"><i class="bi bi-plus"></i> Add
                        {{ ucwords(PageTitle::getPageTitle()) }}</a>
                </div>
            </div>
            <div class="card-body">
                <table id="taskTable" class="table table-bordered table-striped align-middle" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">S.No</th>
                            <th>Question</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $key => $faq)
                            <tr>
                                <td width="5%">{{ $key + 1 }}</td>
                                <td>{{ $faq->question ?? '' }}</td>
                                <td>
                                    <a class="text-warning edit-faq" data-id="{{ $faq->id }}"
                                        data-question="{{ $faq->question }}"
                                        data-description="{{ htmlspecialchars($faq->description) }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a class="text-danger" onclick="deletefaq({{ $faq->id }})"><i
                                            class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Add Faq --}}
    <div class="modal fade" id="faq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('faq.process') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="question" id="addressInput" placeholder=""
                                required>
                            <label for="addressInput"><i class="bi bi-facebook me-2"></i>Question</label>
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" rows="5" name="description" required></textarea>
                            <label><i class="bi bi-link me-2"></i>Description</label>
                        </div>
                        <button class="btn btn-primary btn-sm" style="width: 100px; margin-left: 15px;"
                            type="submit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Faq --}}
    <div class="modal fade" id="editfaq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('faq.update') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="question" id="qquestion" placeholder=""
                                required>
                            <label for="qquestion"><i class="bi bi-facebook me-2"></i>Question</label>
                            <input type="hidden" name="question_id" id="questionid">
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="description" id="qsummernote" required></textarea>
                            <label><i class="bi bi-link me-2"></i>Description</label>
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
                    <form id="deleteForm" method="POST" action="{{ route('faq.delete') }}">
                        @csrf
                        <input type="hidden" name="deleteid" id="fdeleteid">
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
            $('#qsummernote').summernote({
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
        $('.edit-faq').on('click', function() {
            const id = $(this).data('id');
            const question = $(this).data('question');
            const desc = $(this).data('description');

            $('#questionid').val(id);
            $('#qquestion').val(question);
            $('#qsummernote').summernote('code', desc);
            $('#editfaq').modal('show');
        });

        function deletefaq(id) {
            $('#fdeleteid').val(id);
            $('#deleteModal').modal('show');
        }
    </script>
        <script>
    $(document).ready(function () {
        $('#faq').on('hidden.bs.modal', function () {
            location.reload(); // Page reload when modal is closed
        });
    });
</script>
@endsection
