@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-4">Theme Customization</h2>
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <form method="POST" action="{{ route('theme.setting.update') }}">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Primary Color</label>
                <input type="color" name="primary_color" value="{{ $settings['primary_color'] }}" class="form-control form-control-color">
            </div>

            <div class="col-md-6 mb-3">
                <label>Background Color</label>
                <input type="color" name="background_color" value="{{ $settings['background_color'] }}" class="form-control form-control-color">
            </div>
        </div>
        <div class="row">
        <div class="col-md-4 mb-3">
            <label>Color</label>
            <input type="color" name="color" value="{{ $settings['color'] }}" class="form-control form-control-color">
        </div>
        <div class="col-md-4 mb-3">
            <label>Hover Color</label>
            <input type="color" name="hover_color" value="{{ $settings['hover_color'] }}" class="form-control form-control-color">
        </div>

        <div class="col-md-4 mb-3">
            <label>Active Color</label>
            <input type="color" name="active_color" value="{{ $settings['active_color'] }}" class="form-control form-control-color">
        </div>
        </div>
        <div class="row">
        <div class="col-md-4 mb-3">
            <label>Font Family</label>
            <select name="font_family" class="form-control">
                @foreach (['Arial','Poppins','Roboto','Open Sans', 'Montserrat', 'Lato', 'Nunito', 'Inter', 'Raleway', 'Fira Sans'] as $ff)
                    <option value="{{ $ff }}" {{ $settings['font_family']===$ff ? 'selected' : '' }}>{{ $ff }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <label>Font Size (e.g. 16px)</label>
            <input type="text" name="font_size" value="{{ $settings['font_size'] }}" class="form-control">
        </div>

        <div class="col-md-4 mb-3">
            <label>Font Weight (e.g. 400/500/600)</label>
            <input type="text" name="font_weight" value="{{ $settings['font_weight'] }}" class="form-control">
        </div>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection