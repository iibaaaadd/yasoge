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
                        <h1 class="app-page-title mb-0">Invoice Masuk</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <form class="table-search-form row gx-1 align-items-center" id="search-form">
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
                                    <select class="form-select w-auto" id="filter-options">
                                        <option selected value="all">All</option>
                                        <option value="week">This week</option>
                                        <option value="month">This month</option>
                                        <option value="three-months">Last 3 months</option>
                                    </select>
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
                                        New Invoice
                                    </a>
                                </div>
                            </div><!--//row-->
                        </div><!--//table-utilities-->
                    </div><!--//col-auto-->
                </div><!--//row-->

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const searchInput = document.getElementById('search-orders');
                        const filterOptions = document.getElementById('filter-options');
                        const invoiceRows = document.querySelectorAll('tbody tr');
                        const form = document.getElementById('search-form');

                        form.addEventListener('submit', function(event) {
                            event.preventDefault();
                            filterInvoices();
                        });

                        filterOptions.addEventListener('change', filterInvoices);

                        function filterInvoices() {
                            const searchText = searchInput.value.toLowerCase();
                            const filterValue = filterOptions.value;
                            const currentDate = new Date();

                            invoiceRows.forEach(row => {
                                const invoiceNumber = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                                const invoiceDate = new Date(row.querySelector('td:nth-child(3) span').textContent);
                                let showRow = true;

                                // Filter by search text
                                if (searchText && !invoiceNumber.includes(searchText)) {
                                    showRow = false;
                                }

                                // Filter by date
                                if (filterValue !== 'all') {
                                    const timeDifference = currentDate - invoiceDate;
                                    const daysDifference = timeDifference / (1000 * 3600 * 24);

                                    if (filterValue === 'week' && daysDifference > 7) {
                                        showRow = false;
                                    } else if (filterValue === 'month' && daysDifference > 30) {
                                        showRow = false;
                                    } else if (filterValue === 'three-months' && daysDifference > 90) {
                                        showRow = false;
                                    }
                                }

                                // Show or hide the row
                                if (showRow) {
                                    row.style.display = '';
                                } else {
                                    row.style.display = 'none';
                                }
                            });
                        }
                    });
                </script>

                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
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
                                                    <td class="cell"><a class="btn-sm app-btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#invoiceModal-{{ $user->id }}">View</a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                    </div>
                </div>
                <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog"
                    aria-labelledby="createUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #EEF5FF !important; color: #102C57;">
                                <h5 class="modal-title text-dark fw-bold m-1" id="createUserModalLabel">User Baru</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('users.store') }}">
                                    @csrf
                                    <div class="form-group row mt-1 mb-1">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
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
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Alamat Email') }}</label>
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
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Kata Sandi') }}</label>
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
                                        <label for="role_id"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Peran (type)') }}</label>
                                        <div class="col-md-8">
                                            <select id="role_id"
                                                class="form-control @error('type_id') is-invalid @enderror" name="role_id"
                                                required>
                                                <option value="">Pilih Peran</option>
                                                <option value="0">Admin</option>
                                                <option value="1">Manager</option>
                                                <option value="2">User</option>
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

    <div class="container">
        <h1>Users</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td> <!-- Displaying role here -->
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
