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
                        <h1 class="app-page-title mb-0">Invoice Keluar</h1>
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
                                    <a class="btn app-btn-secondary" href="{{ route('invoiceOut.create') }}">
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
                                                    <div class="text-center">ID Invoice</div>
                                                </th>
                                                <th class="cell">
                                                    <div class="text-center">Tanggal</div>
                                                </th>
                                                <th class="cell">
                                                    <div class="text-center">Subtotal</div>
                                                </th>
                                                <th class="cell">
                                                    <div class="text-center">Detail</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoiceOut as $index => $invoice)
                                                <tr class="text-center">
                                                    <td class="cell">{{ $index + 1 }}</td>
                                                    <td class="cell">{{ $invoice->nomor }}</td>
                                                    <td class="cell">
                                                        <span>{{ \Carbon\Carbon::parse($invoice->tgl)->format('d M Y') }}</span>
                                                        <span
                                                            class="note">{{ \Carbon\Carbon::parse($invoice->created_at)->format('g:i A') }}</span>
                                                    </td>
                                                    <td class="cell">Rp. {{ number_format($invoice->total) }}
                                                    </td>
                                                    <td class="cell"><a class="btn-sm app-btn-secondary"
                                                            data-bs-toggle="modal" data-bs-target="#invoiceModal">View</a>
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
            </div>
        </div>
    </div>
@endsection
