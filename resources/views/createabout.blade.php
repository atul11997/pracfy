@extends('layouts.app')
@section('content')
    <div class="container-fluid w-100">
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
        <div class="card">
            <div class="card-header">
                <h2>About</h2>
            </div>
            <div class="card-body">
                    <form class="form-group" method="post" action="{{ route('about.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row p-2">
                            <div class="col-md-12 mb-3">
                                <label for="title">Title</label>
                                <input type="text" id="atitle" name="title" value="{{ $findabout->title??'' }}" class="form-control"
                                    placeholder="Enter title" required />
                                <input type="hidden" id="aboutid" value="{{ $findabout->id??'' }}" name="about_id" />
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" id="asubtitle" name="subtitle" value="{{ $findabout->subtitle??'' }}" class="form-control"
                                    placeholder="Enter subtitle" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control mb-2" accept="image/*" />

                                <img src="{{ $findabout->image??'' }}" width="50px">

                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="asummernote" class="form-control mb-2" placeholder="Write something about...">{!! $findabout->description??'' !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"
                                style="width: 100px; margin-left: 15px;">Save</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@push('backend_script')

    <script>
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
        
@endpush
@endsection
