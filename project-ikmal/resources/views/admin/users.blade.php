@extends('admin.template')
@section('content')
<style>
    .modal-content {
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: none;
    }
    .modal-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        border-radius: 12px 12px 0 0;
    }
    .modal-footer {
        background-color: #f8f9fa;
        border-top: 1px solid #dee2e6;
        border-radius: 0 0 12px 12px;
    }
</style>
    <div class="container mt-5">
        <h3 class="mb-4">Data Users</h3>
        <button id="btn-add-user" class="btn btn-primary mb-3">Add User</button>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped" id="table-users">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="userForm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Add/Edit Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @csrf
        <input type="hidden" id="id" name="id">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address" required></textarea>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        $(document).ready(function() {
            $('#table-users').DataTable({
                ajax: {
                    url: '{{ route('users.list') }}',
                    dataSrc: 'data',
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + API_TOKEN
                    }
                },
                columns: [
                    { 
                        data: null, 
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'address', name: 'address' },
                    { data: 'phone', name: 'phone' },
                    { data: 'role', name: 'role' },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <button class="btn btn-sm btn-primary btn-edit" data-id="${row.id}">Edit</button>
                                <button class="btn btn-sm btn-danger btn-delete" data-id="${row.id}">Delete</button>
                            `;
                        }
                    }
                ],
                initComplete: function(settings, json) {
                    if (json.message) {
                        toastr.success(json.message);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Failed to load user data');
                }
            });
            $('#btn-add-user').click(function() {
                $('#userForm')[0].reset();
                $('#id').val('');
                $('#userModalLabel').text('Add User');
                $('#userModal').modal('show');
            })
            
            $('#userForm').submit(function(e) {
                e.preventDefault();
                const id = $('#id').val();
                const url = id ? `/api/users/${id}` : '/api/users';
                const method = id ? 'PUT' : 'POST';
                $.ajax({
                    url: url,
                    method: method,
                    data: $(this).serialize(),
                    headers: {
                        'Authorization': 'Bearer ' + API_TOKEN
                    },
                    success: function(response) {
                        $('#userModal').modal('hide');
                        $('#table-users').DataTable().ajax.reload();
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Failed to save user data');
                    }
                });
            })
            // edit
            $('#table-users tbody').on('click', '.btn-edit', function() {
                const id = $(this).data('id');
                $.ajax({
                    url: `/api/users/${id}`,
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + API_TOKEN
                    },
                    success: function(response) {
                        const user = response.data;
                        $('#id').val(user.id);
                        $('#name').val(user.name);
                        $('#email').val(user.email);
                        $('#address').val(user.address);
                        $('#phone').val(user.phone);
                        $('#role').val(user.role);
                        $('#userModalLabel').text('Edit User');
                        $('#userModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Failed to fetch user data');
                    }
                });
            })
            // delete
            $('#table-users tbody').on('click', '.btn-delete', function() {
                const id = $(this).data('id');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/api/users/${id}`,
                            method: 'DELETE',
                            headers: {
                                'Authorization': 'Bearer ' + API_TOKEN
                            },
                            success: function(response) {
                                $('#table-users').DataTable().ajax.reload();
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                            },
                            error: function(xhr, status, error) {
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete user.',
                                    'error'
                                );
                            }
                        });
                    }
                });
             });
        });
    </script>
@endsection