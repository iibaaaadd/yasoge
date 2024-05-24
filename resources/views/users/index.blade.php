@extends('layouts.app')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="mt-5">
                @if (session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: '{{ session('success') }}',
                        });
                    </script>
                @endif
                @if ($errors->any())
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '{{ $errors->first() }}',
                        });
                    </script>
                @endif
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Users</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <form class="table-search-form row gx-1 align-items-center" id="search-form"
                                        method="GET" action="{{ route('users.search') }}">
                                        <div class="col-auto">
                                            <input type="text" id="search-orders" name="searchorders"
                                                class="form-control search-orders" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <a class="btn app-btn-secondary" href="" data-toggle="modal"
                                        data-target="#createUserModal">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path fill-rule="evenodd"
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg>
                                        New User
                                    </a>
                                </div>
                            </div><!--//row-->
                        </div><!--//table-utilities-->
                    </div><!--//col-auto-->
                </div><!--//row-->

                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive" style="padding: 15px">
                                    <style>
                                        table.dataTable thead th,
                                        table.dataTable tbody td {
                                            text-align: center;
                                        }

                                        .dt-type-numeric {
                                            text-align: center !important;
                                        }

                                        .table.dataTable {
                                            margin: 0 auto;
                                            /* Center the table horizontally */
                                        }
                                    </style>
                                    <table id="table" class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">
                                                    <div class="text-center">No</div>
                                                </th>
                                                <th class="cell">
                                                    <div class="text-center">Nama</div>
                                                </th>
                                                <th class="cell">
                                                    <div class="text-center">Email</div>
                                                </th>
                                                <th class="cell">
                                                    <div class="text-center">Role</div>
                                                </th>
                                                <th class="cell">
                                                    <div class="text-center">Aksi</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $index => $user)
                                                <tr class="text-center">
                                                    <td class="cell">{{ $index + 1 }}</td>
                                                    <td class="cell">{{ $user->name }}</td>
                                                    <td class="cell">{{ $user->email }}</td>
                                                    <td class="cell">{{ $user->type }}</td>
                                                    <td class="cell">
                                                        <a class="btn-sm app-btn-secondary" data-bs-toggle="modal"
                                                            data-bs-target="#editUserModal-{{ $user->id }}">Edit</a>
                                                        <form id="deleteForm{{ $user->id }}" method="POST"
                                                            action="{{ route('users.destroy', $user->id) }}"
                                                            style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn-sm btn-danger"
                                                                onclick="confirmDelete({{ $user->id }})">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <!-- Edit User Modal -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                    </div>
                </div>

                <!--Modal Edit-->
                @foreach ($users as $user)
                    <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editUserModalLabel-{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title text-dark fw-bold" id="editUserModalLabel-{{ $user->id }}">
                                        Edit User
                                    </h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row mt-1 mb-1">
                                            <label for="name-{{ $user->id }}"
                                                class="col-md-4 col-form-label text-md-right">
                                                <div class="fw-bold">Nama</div>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="name-{{ $user->id }}" type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{ $user->name }}" required
                                                    autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mt-1 mb-1">
                                            <label for="email-{{ $user->id }}"
                                                class="col-md-4 col-form-label text-md-right">
                                                <div class="fw-bold">Email</div>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="email-{{ $user->id }}" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ $user->email }}" required
                                                    autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mt-1 mb-1">
                                            <label for="type-{{ $user->id }}"
                                                class="col-md-4 col-form-label text-md-right">
                                                <div class="fw-bold">Peran</div>
                                            </label>
                                            <div class="col-md-8">
                                                <select id="type"
                                                    class="form-control @error('type') is-invalid @enderror"
                                                    name="type">
                                                    <option value="">Pilih Peran</option>
                                                    <option value="0"
                                                        {{ old('type', $user->type) == 0 ? 'selected' : '' }}>User
                                                    </option>
                                                    <option value="1"
                                                        {{ old('type', $user->type) == 1 ? 'selected' : '' }}>Admin
                                                    </option>
                                                    <option value="2"
                                                        {{ old('type', $user->type) == 2 ? 'selected' : '' }}>Manager</option>
                                                </select>
                                                @error('type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="form-group row mt-3">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Update User') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!--Modal Create-->
                <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog"
                    aria-labelledby="createUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark fw-bold m-1" id="createUserModalLabel">User Baru</h5>
                                <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('users.store') }}">
                                    @csrf
                                    <div class="form-group row mt-1 mb-1">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">
                                            <div class="fw-bold">Nama</div>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-1 mb-1">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">
                                            <div class="fw-bold">Email</div>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-1 mb-1">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">
                                            <div class="fw-bold">Password</div>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input id="password" type="text"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password"
                                                    style="margin-right: 5px">
                                                <div class="input-group-append d-flex justify-content-center">
                                                    <button id="generatePasswordButton" class="btn btn-success"
                                                        type="button"><i class="fas fa-key"></i></button>
                                                </div>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-1 mb-1">
                                        <label for="type" class="col-md-4 col-form-label text-md-right">
                                            <div class="fw-bold">Peran</div>
                                        </label>
                                        <div class="col-md-8">
                                            <select id="type"
                                                class="form-control @error('type_id') is-invalid @enderror" name="type"
                                                required>
                                                <option value="">Pilih Peran</option>
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Manager</option>
                                            </select>
                                            @error('type_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Buat Akun') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
            const generateButton = document.getElementById("generatePasswordButton");

            function generateRandomPassword(length) {
                const charset =
                    "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]\:;?><,./-=";
                let password = "";
                for (let i = 0; i < length; i++) {
                    const randomIndex = Math.floor(Math.random() * charset.length);
                    password += charset[randomIndex];
                }
                return password;
            }

            generateButton.addEventListener("click", function() {
                const generatedPassword = generateRandomPassword(12); // Change the length as needed
                passwordInput.value = generatedPassword;
            });
        });
    </script>

    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan tindakan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus saja!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + userId).submit();
                }
            });
        }
    </script>
@endsection
