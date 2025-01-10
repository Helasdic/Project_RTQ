@extends('layouts.admin')

@section('content')
    <main class="container py-4">
        <div class="row mb-4 align-items-center">
            <div class="col-lg-4">
                <h1 class="fw-bold">Dashboard</h1>
            </div>
            <div class="col-lg-8">
                <div class="d-flex gap-3">
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 15%;">
                        <h5>Pendaftar</h5>
                        <h3 class="fw-bold">{{$getPendaftar -> count()}}</h3>
                    </div>

                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 15%;">
                        <h5>Santri</h5>
                        <h3 class="fw-bold">100</h3>
                    </div>
                    
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 15%;">
                        <h5>Gagal</h5>
                        <h3 class="fw-bold">5</h3>
                    </div>

                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 15%;">
                        <h5>Donatur</h5>
                        <h3 class="fw-bold">{{$getDonatur -> count()}}</h3>
                    </div>

                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 15%;">
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
            @include('dashboard.modal_pendaftar.pendaftar')

            <!-- Santri Tab -->
            <div class="tab-pane fade" id="Santri" role="tabpanel">
                <div class="d-flex justify-content-between mb-3">
                    <button class="btn btn-success"><i class="bi bi-cloud-arrow-down"></i> Ekspor</button>
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
                            @foreach ($getPendaftar as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->nama_panggilan }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->sekolah?->nisn ?? '-' }}</td>
                                <td><i class="bi bi-check-circle text-success"></i></td>
                                <td class="d-flex align-items-center gap-2">
                                    <!-- Button to trigger modal -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#previewModal">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <form action="{{ route('siswa.delete', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus siswa ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
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
            @include('dashboard.modal_donatur.donatur')  

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

    <!-- Modal Pendaftars-->
    <div class="modal fade" id="tambahPendaftarModal" tabindex="-1" aria-labelledby="tambahPendaftarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPendaftarModalLabel">Tambah Pendaftar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container" style="padding: 40px;">
                        <h3 class="primay">Form Pendaftaran</h3>
                    <form id="formDaftar" method="POST" action="{{ route('daftar.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Data Peserta Didik -->
                        <div class="mb-3">
                            <h5>Data Peserta Didik</h5>
                        </div>
                        <div class="mb-3">
                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="namaPanggilan" class="form-label">Nama Panggilan</label>
                            <input type="text" class="form-control" id="namaPanggilan" name="namaPanggilan" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" id="jenisKelamin" name="jenisKelamin" required>
                                <option value="">- pilih -</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamatLengkap" name="alamatLengkap" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Apakah anda sebelumnya bersekolah?</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">- pilih -</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>

                        <!-- Bagian Sekolah (ditampilkan jika 'status' adalah 'Ya') -->
                        <div id="form-sekolah" style="display: none;">
                            <div class="mb-3">
                                <label for="asalSekolah" class="form-label">Asal Sekolah</label>
                                <input type="text" class="form-control" id="asalSekolah" name="asalSekolah">
                            </div>
                            <div class="mb-3">
                                <label for="alamatSekolah" class="form-label">Alamat Sekolah</label>
                                <textarea class="form-control" id="alamatSekolah" name="alamatSekolah" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="number" class="frame-input" id="nisn" aria-describedby="nisn" name="nisn">
                            </div>
                            <div class="mb-3">
                                <label for="npsn" class="form-label">NPSN</label>
                                <input type="number" class="frame-input" id="npsn" aria-describedby="npsn" name="npsn">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="number" class="frame-input" id="nik" aria-describedby="nik" name="nik" required>
                        </div>
                        <div class="mb-3">
                            <label for="anakKe" class="form-label">Anak Ke-</label>
                            <input type="number" class="frame-input" id="anakKe" aria-describedby="anakKe" name="anakKe" required>
                        </div>
                        <div class="mb-4">
                            <label for="jumlahSaudara" class="form-label">Jumlah Saudara Kandung</label>
                            <input type="number" class="frame-input" id="jumlahSaudara" aria-describedby="jumlahSaudara" name="jumlahSaudara" required>
                        </div>

                        <!-- Data Orang Tua/Wali -->
                        <div class="mb-3">
                            <h5>Data Orang Tua/Wali Peserta Didik</h5>
                        </div>
                        <div class="mb-3">
                            <label for="namaAyah" class="form-label">Nama Ayah/Wali</label>
                            <input type="text" class="form-control" id="namaAyah" name="namaAyah" required>
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaanAyah" class="form-label">Pekerjaan</label>
                            <input type="text" class="frame-input" id="pekerjaanAyah" aria-describedby="pekerjaanAyah" name="pekerjaanAyah" required>
                        </div>
                        <div class="mb-3">
                            <label for="pendidikanAyah" class="form-label">Pendidikan</label>
                            <input type="text" class="frame-input" id="pendidikanAyah" aria-describedby="pendidikanAyah" name="pendidikanAyah" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamatAyah" class="form-label">Alamat Lengkap</label>
                            <textarea class="frame-input" id="alamatAyah" aria-describedby="alamatAyah" name="alamatAyah" rows="4" cols="50" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="namaibu" class="form-label">Nama Ibu</label>
                            <input type="text" class="frame-input" id="namaIbu" aria-describedby="namaIbu" name="namaIbu" required>
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaanIbu" class="form-label">Pekerjaan</label>
                            <input type="text" class="frame-input" id="pekerjaanIbu" aria-describedby="pekerjaanIbu" name="pekerjaanIbu" required>
                        </div>
                        <div class="mb-3">
                            <label for="pendidikanIbu" class="form-label">Pendidikan</label>
                            <input type="text" class="frame-input" id="pendidikanIbu" aria-describedby="pendidikanIbu" name="pendidikanIbu" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamatIbu" class="form-label">Alamat Lengkap</label>
                            <textarea class="frame-input" id="alamatIbu" aria-describedby="alamatIbu" name="alamatIbu" rows="4" cols="50" required></textarea>
                        </div>
                        <!-- Tambahkan elemen form lainnya sesuai kebutuhan -->

                        <div class="mb-3">
                            <label for="kartuKeluarga" class="form-label">Upload Kartu Keluarga (KK)</label>
                            <input type="file" class="form-control" id="kartuKeluarga" name="kartuKeluarga" accept=".jpg, .jpeg, .png, .svg, .pdf" required>
                        </div>
                        <div class="mb-3">
                            <label for="aktaKelahiran" class="form-label">Upload Akta Kelahiran</label>
                            <input type="file" class="form-control" id="aktaKelahiran" name="aktaKelahiran" accept=".jpg, .jpeg, .png, .svg, .pdf" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Kirim</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.modal_donatur.addDonatur')
