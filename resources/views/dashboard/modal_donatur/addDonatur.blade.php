
    <!-- Modal Add Donatur-->
    <div class="modal fade" id="modal-addDonatur" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: var(--shape-corner-large);">
                <div class="modal-body">
                    <div class="container" style="padding: 40px;">
                        <form id="formAddDonatur" method="POST" action="{{ route('admin.storeDonatur') }}" enctype="multipart/form-data">
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
                                <label for="fotoDonasi" class="form-label">Bukti/Foto Kwitansi</label> 
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

    <!-- Modal Preview Donatur-->
    <div class="modal fade" id="modal-viewDonatur" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body" id="loadViewDonatur">
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" id="close-viewDonatur" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Donatur-->
    <div class="modal fade" id="modal-editDonatur" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body" id="loadEditDonatur">
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" id="close-editDonatur" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                </div>
            </div>
        </div>
    </div>
