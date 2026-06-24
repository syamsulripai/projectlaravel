@extends('admin.template')

@section('title', 'Dashboard')

@section('content')

<div class="main-content">
    <div class="container-fluid">

        <div class="d-flex justify-content-between mb-3 py-3">
            <h3>Data Users</h3>

            <button class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#modalUser">
                Tambah User
            </button>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">

                <table class="table table-bordered align-middle" id="table_user">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>

    </div>
</div>

<!-- Modal Tambah User -->
<div class="modal fade" id="modalUser" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text"
                           id="name"
                           class="form-control">
                </div>

                <div class="mb-2">
                    <label>Email</label>
                    <input type="email"
                           id="email"
                           class="form-control">
                </div>

                <div class="mb-2">
                    <label>Password</label>
                    <input type="password"
                           id="password"
                           class="form-control">
                </div>

                <div class="mb-2">
                    <label>Phone</label>
                    <input type="text"
                           id="phone"
                           class="form-control">
                </div>

                <div class="mb-2">
                    <label>Address</label>
                    <input type="text"
                           id="address"
                           class="form-control">
                </div>

                <div class="mb-2">
                    <label>Role</label>
                    <select id="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Batal
                </button>

                <button type="button"
                        class="btn btn-success"
                        id="saveUser">
                    Simpan
                </button>
            </div>

        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let editId = null;

    let table = $('#table_user').DataTable({

        processing: true,

        ajax: {
            url: '{{ route("list-users") }}',
            method: 'GET',
            dataSrc: 'data'
        },

        columns: [
            {
                data: null,
                render: function(data, type, row, meta){
                    return meta.row + 1;
                }
            },

            { data: 'name' },
            { data: 'email' },
            { data: 'phone' },
            { data: 'address' },
            { data: 'role' },

            {
                data: null,
                render: function(data, type, row){

                    return `
                        <button class="btn btn-warning btn-sm edit-btn"
                                data-id="${row.id}">
                            Edit
                        </button>

                        <button class="btn btn-danger btn-sm delete-btn"
                                data-id="${row.id}">
                            Delete
                        </button>
                    `;
                }
            }
        ]
    });

    // TOMBOL TAMBAH USER
    $('[data-bs-target="#modalUser"]').click(function(){

        editId = null;

        $('#name').val('');
        $('#email').val('');
        $('#password').val('');
        $('#phone').val('');
        $('#address').val('');
        $('#role').val('user');

    });

    // EDIT USER
    $(document).on('click', '.edit-btn', function(){

        editId = $(this).data('id');

        $.ajax({

            url: '/api/users/' + editId,
            type: 'GET',

            success: function(response){

                $('#name').val(response.data.name);
                $('#email').val(response.data.email);
                $('#password').val('');
                $('#phone').val(response.data.phone);
                $('#address').val(response.data.address);
                $('#role').val(response.data.role);

                let modal = new bootstrap.Modal(
                    document.getElementById('modalUser')
                );

                modal.show();

            },

            error: function(xhr){

                console.log(xhr.responseText);

                alert('Gagal mengambil data user');

            }

        });

    });

    // SIMPAN ATAU UPDATE USER
    $('#saveUser').click(function(){

        let url = '/api/users';
        let method = 'POST';

        let data = {
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            password_confirmation: $('#password').val(),
            phone: $('#phone').val(),
            address: $('#address').val(),
            role: $('#role').val()
        };

        if(editId){

            url = '/api/users/' + editId;
            method = 'PUT';

            if($('#password').val() === ''){
                delete data.password;
                delete data.password_confirmation;
            }

        }

        $.ajax({

            url: url,
            type: method,
            data: data,

            success: function(response){

                alert(
                    editId
                    ? 'User berhasil diupdate'
                    : 'User berhasil ditambahkan'
                );

                editId = null;

                $('#name').val('');
                $('#email').val('');
                $('#password').val('');
                $('#phone').val('');
                $('#address').val('');
                $('#role').val('user');

                bootstrap.Modal
                    .getInstance(document.getElementById('modalUser'))
                    .hide();

                table.ajax.reload();

            },

            error: function(xhr){

                console.log(xhr.responseText);

                alert('Gagal menyimpan data');

            }

        });

    });

    // DELETE USER
    $(document).on('click', '.delete-btn', function(){

        let id = $(this).data('id');

        if(confirm('Yakin ingin menghapus user ini?')){

            $.ajax({

                url: '/api/users/' + id,
                type: 'DELETE',

                success: function(response){

                    alert('User berhasil dihapus');

                    table.ajax.reload();

                },

                error: function(xhr){

                    console.log(xhr.responseText);

                    alert('Gagal menghapus user');

                }

            });

        }

    });

});
</script>
@endsection