@extends('layouts.app')

@section('content')
    <main class="container py-4">
        <div class="row mb-4 align-items-center">
            <div class="col-lg-6">
                <h1 class="fw-bold">Dashboard</h1>
            </div>
            <div class="col-lg-6">
                <div class="d-flex gap-3">
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="min-width: 35%;">
                        <h5>Santri</h5>
                        <h3 class="fw-bold">100</h3>
                    </div>
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="min-width: 25%;">
                        <h5>Pendaftar</h5>
                        <h3 class="fw-bold">20</h3>
                    </div>
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="min-width: 15%;">
                        <h5>Tidak Lanjut</h5>
                        <h3 class="fw-bold">5</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pendaftar-tab" data-bs-toggle="tab" data-bs-target="#pendaftar" type="button" role="tab">Pendaftar</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Santri-tab" data-bs-toggle="tab" data-bs-target="#Santri" type="button" role="tab">Santri</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="donatur-tab" data-bs-toggle="tab" data-bs-target="#donatur" type="button" role="tab">Donatur</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tidak-lanjut-tab" data-bs-toggle="tab" data-bs-target="#tidak-lanjut" type="button" role="tab">Tidak Lanjut</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="feedback-tab" data-bs-toggle="tab" data-bs-target="#feedback" type="button" role="tab">Feedback</button>
            </li>
        </ul>

        <div class="tab-content mt-4" id="dashboardTabsContent">
            <!-- Pendaftar Tab -->
            <div class="tab-pane fade show active" id="pendaftar" role="tabpanel">
                <div class="d-flex justify-content-between mb-3">
                    <button class="btn btn-success"><i class="bi bi-cloud-arrow-down"></i> Ekspor</button>
                    <button class="btn btn-success ms-2" onclick="window.location.href='{{ route('daftar') }}'">
                        <i class="bi bi-plus-circle"></i> Tambah Pendaftar
                    </button>                    
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-success">
                            <tr>
                                <th>No.</th>
                                <th>NISN</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Panggilan</th>
                                <th>Jenis Kelamin</th>
                                <th>NO.TELP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>453463636</td>
                                <td>Ilhamudin Armayin</td>
                                <td>Ilham</td>
                                <td>Laki-laki</td>
                                <td>081310691612</td>
                                <td><i class="bi bi-check-circle text-success"></i></td>
                                <td>
                                    <!-- Button to trigger modal -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#previewModal">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Santri Tab -->
            <div class="tab-pane fade" id="Santri" role="tabpanel">
                <div class="d-flex justify-content-between mb-3">
                    <button class="btn btn-success"><i class="bi bi-cloud-arrow-down"></i> Ekspor</button>
                    <button class="btn btn-success ms-2"><i class="bi bi-plus-circle"></i> Tambah Santri</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-info">
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
                            <tr>
                                <td>1</td>
                                <td>567890123</td>
                                <td>Ahmad Budi</td>
                                <td>Budi</td>
                                <td>Laki-laki</td>
                                <td>567890123</td>
                                <td><i class="bi bi-check-circle text-success"></i></td>
                                <td>
                                    <button class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Donatur Tab -->
            <div class="tab-pane fade" id="donatur" role="tabpanel">
                <div class="d-flex justify-content-between mb-3">
                    <button class="btn btn-success"><i class="bi bi-cloud-arrow-down"></i> Ekspor</button>
                    <button class="btn btn-success ms-2"><i class="bi bi-plus-circle"></i> Tambah Donatur</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th>No.</th>
                                <th>Nama Lengkap</th>
                                <th>Jumlah Donasi</th>
                                <th>Tanggal Donasi</th>
                                <th>Jenis Donasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ilhamudin Armayin</td>
                                <td>Rp10.000.000</td>
                                <td>12/12/2024</td>
                                <td>Cash</td>
                                <td>
                                    <button class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-secondary btn-sm"><i class="bi bi-three-dots"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Muhammad Yusuf</td>
                                <td>Rp5.000.000</td>
                                <td>12/12/2024</td>
                                <td>Cash</td>
                                <td>
                                    <button class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-secondary btn-sm"><i class="bi bi-three-dots"></i></button>
                                </td>
                            </tr>
                            <!-- Tambahkan data lainnya sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
            </div>            

            <!-- Tidak Lanjut Tab -->
            <div class="tab-pane fade" id="tidak-lanjut" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-danger">
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
                            <tr>
                                <td>1</td>
                                <td>453463636</td>
                                <td>Ilhamudin Armayin</td>
                                <td>Ilham</td>
                                <td>Laki-laki</td>
                                <td>453463636</td>
                                <td><i class="bi bi-x-circle text-danger"></i></td>
                                <td>
                                    <button class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Feedback Tab -->
            <div class="tab-pane fade" id="feedback" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-success">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Pak Sujud</td>
                                <td>ahlisujud@gmail.com</td>
                                <td>yang sudah, boleh pulang</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Profil Lengkap Pendaftar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>NISN</th>
                            <td>453463636</td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>Ilhamudin Armayin</td>
                        </tr>
                        <tr>
                            <th>Nama Panggilan</th>
                            <td>Ilham</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>Laki-laki</td>
                        </tr>
                        <tr>
                            <th>No. Telp</th>
                            <td>081310691612</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>Jl. Contoh Alamat No. 123, Jakarta</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>01 Januari 2005</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection