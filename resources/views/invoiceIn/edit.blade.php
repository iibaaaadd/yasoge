@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Invoice</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('invoiceIn.update', ['id' => $invoiceIn->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nomor" class="col-md-4 col-form-label text-md-right">Nomor</label>

                                <div class="col-md-6">
                                    <input id="nomor" type="text"
                                        class="form-control @error('nomor') is-invalid @enderror" name="nomor"
                                        value="{{ old('nomor', $invoiceIn->nomor) }}" required autofocus>

                                    @error('nomor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tgl" class="col-md-4 col-form-label text-md-right">Tanggal</label>

                                <div class="col-md-6">
                                    <input id="tgl" type="date"
                                        class="form-control @error('tgl') is-invalid @enderror" name="tgl"
                                        value="{{ old('tgl', $invoiceIn->tgl) }}" required>

                                    @error('tgl')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Add fields for other invoice data -->

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Invoice
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
