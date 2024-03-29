@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Kategori</div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="/kategori/create"class="btn btn-primary">
                        <i class="bi bi-plus-circle-fill mr-l"></i>
                        <span>Tambah Kategori</span>
                    </a>

                </div>
                {{$dataTable->table()}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush