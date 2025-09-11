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
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @php
            use App\Helpers\PageTitle;
        @endphp
        <div class="card shadow-sm border-0">
            <div class="card-header bg-secodary text-primary">
                <div class="d-flex justify-content-between w-100">
                    <h3 class="mb-0">{{ ucwords(PageTitle::getPageTitle()) }} List</h3>
                    <a data-bs-toggle="modal" data-bs-target="#video" class="btn btn-primary"><i class="bi bi-plus"></i> Add
                        {{ ucwords(PageTitle::getPageTitle()) }}</a>
                </div>
            </div>
            <div class="card-body">
                <table id="taskTable" class="table table-bordered table-striped align-middle" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">S.No</th>
                            <th>Title</th>
                            <th>Video</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $key => $video)
                            <tr>
                                <td width="5%">{{ $key + 1 }}</td>
                                <td>{{ $video->title ?? '' }}</td>
                                <td><video id="video{{ $video->id }}" width="50px" height="50px" controls preload="metadata">
                                        <source src="{{ $video->videos ?? '' }}" type="video/mp4">
                                    </video>
                                </td>
                                <td>
                                    <a class="text-primary" onclick="videoPlay({{ $video->id }})"><i
                                            class="bi bi-play-btn"></i></a>
                                    <a class="text-warning"
                                        onclick="openEditModal({{ $video->id }}, '{{ $video->title }}', '{{ $video->videos }}')"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a class="text-danger" onclick="deleteVideo({{ $video->id }})"><i
                                            class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Add Video --}}
    <div class="modal fade" id="video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="videoForm" method="post" action="{{ route('video.process') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="">
                            <label>Title</label>
                            <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" id="videoFile" class="form-control" accept="video/mp4">
                            <input type="hidden" name="video" id="uploadedVideoName">
                            <label>Video</label>

                            <div class="progress" style="height: 25px; width: 300px; margin-top: 10px;">
                                <div id="progressBar" class="progress-bar bg-success" role="progressbar" style="width: 0%">
                                    0%
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

        {{-- Edit Video --}}
    <div class="modal fade" id="editvideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('video.update') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" id="vtitle" placeholder="">
                            <label for="vtitle">Title</label>
                            <input type="hidden" name="video_id" id="vid">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" class="form-control mb-2" name="video" id="editvideoFile"
                                accept="video/mp4">
                            <label>Video</label>

                            <!-- Hidden input to store uploaded file name -->
                            <input type="hidden" name="uploaded_video" id="edituploadedVideoName">

                            <!-- Progress bar -->
                            <div class="progress" id="editProgressContainer"
                                style="display: none; height: 25px; margin-top: 10px;">
                                <div id="editProgressBar" class="progress-bar bg-success" style="width: 0%">0%</div>
                            </div>

                            <!-- Video Preview -->
                            <video id="editVideoPreview" controls width="300" preload="metadata" style="margin-top: 10px;">
                                <source src="" type="video/mp4">
                            </video>
                        </div>

                        <button class="btn btn-primary btn-sm" style="width: 100px;" type="submit">Save</button>
                    </form>
                </div>
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
                        <form id="deleteForm" method="POST" action="{{ route('video.delete') }}">
                            <!-- Include this for Laravel -->
                            @csrf
                            <input type="hidden" name="deleteid" id="vdeleteid">
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                function videoPlay(id) {
                    const video = document.getElementById(`video${id}`);

                    if (video.requestFullscreen) {
                        video.requestFullscreen();
                    } else if (video.webkitRequestFullscreen) {
                        /* Safari */
                        video.webkitRequestFullscreen();
                    } else if (video.msRequestFullscreen) {
                        /* IE11 */
                        video.msRequestFullscreen();
                    }
                    video.muted = false;
                    video.play();

                    // Pause after 2 seconds (you can change this value)
                    setTimeout(() => {
                        video.pause();
                    }, 2000);
                }
            </script>
            <script>
                $('#videoFile').on('change', function() {
                    var file_data = $('#videoFile').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('video', file_data);
                    form_data.append('_token', '{{ csrf_token() }}');

                    $.ajax({
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                                    $('#progressBar').css('width', percentComplete + '%').text(
                                        percentComplete + '%');
                                }
                            }, false);
                            return xhr;
                        },
                        url: "{{ route('video.upload.temp') }}",
                        method: "POST",
                        data: form_data,
                        processData: false,
                        contentType: false,
                        success: function(res) {
                            if (res.status === 'success') {
                                $('#uploadedVideoName').val(res.filename); // Hidden input me filename store
                            }
                        }
                    });
                });

            function openEditModal(videoId, title, videoUrl) {
                $('#vid').val(videoId);
                $('#vtitle').val(title);
                $('#editVideoPreview source').attr('src', videoUrl);
                $('#editVideoPreview')[0].load();
                $('#edituploadedVideoName').val(''); // reset hidden filename
                $('#editProgressContainer').hide();
                $('#editProgressBar').css('width', '0%').text('0%');
                $('#editvideo').modal('show');
            }

            $('#editvideoFile').on('change', function() {
                var file_data = $('#editvideoFile').prop('files')[0];
                var videoid = $('#vid').val();
                var form_data = new FormData();
                form_data.append('video', file_data);
                form_data.append('videoid', videoid);
                form_data.append('_token', '{{ csrf_token() }}');

                // Show progress bar
                $('#editProgressContainer').show();

                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                                $('#editProgressBar').css('width', percentComplete + '%').text(
                                    percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    url: "{{ route('video.upload.temp') }}", // Temporary upload
                    method: "POST",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status === 'success') {
                            // Save filename to hidden input
                            $('#edituploadedVideoName').val(res.filename);

                            // Update video preview
                            $('#editVideoPreview source').attr('src', res.filepath);
                            $('#editVideoPreview')[0].load();
                        }
                    }
                });
            });

                function deleteVideo(id) {
                    $('#vdeleteid').val(id)
                    $('#deleteModal').modal('show')
                }
            </script>
            <script>
                $(document).ready(function() {
                    $('#video').on('hidden.bs.modal', function() {
                        location.reload(); // Page reload when modal is closed
                    });
                });
            </script>
        @endpush
    @endsection
