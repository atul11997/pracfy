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
                    <a data-bs-toggle="modal" data-bs-target="#address" class="btn btn-primary"><i class="bi bi-plus"></i> Add
                        {{ ucwords(PageTitle::getPageTitle()) }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="taskTable" class="table table-bordered table-striped align-middle" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>S.No</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Pincode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($addreses as $key => $address)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $address->address ?? '' }}</td>
                                <td>{{ $address->city ?? '' }}</td>
                                <td>{{ $address->state ?? '' }}</td>
                                <td>{{ $address->pincode ?? '' }}</td>
                                <td>
                                    <a class="text-warning" onclick="editAddress({{ $address->id }})"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a class="text-danger" onclick="deleteAddress({{ $address->id }})"><i
                                            class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Address --}}
    <div class="modal fade" id="address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('address.process') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="address" id="addressInput"
                                placeholder="123 Main St" required>
                            <label for="addressInput"><i class="bi bi-geo-alt-fill me-2"></i>Address</label>
                            <input type="hidden" value="{{ Auth::user()->id }}"  name="user_id">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="city" id="cityInput" placeholder="City"
                                required>
                            <label for="cityInput"><i class="bi bi-buildings me-2"></i>City</label>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="state" id="stateInput"
                                        placeholder="State" required>
                                    <label for="stateInput"><i class="bi bi-flag me-2"></i>State</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="pincode" id="pincodeInput"
                                        placeholder="Pincode" required>
                                    <label for="pincodeInput"><i class="bi bi-123 me-2"></i>Pincode</label>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm" style="width: 100px; margin-left: 15px;"
                                type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Address --}}
    <div class="modal fade" id="editaddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{ ucwords(PageTitle::getPageTitle()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('address.update') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="address" id="add"
                                placeholder="123 Main St" required>
                            <label for="add"><i class="bi bi-geo-alt-fill me-2"></i>Address</label>
                            <input type="hidden" name="address_id" id="addressid">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="city" id="addcity" placeholder="City"
                                required>
                            <label for="addcity"><i class="bi bi-buildings me-2"></i>City</label>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="state" id="addstate"
                                        placeholder="State" required>
                                    <label for="addstate"><i class="bi bi-flag me-2"></i>State</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="pincode" id="addpincode"
                                        placeholder="Pincode" required>
                                    <label for="addpincode"><i class="bi bi-123 me-2"></i>Pincode</label>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm" style="width: 100px; margin-left: 15px;"
                                type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Address --}}
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
                    <form id="deleteForm" method="POST" action="{{ route('address.delete') }}">
                        <!-- Include this for Laravel -->
                        @csrf
                        <input type="hidden" name="deleteid" id="adddeleteid">
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
        function editAddress(id) {
            $.ajax({
                url: `address-edit/${id}`,
                type: "GET",
                success: function(response) {
                    if (response.status === 'success') {
                        $('#add').val(response.data.address)
                        $('#addressid').val(response.data.id)
                        $('#addcity').val(response.data.city)
                        $('#addstate').val(response.data.state)
                        $('#addpincode').val(response.data.pincode)
                        $('#editaddress').modal('show');
                    } else {
                        $('#ajaxerrmsg').html(`<li class="alert alert-danger">${response.status}</li>`)
                    }
                }
            });
        }

        function deleteAddress(id) {
            $('#adddeleteid').val(id);
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
