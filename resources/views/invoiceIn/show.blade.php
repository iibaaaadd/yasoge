@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Invoice #{{ $invoiceIn->id }}</h1>
        <p>Date: {{ $invoiceIn->created_at->format('d-m-Y') }}</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sepatu ID</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoiceIn->items as $item)
                    <tr>
                        <td>{{ $item->sepatu->kode}}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('invoiceIn.index') }}" class="btn btn-primary">Back to Invoices</a>
    </div>
@endsection
