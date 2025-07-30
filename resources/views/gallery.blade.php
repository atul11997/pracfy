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
                    <a data-bs-toggle="modal" data-bs-target="#gallery" class="btn btn-primary"><i class="bi bi-plus"></i> Add {{ ucwords(PageTitle::getPageTitle()) }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @foreach ($photos as $key => $photo)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 position-relative">
                            <div class="border rounded shadow-sm overflow-hidden">
                                <img src="{{ $photo->photos_upload ?? '' }}" alt="Photo {{ $key + 1 }}"
                                    class="img-fluid w-100" style="height: 150px; object-fit: cover;">
                                <a class="btn btn-danger w-100" onclick="deletePhoto({{ $photo->id }})" title="Remove">
                                    Remove
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Add Address --}}
    <!-- Modal -->
    <div class="modal fade" id="gallery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <form method="POST" action="{{ route('gallery.process') }}" enctype="multipart/form-data"
                        id="galleryForm">
                        @csrf

                        <!-- Drag & Drop Upload -->
                        <div id="drop-area" class="border border-primary rounded p-4 text-center mb-3">
                            <p>Drag & Drop Photos Here or Click to Upload</p>
                            <p><span></p>
                            <p><span class="text-danger">Note: </span>Five Images Uploaded At a Time </p>
                            <input type="file" id="fileElem" accept="image/*" multiple style="display: none;">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                onclick="document.getElementById('fileElem').click();">Browse</button>
                        </div>

                        <!-- Preview Area ABOVE Save Button -->
                        <div id="preview-gallery" class="d-flex flex-wrap mb-3"></div>

                        <!-- Save Button -->
                        <button class="btn btn-primary btn-sm" style="width: 100px;" type="submit">Save</button>
                    </form>
                    <!-- Form End -->
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Gallery --}}
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
                    <form id="deleteForm" method="POST" action="{{ route('gallery.delete') }}">
                        <!-- Include this for Laravel -->
                        @csrf
                        <input type="hidden" name="deleteid" id="gdeleteid">
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
        let filesToUpload = [];

        const dropArea = document.getElementById('drop-area');
        const fileElem = document.getElementById('fileElem');
        const previewGallery = document.getElementById('preview-gallery');

        // Drag & Drop Events
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, e => {
                e.preventDefault();
                e.stopPropagation();
            });
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.add('bg-highlight'));
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.remove('bg-highlight'));
        });

        dropArea.addEventListener('drop', handleDrop);
        fileElem.addEventListener('change', () => handleFiles(fileElem.files));

        function handleDrop(e) {
            handleFiles(e.dataTransfer.files);
        }

        function handleFiles(files) {
            [...files].forEach(file => {
                if (!file.type.startsWith('image/')) return;

                compressAndPreviewImage(file).then(compressedFile => {
                    if (compressedFile) {
                        filesToUpload.push(compressedFile);
                        previewFile(compressedFile, filesToUpload.length - 1);
                    }
                });
            });
        }

        function compressAndPreviewImage(file) {
            return new Promise((resolve) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);

                reader.onload = function(event) {
                    const img = new Image();
                    img.src = event.target.result;

                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const maxWidth = 1024; // optional: resize if bigger
                        const scaleSize = maxWidth / img.width;

                        canvas.width = img.width > maxWidth ? maxWidth : img.width;
                        canvas.height = img.width > maxWidth ? img.height * scaleSize : img.height;

                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                        canvas.toBlob(blob => {
                            const compressedFile = new File([blob], file.name, {
                                type: file.type,
                                lastModified: Date.now()
                            });
                            resolve(compressedFile);
                        }, file.type, 0.85); // Quality: 0.85 (near-lossless)
                    };
                };
            });
        }


        function previewFile(file, index) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                const div = document.createElement('div');
                div.className = 'preview-img';
                div.innerHTML = `
                <button type="button" class="remove-btn" data-index="${index}">&times;</button>
                <img src="${reader.result}" alt="Image Preview">
            `;
                previewGallery.appendChild(div);
            };
        }

        // Remove file from preview and array
        $(document).on('click', '.remove-btn', function() {
            const index = $(this).data('index');
            filesToUpload[index] = null; // mark for skipping
            $(this).parent().remove();
        });

        // AJAX form submit
        $('#galleryForm').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            filesToUpload.forEach(file => {
                if (file) {
                    formData.append('photos[]', file);
                }
            });

            $.ajax({
                url: "{{ route('gallery.process') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response); // Debug
                    if (response.status === 'success') {
                        alert("Images saved successfully!");
                        location.reload();
                    } else {
                        $('#gallery').modal('hide');
                        $('#ajaxerrmsg').html(`<li class="alert alert-danger">${response.status}</li>`);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX error:', xhr.responseText);
                    $('#gallery').modal('hide');
                    $('#ajaxerrmsg').html(
                        `<li class="alert alert-danger">Something went wrong. Please try again.</li>`
                    );
                }
            });
        });


        function deletePhoto(id) {
            $('#gdeleteid').val(id);
            $('#deleteModal').modal('show');
        }
    </script>
<script>
    $(document).ready(function () {
        $('#address').on('hidden.bs.modal', function () {
            location.reload(); // Page reload when modal is closed
        });
    });
</script>
@endsection