@endsection

@push('myscript')
    <script>
        
        // jquery pendaftar
        $(function(){
            // Menampilkan modal tambah pendaftar
            $("#tambahPendaftarModal").on("show.bs.modal", function(){
                console.log("Modal tambah pendaftar ditampilkan.");
            });

            // Tombol ekspor data
            $(".btn-success:contains('Ekspor')").click(function(){
                Swal.fire({
                    title: "Ekspor Data",
                    text: "Apakah Anda yakin ingin mengekspor data ini?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Ekspor",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire("Data berhasil diekspor!", "", "success");
                    }
                });
            });

            // Tombol pratinjau data
            $(".btn-warning").click(function(){
                const nisn = $(this).closest('tr').find('td:nth-child(2)').text();
                const nama = $(this).closest('tr').find('td:nth-child(3)').text();

                // Contoh menampilkan data di modal
                $("#previewModal .modal-body").html(`
                    <p><strong>NISN:</strong> ${nisn}</p>
                    <p><strong>Nama Lengkap:</strong> ${nama}</p>
                `);
            });

            // Tombol hapus data
            $("form[action*='siswa.delete']").on("submit", function(e){
                e.preventDefault();
                const form = this;
                Swal.fire({
                    title: "Konfirmasi Hapus",
                    text: "Yakin ingin menghapus siswa ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // Dropdown aksi tambahan untuk diterima atau tidak diterima
            $(".dropdown-menu a").click(function(){
                const action = $(this).text();
                const row = $(this).closest('tr');
                const nama = row.find('td:nth-child(3)').text();
                const statusCell = row.find('td:nth-child(6)');

                Swal.fire({
                    title: `Konfirmasi Aksi: ${action}`,
                    text: `Apakah Anda ingin menandai siswa ${nama} sebagai '${action}'?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (action === 'Diterima') {
                            statusCell.html('<i class="bi bi-check-circle text-success"></i>');
                            const newRow = row.clone();
                            newRow.find("td:nth-child(7)").remove(); // Menghapus kolom aksi dari clone
                            $("#Santri tbody").append(newRow);
                        } else if (action === 'Tidak') {
                            statusCell.html('<i class="bi bi-x-circle text-danger"></i>');
                            const newRow = row.clone();
                            newRow.find("td:nth-child(7)").remove(); // Menghapus kolom aksi dari clone
                            $("#tidak-lanjut tbody").append(newRow);
                        }

                        Swal.fire(`Siswa ${nama} telah ditandai sebagai '${action}'.`, "", "success");
                    }
                });
            });
        });

        // view pendaftar

        // jquery donatur
        $(function(){
            $("#add_donatur").click(function(){
                $("#modal-addDonatur").modal("show");
            });

            $(".konfirmasiDeleteDonatur").click(function(e){
                //memilih form dari si button
                form = $(this).closest('form');

                e.preventDefault();
                Swal.fire({
                    title: "Konfirmasi Hapus Data",
                    showCancelButton: true,
                    confirmButtonText: "Delete"
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire("Deleted!", "", "success");
                    }
                });
            });

            $('.edit_donatur').click(function(){
                var id = $(this).attr('kode');

                $.ajax({
                    type: 'POST',
                    url : '{{route('admin.editFormDonatur')}}',
                    cache : false,
                    data : {
                        _token : "{{ csrf_token() }}",
                        id : id
                    },
                    success: function(respond){
                        $("#loadEditDonatur").html(respond);
                    }
                });

                $("#modal-editDonatur").modal("show");
            });

            $(".view_donatur").click(function(){
                var id = $(this).attr('kode');
                // console.log(id);

                $.ajax({
                    type: 'POST',
                    url : '{{route('admin.viewDonatur')}}',
                    cache : false,
                    data : {
                        _token : "{{ csrf_token() }}",
                        id : id
                    },
                    success: function(respond){
                        $("#loadViewDonatur").html(respond);
                    }
                });

                $("#modal-viewDonatur").modal("show");
            });

            //button close modal
            $("#close-view").click(function(){
                $("#modal-viewDonatur").modal("hide");
            });
            $("#close-edit").click(function(){
                $("#modal-editDonatur").modal("hide");
            });

            //pesan sukses 
            $("#formAddDonatur").submit(function(e){  
                e.preventDefault();
                Swal.fire({
                    title: "Data Donatur Ditambahkan!",
                    text: "Data Donatur baru telah berhasil ditambahkan.",
                    icon: "success",
                    confirmButtonText: "Terima Kasih",
                    allowOutsideClick: false,
                    customClass: {
                        title: 'my-title-class', // Class untuk judul
                        content: 'my-content-class', // Class untuk teks konten
                        confirmButton: 'my-confirm-button-class' // Class untuk tombol konfirmasi
                        // Anda juga bisa menambahkan class untuk tombol cancel, popup, icon, dll.
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });

            $("#formEditDonatur").submit(function(e){  
                e.preventDefault();
                Swal.fire({
                    title: "Data Donatur Diperbarui!",
                    text: "Data Donatur baru telah berhasil diperbarui.",
                    icon: "success",
                    confirmButtonText: "Terima Kasih",
                    allowOutsideClick: false,
                    customClass: {
                        title: 'my-title-class', // Class untuk judul
                        content: 'my-content-class', // Class untuk teks konten
                        confirmButton: 'my-confirm-button-class' // Class untuk tombol konfirmasi
                        // Anda juga bisa menambahkan class untuk tombol cancel, popup, icon, dll.
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });

        // Script to toggle sekolah form visibility based on status selection
        document.getElementById('status').addEventListener('change', function () {
            const formSekolah = document.getElementById('form-sekolah');
            if (this.value === 'Ya') {
                formSekolah.style.display = 'block';
            } else {
                formSekolah.style.display = 'none';
            }
        });
    </script>
@endpush