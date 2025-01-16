{{-- Modal Add Pendaftar --}}
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

<!-- Modal Preview Pendaftar-->
<div class="modal fade" id="modal-viewPendaftar" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="loadViewPendaftar">
                
            </div>
            
            <div class="modal-footer">
                <button type="button" id="close-viewPendaftar" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Pendaftar-->
<div class="modal fade" id="modal-editPendaftar" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="loadEditPendaftar">
                
            </div>
            
            <div class="modal-footer">
                <button type="button" id="close-editPendaftar" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
            </div>
        </div>
    </div>
</div>