@extends('layouts.app')
@section('content')
<div class="container my-4">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif
  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update') }}">
    @csrf
    <div class="row">
      
      <!-- LEFT PANEL -->
      <div class="col-md-4">
        <div class="card mb-4 p-3 text-center">
          <label for="profile-img-upload">
            @if($user && $user->photo)
              <img src="{{ $user->photo }}" class="img-fluid rounded-circle mb-2" alt="Doctor" style="width: 150px; height: 150px; object-fit: cover; cursor: pointer;">
            @else
              <img src="{{ url('/') }}/assets/img/avatar.png" class="img-fluid rounded-circle mb-2" alt="Doctor" style="width: 150px; height: 150px; object-fit: cover; cursor: pointer;">
            @endif
          </label>
          <input type="file" id="profile-img-upload" name="doctor_photo" class="d-none">

          <div class="mt-3 text-start">
            <div class="mb-2">
              <label class="form-label">User Name</label>
              <input type="text" name="username" value="{{ $user->username ?? '' }}" class="form-control" disabled>
              <input type="hidden" name="userid" value="{{ $user->id ?? '' }}">
            </div>
            <div class="mb-2">
              <label class="form-label">Full Name <span class="text-danger">*</span></label>
              <input type="text" name="name" value="{{ $user->name ?? '' }}" class="form-control">
              <input type="hidden" name="userid" value="{{ $user->id ?? '' }}">
            </div>

            <div class="mb-2">
              <label class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" name="email" value="{{ $user->email ?? '' }}" class="form-control">
            </div>

            <div class="mb-2">
              <label class="form-label">Date of Birth</label>
              <input type="date" name="dr_dob" value="{{ $user->dr_dob ?? '' }}" class="form-control">
            </div>

            <div class="mb-2">
              <label class="form-label">Phone</label>
              <input type="text" name="phone" value="{{ $user->phone ?? '' }}" class="form-control">
            </div>

            <div class="mb-2">
              <label class="form-label">Alternate Phone</label>
              <input type="text" name="alternate_phone" value="{{ $user->alternate_phone ?? '' }}" class="form-control">
            </div>

            <div class="mb-2">
              <label class="form-label">Address Map Link</label>
              <textarea name="address_map_link" class="form-control">{{ $user->address_map_link ?? '' }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT PANEL -->
      <div class="col-md-8">
        <div class="card p-4 mb-4">
          <h5>Clinic Info</h5>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Clinic Name</label>
              <input type="text" name="clinic_name" class="form-control" value="{{ $user->clinic_name ?? '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Telephone Number</label>
              <input type="text" name="telephone_number" class="form-control" value="{{ $user->telephone_number ?? '' }}">
            </div>
            <div class="col-12">
              <label class="form-label">Address</label>
              <input type="text" name="address" class="form-control" value="{{ $user->address ?? '' }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">City</label>
              <input type="text" name="city" class="form-control" value="{{ $user->city ?? '' }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">State</label>
              <input type="text" name="state" class="form-control" value="{{ $user->state ?? '' }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Country</label>
              <input type="text" name="country" class="form-control" value="{{ $user->country ?? '' }}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Pincode</label>
              <input type="text" name="pincode" class="form-control" value="{{ $user->pincode ?? '' }}">
            </div>
          </div>

          <hr>
          <h6>Clinic Days & Time</h6>
          <div class="row g-3">
            <div class="col-md-3">
              <label class="form-label">Open From</label>
              <select name="clinic_open_from" class="form-select">
                <option selected disabled>Choose day</option>
                @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                  <option {{ $user->clinic_open_from == $day ? 'selected' : '' }}>{{ $day }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Open To</label>
              <select name="clinic_open_to" class="form-select">
                <option selected disabled>Choose day</option>
                @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                  <option {{ $user->clinic_open_to == $day ? 'selected' : '' }}>{{ $day }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Half Day Clinic Open</label>
              <select name="half_day" class="form-select">
                <option selected disabled>Choose day</option>
                @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                  <option {{ $user->half_day == $day ? 'selected' : '' }}>{{ $day }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Closed Day</label>
              <select name="closed_clinic" class="form-select">
                <option selected disabled>Choose day</option>
                @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                  <option {{ $user->closed_clinic == $day ? 'selected' : '' }}>{{ $day }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Time Of Half Day From</label>
              <input type="time" name="time_of_half_day_from" class="form-control" value="{{ $user->time_of_half_day_from ?? '' }}">
            </div>
            <div class="col-md-3">
              <label class="form-label">Time Of Half Day To</label>
              <input type="time" name="time_of_half_day_to" class="form-control" value="{{ $user->time_of_half_day_to ?? '' }}">
            </div>
            <div class="col-md-3">
              <label class="form-label">Open Time</label>
              <input type="time" name="clinic_open_time" class="form-control" value="{{ $user->clinic_open_time ?? '' }}">
            </div>
            <div class="col-md-3">
              <label class="form-label">Close Time</label>
              <input type="time" name="clinic_close_time" class="form-control" value="{{ $user->clinic_close_time ?? '' }}">
            </div>
          </div>

          <hr>
          <h6>Clinic Media</h6>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Clinic Logo</label>
              <input type="file" name="clinic_logo" class="form-control">
              <div class="mt-2">
                <img src="{{ $user->clinic_logo ?? url('/assets/img/dummy_clinic_logo.png') }}" width="50px">
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Clinic Photo</label>
              <input type="file" name="clinic_photo" class="form-control">
              <div class="mt-2">
                <img src="{{ $user->clinic_photo ?? url('/assets/img/dummy_clinic_images.jpg') }}" width="50px" height="50px">
              </div>
            </div>
          </div>

          <hr>
          <h6>Social Media</h6>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Facebook</label>
              <input type="url" name="facebook_link" class="form-control" value="{{ $user->facebook_link ?? '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Instagram</label>
              <input type="url" name="instagram_link" class="form-control" value="{{ $user->instagram_link ?? '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Twitter</label>
              <input type="url" name="twitter_link" class="form-control" value="{{ $user->twitter_link ?? '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">LinkedIn</label>
              <input type="url" name="linkdin_link" class="form-control" value="{{ $user->linkdin_link ?? '' }}">
            </div>
          </div>

          <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">Update Profile</button>

          </div>
        </div>
      </div>
    </div>
  </form>
</div>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
