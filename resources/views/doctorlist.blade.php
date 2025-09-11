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

        @php
            use App\Helpers\PageTitle;
        @endphp
        <div id="ajaxerrmsg"></div>
        <div class="card shadow-sm border-0">
            <div class="card-header bg-secodary text-primary">
                <div class="d-flex justify-content-between w-100">
                    <h3 class="mb-0">{{ ucwords(PageTitle::getPageTitle()) }} List</h3>
                    <a data-bs-toggle="modal" data-bs-target="#doctor" class="btn btn-primary"><i class="bi bi-plus"></i>
                        Add {{ ucwords(PageTitle::getPageTitle()) }}</a>
                </div>
            </div>
            <div class="card-body">
                <table id="taskTable" class="table table-bordered table-striped align-middle" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $key => $doctor)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $doctor->name ?? '' }}</td>
                                <td><img src="{{ $doctor->image ?? '' }}" width="25px"></td>
                                <td>
                                    <a class="text-warning" onclick="editDoctor({{ $doctor->id }})"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a class="text-danger" onclick="deleteDoctor({{ $doctor->id }})"><i
                                            class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Add Blog --}}
    <div class="modal fade" id="doctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('doctors.process') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <select class="form-control" name="department_id" id="title" required>
                                <option value="">Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id ?? '' }}">{{ $department->name ?? '' }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" class="form-control" value="{{ Auth::user()->id ?? '' }}" name="user_id">
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="title" placeholder=""
                                required>
                            <label for="title">Name</label>
                            <input type="hidden" class="form-control" value="{{ Auth::user()->id ?? '' }}" name="user_id">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="image" accept="image/*" id="image"
                                placeholder="" required>
                            <label for="image">Image</label>
                        </div>
                        <div class="form-floating mb-3 w-100 socilamediablock">
                            <div class="d-flex align-items-center gap-2" id="addsocial1">
                                <input type="text" class="form-control custom-field" name="social_media_names[]"
                                    id="social_name1" placeholder="Social Media Name" required>
                                <input type="text" class="form-control custom-field" name="social_media_links[]"
                                    id="social1" placeholder="Social Media Link" required>
                                <a class="text-success d-flex align-items-center justify-content-center fs-2 add"
                                    style="height: 58px;">
                                    <i class="bi bi-plus"></i>
                                </a>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" id="summernote" name="description" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-sm" style="width: 100px; margin-left: 15px;"
                            type="submit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Blog --}}
    <div class="modal fade" id="editdoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('doctors.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <div class="form-floating mb-3">
                            <select class="form-control" name="department_id" id="departmentid" required>
                            </select>
                            <input type="hidden" class="form-control" name="user_id" id="userid">
                        </div>
                            <input type="text" class="form-control" name="name" id="dname" placeholder=""
                                required>
                            <label for="dname">Name</label>
                            <input type="hidden" name="doctor_id" id="doctorid">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="image" accept="image/*" id="image"
                                placeholder="">
                            <label for="image">Image</label>
                            <img id="dimage" width="25px">
                        </div>
                        <div class="form-floating mb-3 w-100 socilamediablock" id="editsocialmediablock">
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control" id="dsummernote" name="description" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm" style="width: 100px; margin-left: 15px;"
                            type="submit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete About --}}
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
                    <form id="deleteForm" method="POST" action="{{ route('doctors.delete') }}">
                        <!-- Include this for Laravel -->
                        @csrf
                        <input type="hidden" name="deleteid" id="ddeleteid">
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (required for DataTables) -->
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
            $(document).ready(function() {
                $('#summernote').summernote({
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
            $(document).ready(function() {
                $('#dsummernote').summernote({
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
            function editDoctor(id) {
                $.ajax({
                    url: `doctor-edit/${id}`,
                    type: "GET",
                    success: function(response) {
                        if (response.status === 'success') {
                            var htmlcontent = ``;
                            var anchor = ``;
                            var departmentContent = ``;
                            departmentContent += `
                                    ${response.departments.map(dept => `
                                        <option value="${dept.id}" ${response.data.department_id == dept.id ? 'selected' : ''}>
                                            ${dept.name}
                                        </option>
                                    `).join('')}
                            `;
                            $('#departmentid').html(departmentContent);                
                            $('#userid').val(response.data.user_id);
                            $('#dname').val(response.data.name)
                            $('#doctorid').val(response.data.id)
                            $('#dimage').attr('src', response.data.image)
                            $('#dsummernote').summernote('code', response.data.description);
                            var socilamedia = JSON.parse(response.data.social_media_links);
                            console.log(Object.entries(socilamedia));

                            var htmlcontent = ``;
                            Object.entries(socilamedia).forEach(([name, link], index) => {
                                let anchor = ``;
                                if (index === 0) {
                                    anchor = `<a class="text-success d-flex align-items-center justify-content-center fs-2" 
                    style="height: 58px;" onclick="addSocialInput()">
                    <i class="bi bi-plus"></i>
                  </a>`;
                                } else {
                                    anchor = `<a class="text-danger d-flex align-items-center justify-content-center fs-2 remove-social" 
                    style="height: 58px;" 
                    onclick="removeInputField('${name}', '${link}', ${index})">
                    <i class="bi bi-dash"></i>
                  </a>`;
                                }

                                htmlcontent += `<div class="d-flex align-items-center gap-2" id="editsociallinks${index}">
                                <input type="text" class="form-control custom-field" 
                                    name="social_media_names[]" 
                                    id="editsocialname${index}" 
                                    value="${name}" 
                                    placeholder="Platform Name" required>

                                <input type="text" class="form-control custom-field" 
                                    name="social_media_links[]" 
                                    id="editsociallink${index}" 
                                    value="${link}" 
                                    placeholder="Profile Link" required>

                                ${anchor}
                            </div>`;
                            });

                            $('#editsocialmediablock').html(htmlcontent);
                            $('#editdoctor').modal('show');
                        } else {
                            $('#ajaxerrmsg').html(`<li class="alert alert-danger">${response.status}</li>`)
                        }
                    }
                });
            }

            function deleteDoctor(id) {
                $('#ddeleteid').val(id)
                $('#deleteModal').modal('show');
            }
        </script>
        <script>
            $(document).ready(function() {
                $('#doctor').on('hidden.bs.modal', function() {
                    location.reload(); // Page reload when modal is closed
                });
            });
            let socialCount = 1;
            $(document).ready(function() {
                $('.socilamediablock').on('click', '.add', function() {
                    addDynamicTextbox();
                });

                $('.socilamediablock').on('click', '.del', function() {
                    $(this).closest('div[id^="addsocial"]').remove();
                });
            });

            function addDynamicTextbox() {
                if ($('.socilamediablock > div[id^="addsocial"]').length < 20) {
                    socialCount++;
                    var elem = `<div class="d-flex align-items-center gap-2" id="addsocial${socialCount}">
                        <input type="text" class="form-control custom-field" name="social_media_names[]" id="editsocialname${socialCount}" placeholder="Social Media Name" required>
                        <input type="text" class="form-control custom-field" name="social_media_links[]" id="editsociallink${socialCount}" placeholder="Social Media Link" required>
                        <a class="text-danger d-flex align-items-center justify-content-center fs-2 del" style="height: 58px;">
                            <i class="bi bi-dash"></i>
                        </a>
                    </div>`;
                    $('.socilamediablock').append(elem);
                }
            }


            let editSocialCounter = 0;

            function addSocialInput(value = '') {
                const id = ++editSocialCounter;
                const htmlContent = `
        <div class="d-flex align-items-center gap-2 mb-2" id="editsocial${id}">
            <input type="text" class="form-control custom-field" name="social_media_names[]" id="social${id}" required>
            <input type="text" class="form-control custom-field" name="social_media_links[]" id="social${socialCount}" placeholder="Social Media Link" required>
            <a class="text-danger d-flex align-items-center justify-content-center fs-2 remove-social" style="height: 58px;" data-id="${id}">
                <i class="bi bi-dash"></i>
            </a>
        </div>`;
                $('#editsocialmediablock').append(htmlContent);
            }

            $(document).on('click', '.remove-social', function() {
                const id = $(this).data('id');
                $(`#editsocial${id}`).remove();
            });

            function removeInputField(sociallink = '', sociallinksarray = '', id) {
                const sociallinks = sociallinksarray.split(',');
                const index = sociallinks.indexOf(sociallink);
                if (index > -1) {
                    sociallinks.splice(index, 1);
                }
                $(`#editsociallinks${id}`).remove();
            }
        </script>
    @endpush
@endsection
