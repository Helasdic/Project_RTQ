@extends('layouts.app')

@section('content')
    <main class="container py-4">
        <div class="row mb-4 align-items-center">
            <div class="col-lg-6">
                <h1 class="fw-bold">Dashboard</h1>
            </div>
            <div class="col-lg-6">
                <div class="d-flex gap-3">
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="min-width: 150px;">
                        <h5>Siswa</h5>
                        <h3 class="fw-bold">100</h3>
                    </div>
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="min-width: 150px;">
                        <h5>Pendaftar</h5>
                        <h3 class="fw-bold">20</h3>
                    </div>
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="min-width: 150px;">
                        <h5>Tidak Lanjut</h5>
                        <h3 class="fw-bold">5</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Pendaftar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Donatur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tidak Lanjut</a>
            </li>
        </ul>

        <!-- Buttons -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
            <button class="btn btn-success"><i class="bi bi-cloud-arrow-down"></i> Ekspor</button>
            <button class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Pendaftar</button>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Panggilan</th>
                        <th>Jenis Kelamin</th>
                        <th>NISN</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data -->
                    <tr>
                        <td>1</td>
                        <td>453463636</td>
                        <td>Ilhamudin Armayin</td>
                        <td>Ilham</td>
                        <td>Laki-laki</td>
                        <td>453463636</td>
                        <td><i class="bi bi-check-circle text-success"></i></td>
                        <td>
                            <button class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <!-- Tambahkan data lainnya -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            <a href="#" class="btn btn-outline-secondary me-1">&laquo;</a>
            <a href="#" class="btn btn-secondary">1</a>
            <a href="#" class="btn btn-outline-secondary ms-1">&raquo;</a>
        </div>
    </main>
@endsection