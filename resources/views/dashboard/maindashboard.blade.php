@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header class="p-3 border-bottom">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="#" class="btn btn-outline-secondary">Logo</a>
            <nav class="d-flex gap-2">
                <a href="#" class="nav-link px-3">Home</a>
                <a href="#" class="nav-link px-3">Dashboard</a>
                <a href="#" class="nav-link px-3">Visi Misi</a>
                <a href="#" class="nav-link px-3">Kegiatan</a>
            </nav>
            <a href="#" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container py-4">
        <h1 class="fw-bold mb-3">Dashboard</h1>

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

        <!-- Info Cards -->
        <div class="row my-4">
            <div class="col-lg-6 col-md-12 mb-3">
                <div class="card p-3 text-center">
                    <h5>Siswa</h5>
                    <h3 class="fw-bold">100</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mb-3">
                <div class="card p-3 text-center">
                    <h5>Pendaftar</h5>
                    <h3 class="fw-bold">20</h3>
                </div>
            </div>
        </div>

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
        <div class="pagination mt-4">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">&raquo;</a>
        </div>
    </main>
@endsection