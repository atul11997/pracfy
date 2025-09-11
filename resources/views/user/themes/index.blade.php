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
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="bi bi-check2-all me-2"></i> <!-- Double tick icon -->
        <div>{{ session('success') }}</div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="bi bi-x-circle-fill me-2"></i>
        <div>{{ session('error') }}</div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
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
            <a class="btn btn-primary" href="{{ route('theme.setting') }}" style="width: 200px; margin: 0px 18px 20px 20px;">Theme Customization</a>
        </div>
    </div>

@endsection
