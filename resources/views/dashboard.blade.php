@extends('layouts.app')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">
                <div class="mt-5">Dashboard</div>
            </h1>
            <div class="row g-4 mb-4">
                <div class="col-12 col-lg-4">
                    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder" style="background: rgb(217, 241, 255)">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt"
                                            fill="blue" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                            <path fill-rule="evenodd"
                                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </div><!--//icon-holder-->

                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Invoices In</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4">

                            <div class="intro">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                aliquet eros vel diam semper mollis.</div>
                        </div><!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="{{ route('invoiceIn.index') }}">Create New</a>
                        </div><!--//app-card-footer-->
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-12 col-lg-4">
                    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder" style="background: rgb(225, 255, 225)">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                            <path fill-rule="evenodd"
                                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </div><!--//icon-holder-->

                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Invoices Out</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4">

                            <div class="intro">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                aliquet eros vel diam semper mollis.</div>
                        </div><!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="{{ route('invoiceOut.index') }}">Create New</a>
                        </div><!--//app-card-footer-->
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-12 col-lg-4">
                    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder" style="background: rgb(253, 220, 220)">
                                        <!-- Contoh menggunakan SVG gambar sepatu -->
                                        <div>
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shoe"
                                                fill="red" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.5 5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5V5zM1.5 12.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-.5zm8-6a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5V6.5zm-8 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5V6.5zM13.5 2a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h11z" />
                                            </svg>
                                        </div>
                                    </div><!--//icon-holder-->
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Shoes</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4">

                            <div class="intro">Pellentesque varius, elit vel volutpat sollicitudin, lacus quam
                                efficitur augue</div>
                        </div><!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="{{ route('sepatu.index') }}">Lihat</a>
                        </div><!--//app-card-footer-->
                    </div><!--//app-card-->
                </div><!--//col-->
            </div><!--//row-->
            <div class="row g-4 mb-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-stats-table h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Invoice Chart</h4>
                                </div><!--//col-->
                                <div class="col-auto">
                                    <div class="card-header-action">
                                        <a href="#">View report</a>
                                    </div><!--//card-header-actions-->
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="app-card-body p-1">
                                <div class="chart-container">
                                    <canvas id="chart-donut" height="125"></canvas>
                                </div>
                            </div><!--//app-card-body-->
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var ctx = document.getElementById('chart-donut').getContext('2d');
                        var donutChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ['Invoice In', 'Invoice Out'], // Replace with dynamic labels as needed
                                datasets: [{
                                    data: [{{ $invoiceIn }},
                                        {{ $invoiceOut }}
                                    ], // Replace with dynamic data as needed
                                    backgroundColor: [
                                        'rgba(54, 162, 235, 0.2)', // Invoice In (biru)
                                        'rgba(75, 192, 192, 0.2)' // Invoice Out (hijau)
                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235, 1)', // Invoice In (biru)
                                        'rgba(75, 192, 192, 1)' // Invoice Out (hijau)
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                legend: {
                                    position: 'right', // Move the legend to the right side
                                },
                                plugins: {
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                var label = context.label || '';
                                                if (label) {
                                                    label += ': ';
                                                }
                                                if (context.parsed !== null) {
                                                    label += context.parsed;
                                                }
                                                return label;
                                            }
                                        }
                                    }
                                }
                            }
                        });

                        // Function to update the chart based on daily data
                        function updateDailyChart() {
                            var url = '/get-daily-invoice-data'; // Replace with actual endpoint
                            fetch(url)
                                .then(response => response.json())
                                .then(data => {
                                    donutChart.data.datasets[0].data = [data.invoiceIn, data
                                        .invoiceOut
                                    ]; // Replace with actual data key
                                    donutChart.update();
                                })
                                .catch(error => {
                                    console.error('Error fetching data:', error);
                                });
                        }

                        // Call the updateDailyChart function when the page loads
                        updateDailyChart();
                    });
                </script>


                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-stats-table h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Shoes</h4>
                                </div><!--//col-->
                                <div class="col-auto">
                                    <div class="card-header-action">
                                        <a href="{{ route('sepatu.index') }}">View</a>
                                    </div><!--//card-header-actions-->
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <thead>
                                        <tr>
                                            <th class="meta">Shoes</th>
                                            <th class="meta stat-cell">Harga</th>
                                            <th class="meta stat-cell">Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // Mengambil 5 data terbaru dengan mengurutkan dari yang terbaru ke yang terlama
                                            $latestShoes = $sepatu->sortByDesc('created_at')->take(5);
                                        @endphp

                                        @foreach ($latestShoes as $item)
                                            <tr>
                                                <td><a href="#file-link" data-bs-toggle="modal"
                                                        data-bs-target="#viewSepatuModal_{{ $item->id }}">{{ $item->kode }}</a>
                                                </td>
                                                <td class="stat-cell">{{ $item->harga }}</td>
                                                <td class="stat-cell">{{ date('d M Y', strtotime($item->created_at)) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->
                @foreach ($sepatu as $item)
                    <div class="modal fade" id="viewSepatuModal_{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="viewSepatuModalLabel_{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewSepatuModalLabel_{{ $item->id }}">
                                        {{ $item->kode }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('foto/' . $item->gambar) }}" alt="Foto Sepatu" class="img-fluid">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection
