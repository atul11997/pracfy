
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
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
            <div class="card">
                <div class="card-header">Theme Customization</div>

                <div class="card-body">
                    <form method="post" action="{{ route('theme.save') }}" id="theme-customization-form">
                        @csrf

                        <!-- Theme Selection -->
                        <div class="form-group">
                            <label for="theme_name">Theme</label>
                            <input type="text" class="form-control" name="selected_theme" id="primary_color" 
                                        value="{{ $userTheme->selected_theme??'' }}">
                        </div>

                        <!-- Color Customization -->
                        <div class="form-group mt-4">
                            <h5>Background Color Settings</h5>
                            <div class="row">
                               @php
                                   $decode = json_decode($userTheme->theme_customizations);
                               @endphp
                                <div class="col-md-6">
                                    <label for="primary_color">Primary Color</label>
                                    <input type="color" class="form-control" name="bg_primary_color" id="primary_color" 
                                        value="{{ $decode->bg_colors->primary ?? $defaultSettings->bg_colors->primary }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="secondary_color">Secondary Color</label>
                                    <input type="color" class="form-control" name="bg_secondary_color" id="secondary_color" 
                                        value="{{ $decode->bg_colors->secondary ?? $defaultSettings->bg_colors->secondary }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <h5>Color Settings</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="primary_color">Primary Color</label>
                                    <input type="color" class="form-control" name="primary_color" id="primary_color" 
                                        value="{{ $decode->colors->primary ?? $defaultSettings->bg_colors->primary }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="secondary_color">Secondary Color</label>
                                    <input type="color" class="form-control" name="secondary_color" id="secondary_color" 
                                        value="{{ $decode->colors->secondary ?? $defaultSettings->bg_colors->secondary }}">
                                </div>
                            </div>
                        </div>

                        <!-- Typography -->
                        <div class="form-group mt-4">
                            <h5>Typography</h5>
                            <label for="font_family">Font Family</label>
                            <select class="form-control" name="font_family" id="font_family">
                                <option value="sans-serif" 
                                
                                    {{ ($decode->typography->font_family ?? $defaultSettings->typography->font_family) === 'sans-serif' ? 'selected' : '' }}>
                                    Sans-serif
                                </option>
                                <option value="serif"
                                    {{ ($decode->typography->font_family ?? $defaultSettings->typography->font_family) === 'serif' ? 'selected' : '' }}>
                                    Serif
                                </option>
                                <option value="monospace"
                                    {{ ($decode->typography->font_family ?? $defaultSettings->typography->font_family) === 'monospace' ? 'selected' : '' }}>
                                    Monospace
                                </option>
                            </select>
                        </div>

                        <!-- Layout -->
                        {{-- <div class="form-group mt-4">
                            <h5>Layout</h5>
                            <div class="form-check">
                                
                                <input class="form-check-input" type="radio" name="layout_style" id="layout_boxed" value="boxed"
                                    {{ ($decode->layout->style ?? $defaultSettings->layout->style) === 'boxed' ? 'checked' : '' }}>
                                <label class="form-check-label" for="layout_boxed">
                                    Boxed Layout
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="layout_style" id="layout_full" value="full"
                                    {{ ($decode->layout->style ?? $defaultSettings->layout->style) === 'full' ? 'checked' : '' }}>
                                <label class="form-check-label" for="layout_full">
                                    Full Width Layout
                                </label>
                            </div>
                        </div> --}}

                        <button type="submit" class="btn btn-primary mt-4">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('backend_script')
<script>
    // Live preview update
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('theme-customization-form');
        const preview = document.getElementById('theme-preview');
        
        form.addEventListener('change', function() {
            const formData = new FormData(form);
            
            // Update preview colors
            preview.querySelector('h4').style.color = formData.get('primary_color');
            preview.querySelector('button').style.backgroundColor = formData.get('primary_color');
            
            // Update font family
            preview.querySelector('p').style.fontFamily = formData.get('font_family');
        });
    });
</script>
@endpush