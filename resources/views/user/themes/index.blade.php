@extends('layouts.app')
@section('content')
    <style>
        .img-thumbnail {
            width: 100%;
            height: 150px;
        }
    </style>
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card shadow-sm border-0">
            <div class="card-header">
                <h3>Select Website Theme</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('themes.select.post') }}" method="POST">
                    @csrf
                    <div class="row">
                        @foreach ($themes as $theme)
                            <div class="col-md-2 mb-4">
                                <label>
                                    <input type="radio" name="theme" value="{{ $theme }}"
                                        {{ auth()->user()->selected_theme == $theme ? 'checked' : '' }}>
                                    <strong>{{ ucfirst($theme) }}</strong>
                                    <img src="{{ asset('/uploads/theme-previews/' . $theme . '.png') }}"
                                        class="img-thumbnail mt-2" />
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-primary">Save Theme</button>
                </form>
            </div>
        </div>
        <div class="card shadow-sm border-0">
            <div class="card-header">
                <h3>Theme Customization</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('theme.customization') }}" method="POST">
                    @csrf
                    <div class="row">
                        <h5>Body</h5>
                        <div class="col-md-2 mb-2">
                            <label for="backgroundcolor">Background Color</label>
                            <input type="color" name="background_color" class="form-control"
                                value="{{ $setting->background_color ?? '' }}" id="backgroundcolor">
                            <input type="hidden" name="user_id" id="userid" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="color">Color</label>
                            <input type="color" name="color" class="form-control" value="{{ $setting->color ?? '' }}"
                                id="color">
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="hover_color">Hover Color</label>
                            <input type="color" name="hover_color" class="form-control"
                                value="{{ $setting->hover_color ?? '' }}" id="hover_color">
                        </div>
                    </div>
                    <h5>Section</h5>
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <label for="backgroundcolor">Background Color</label>
                            <input type="color" name="section_background_color" class="form-control"
                                value="{{ $setting->section_background_color ?? '' }}" id="backgroundcolor">
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="color">Color</label>
                            <input type="color" name="section_color" class="form-control"
                                value="{{ $setting->section_color ?? '' }}" id="color">
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="hover_color">Hover Color</label>
                            <input type="color" name="section_hover_color" class="form-control"
                                value="{{ $setting->section_hover_color ?? '' }}" id="hover_color">
                        </div>
                    </div>
                    <button class="btn btn-primary">Save Theme</button>
                </form>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
