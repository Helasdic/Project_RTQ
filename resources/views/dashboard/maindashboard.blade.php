@extends('layouts.admin')

@section('content')
    <main class="container py-4">
        <div class="row mb-4 align-items-center">
            <div class="col-lg-6">
                <h1 class="fw-bold">Dashboard</h1>
            </div>
            <div class="col-lg-6">
                <div class="d-flex gap-3">
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 25%;">
                        <h5>Pendaftar</h5>
                        <h3 class="fw-bold">{{$getPendaftar -> count()}}</h3>
                    </div>

                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 25%;">
                        <h5>Santri</h5>
                        <h3 class="fw-bold">100</h3>
                    </div>
                    
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 25%;">
                        <h5>Gagal</h5>
                        <h3 class="fw-bold">5</h3>
                    </div>

                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 25%;">
                        <h5>Donatur</h5>
                        <h3 class="fw-bold">{{$getDonatur -> count()}}</h3>
                    </div>

                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 25%;">
                        <h5>Feedback</h5>
                        <h3 class="fw-bold">{{$getFeedback -> count()}}</h3>
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
                <button class="nav-link" id="tidak-lanjut-tab" data-bs-toggle="tab" data-bs-target="#tidak-lanjut" type="button" role="tab">Gagal</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="donatur-tab" data-bs-toggle="tab" data-bs-target="#donatur" type="button" role="tab">Donatur</button>
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
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#santriModal"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
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
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#tidakLanjutModal"><i class="bi bi-eye"></i></button>
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
                    <button id="add_donatur" class="btn btn-success ms-2"><i class="bi bi-plus-circle"></i> Tambah Donatur</button>
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
                            @foreach ($getDonatur as $donatur )
                                <tr>
                                    <td>1</td>
                                    <td>{{$donatur -> nama_donatur}}</td>
                                    <td>Rp. {{$donatur -> nominal_donasi}}</td>
                                    <td>{{date('d/m/Y', strtotime($donatur -> tanggal_donasi))}}</td>
                                    <td>{{$donatur -> jenis_donasi}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#donaturModal"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-secondary btn-sm"><i class="bi bi-three-dots"></i></button>
                                    </td>
                                </tr>
                            @endforeach
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
                            @foreach ($getFeedback as $feedback )
                                <tr>
                                <td>{{$loop -> iteration + $getFeedback->firstItem()-1 }}</td>
                                <td>{{$feedback -> nama}}</td>
                                <td>{{$feedback -> email}}</td>
                                <td>{{$feedback -> pesan}}</td>
                            </tr>
                            @endforeach
                            
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

    <!-- Modal Donatur-->
    <div class="modal fade" id="modal-addDonatur" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: var(--shape-corner-large);">
                <div class="modal-body">
                    <div class="container" style="padding: 40px;">
                        <form id="formDonatur" method="POST" action="{{ route('admin.storeDonatur') }}" enctype="multipart/form-data">
                            @csrf
                            <h3 class="primay">Tambahkan Donatur</h3>
                            <div class="mb-3 mt-4">
                                <h5>Form Donatur</h5>
                            </div>
                            <div class="mb-3">
                                <label for="namaDonatur" class="form-label">Nama Lengkap</label>
                                <input type="text" class="frame-input" id="namaDonatur" aria-describedby="namaDonatur" name="namaDonatur" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenisKelaminDonatur" class="form-label">Jenis Kelamin</label>
                                <select class="frame-input" aria-label="Default select example" id="jenisKelaminDonatur" name="jenisKelaminDonatur" required>
                                    <option value="">- pilih -</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamatDonatur" class="form-label">Alamat Lengkap</label>
                                <textarea class="frame-input" id="alamatDonatur" aria-describedby="alamatDonatur" name="alamatDonatur" rows="4" cols="50" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="tanggalDonasi" class="form-label">Tanggal Donasi</label>
                                <input type="date" class="frame-input" id="tanggalDonasi" aria-describedby="tanggalDonasi" name="tanggalDonasi" required>                                       
                            </div>

                            <div class="mb-3">
                                <label for="nominalDonasi" class="form-label">Nominal Donasi</label>
                                <input type="number" class="frame-input" id="nominalDonasi" aria-describedby="nominalDonasi" name="nominalDonasi" required>
                            </div>

                            <div class="mb-3">
                                <label for="jenisDonasi" class="form-label">Jenis Donasi</label>
                                <select class="frame-input" aria-label="Default select example" id="jenisDonasi" name="jenisDonasi" required>
                                    <option value="">- pilih -</option>
                                    <option value="Tunai">Tunai</option>
                                    <option value="Non-Tunai">Non Tunai</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="fotoDonasi" class="form-label">Thumbnail/Foto Kegiatan</label> 
                                <input type="file" class="frame-input" id="fotoDonasi" name="fotoDonasi" accept=".jpg, .jpeg, .png, .svg" max-size="2097152">
                            </div>

                            <button type="submit" id="kirim" name="kirim" class="btn w-100 mt-3 kirim" style="background-color: var(--primay-2); color: var(--white-1);">
                                <i class="fa fa-send-o"></i> Kirim
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script>
        $(function(){
            $("#add_donatur").click(function(){
                $("#modal-addDonatur").modal("show");
            });
        });
    </script>
    
@endpush