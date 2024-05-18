@extends('layouts.app')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="mt-5">
                <div class="row g-3 mb-3 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                            {{ $invoiceIn->nomor }}
                        </h1>
                    </div>
                    <div class="col-auto">
                        <div style="font-size: 1 rem; margin-top: 10px;">
                            <i>{{ \Carbon\Carbon::parse($invoiceIn->tgl)->format('d M Y') }}</i>
                        </div>
                    </div><!--//col-auto-->
                </div><!--//row-->
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-3">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="cell">Kode</th>
                                                <th class="cell">Jumlah</th>
                                                <th class="cell">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoiceIn->items as $item)
                                                <tr class="text-center">
                                                    <td class="cell">{{ $item->sepatu->kode }}</td>
                                                    <td class="cell">{{ $item->jumlah }}</td>
                                                    <td class="cell">Rp. {{ number_format($item->harga) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tr class="text-center">
                                            <td class="cell" colspan="2"><strong>TOTAL</strong></td>
                                            <td class="cell"><strong></strong>Rp. {{ number_format($invoiceIn->total) }}
                                            </td>
                                        </tr>
                                    </table>
                                </div><!--//table-responsive-->
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                        <td class="cell"><a class="btn-sm app-btn-secondary"
                                href="{{ route('invoiceIn.index') }}">Back</a>
                        </td>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
