@extends('admin.layouts.app')

@section('title', 'Users Management')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
<style>
    /* Tailwind fix for datatables */
    .dataTables_wrapper .dataTables_length select { padding-right: 2rem; }
    .dataTables_wrapper .dataTables_filter input { border: 1px solid #ddd; padding: 4px 8px; border-radius: 4px; margin-left: 8px; }
</style>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
        <h3 class="font-semibold text-gray-800 text-lg">Data Users</h3>
        <button id="btn-add-user" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors font-medium text-sm flex items-center shadow-sm">
            <i class="fas fa-plus mr-2"></i> Add User
        </button>
    </div>

    <div class="p-6">
        <table id="table-users" class="display w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Address</th>
                    <th class="px-4 py-3">Phone</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- Tailwind Modal (Simplified) -->
<div id="userModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50 overflow-y-auto">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg mx-4 my-8 overflow-hidden flex flex-col max-h-[90vh]">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <h3 class="text-lg font-medium text-gray-900" id="userModalLabel">Add/Edit Users</h3>
            <button type="button" class="text-gray-400 hover:text-gray-500" id="btn-x-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form id="userForm" class="flex flex-col overflow-hidden">
            <div class="px-6 py-4 overflow-y-auto flex-1">
                <input type="hidden" id="id" name="id">
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                    <input class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="name" type="text" name="name" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="email" type="email" name="email" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password <span class="text-xs font-normal text-gray-500" id="pwd-help">(Leave empty to keep current password)</span></label>
                    <input class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="password" type="password" name="password">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">Confirm Password</label>
                    <input class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="password_confirmation" type="password" name="password_confirmation">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Address</label>
                    <textarea class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="address" name="address" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Phone</label>
                    <input class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="phone" type="text" name="phone" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="role">Role</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" id="role" name="role" required>
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex justify-end space-x-3">
                <button type="button" id="btn-close-modal" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-medium">
                    Save changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    // In a real app you'd get this securely. For this assignment, we use localStorage or prompt
    // Assuming the user is logged in, their session cookie handles auth, but Sanctum API requests might need Bearer token.
    // If we use session auth (Sanctum SPA authentication), we don't need Bearer token!
    // But since you instructed to use API token like in postman, we will prompt or get it.
    // Actually, since web routes share the same domain, Laravel session works if Sanctum is configured for SPA.
    // Let's rely on standard session or try fetching it from local storage.
    const API_TOKEN = localStorage.getItem('api_token') || '{{ session("api_token", "") }}';

    $(document).ready(function() {
        // Setup Modal Togglers
        function showModal() { 
            $('#userModal').removeClass('hidden'); 
        }
        function hideModal() { 
            $('#userModal').addClass('hidden'); 
        }
        
        $('#btn-close-modal, #btn-x-close').click(hideModal);

        // Clicking outside to close
        $('#userModal').click(function(e) {
            if (e.target === this) {
                hideModal();
            }
        });

        // Load DataTable
        var table = $('#table-users').DataTable({
            ajax: {
                url: '/api/users',
                dataSrc: 'data',
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + API_TOKEN
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        toastr.error('Not authenticated for API. Please login via API first or configure Sanctum SPA.');
                    } else {
                        toastr.error('Failed to load user data');
                    }
                }
            },
            columns: [
                { 
                    data: null, 
                    searchable: false,
                    orderable: false,
                    render: function(data, type, row, meta) { return meta.row + 1; }
                },
                { data: 'name' },
                { data: 'email' },
                { data: 'address' },
                { data: 'phone' },
                { data: 'role', render: function(data) {
                    return data === 'admin' ? '<span class="px-2 py-1 bg-purple-100 text-purple-800 rounded text-xs">Admin</span>' : '<span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">User</span>';
                }},
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                            <button class="px-3 py-1 bg-blue-100 text-blue-600 rounded text-sm hover:bg-blue-200 btn-edit" data-id="${row.id}"><i class="fas fa-edit"></i></button>
                            <button class="px-3 py-1 bg-red-100 text-red-600 rounded text-sm hover:bg-red-200 btn-delete" data-id="${row.id}"><i class="fas fa-trash"></i></button>
                        `;
                    }
                }
            ]
        });

        // Add
        $('#btn-add-user').click(function() {
            $('#userForm')[0].reset();
            $('#id').val('');
            $('#userModalLabel').text('Add User');
            $('#pwd-help').addClass('hidden');
            $('#password, #password_confirmation').attr('required', true);
            showModal();
        });

        // Submit Form
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
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + API_TOKEN
                },
                success: function(response) {
                    hideModal();
                    table.ajax.reload();
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    let msg = 'Failed to save user data';
                    if(xhr.responseJSON && xhr.responseJSON.errors) {
                        msg = Object.values(xhr.responseJSON.errors)[0][0];
                    }
                    toastr.error(msg);
                }
            });
        });

        // Edit
        $('#table-users tbody').on('click', '.btn-edit', function() {
            const id = $(this).data('id');
            $.ajax({
                url: `/api/users/${id}`,
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + API_TOKEN
                },
                success: function(response) {
                    const user = response.data;
                    $('#id').val(user.id);
                    $('#name').val(user.name);
                    $('#email').val(user.email);
                    $('#address').val(user.address || '');
                    $('#phone').val(user.phone || '');
                    $('#role').val(user.role || 'user');
                    $('#password, #password_confirmation').removeAttr('required').val('');
                    $('#pwd-help').removeClass('hidden');
                    
                    $('#userModalLabel').text('Edit User');
                    showModal();
                },
                error: function() {
                    toastr.error('Failed to fetch user data');
                }
            });
        });

        // Delete
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
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + API_TOKEN
                        },
                        success: function(response) {
                            table.ajax.reload();
                            Swal.fire('Deleted!', response.message, 'success');
                        },
                        error: function() {
                            Swal.fire('Error!', 'Failed to delete user.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
