<div class="container" style="padding: 40px;">
    <form id="formEditDonatur" method="POST" action="/admin/donatur/{{$getDonatur -> id}}/edit" enctype="multipart/form-data">
        @csrf
        <h3 class="primay">Edit Data Donatur</h3>
        <div class="mb-3 mt-4">
            <h5>Form Donatur</h5>
        </div>
        <div class="mb-3">
            <label for="namaDonatur" class="form-label">Nama Lengkap</label>
            <input type="text" class="frame-input" id="namaDonatur" aria-describedby="namaDonatur" name="namaDonatur" value="{{$getDonatur -> nama_donatur}}" required>
        </div>
        <div class="mb-3">
            <label for="jenisKelaminDonatur" class="form-label">Jenis Kelamin</label>
            <select class="frame-input" aria-label="Default select example" id="jenisKelaminDonatur" name="jenisKelaminDonatur" required>
                <option value="">- pilih -</option>
                <option value="Laki-Laki" {{ $getDonatur->jenis_kelamin_donatur == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="Perempuan" {{ $getDonatur->jenis_kelamin_donatur == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="alamatDonatur" class="form-label">Alamat Lengkap</label>
            <textarea class="frame-input" id="alamatDonatur" aria-describedby="alamatDonatur" name="alamatDonatur" rows="4" cols="50" required>{{$getDonatur -> alamat_donatur}}</textarea>
        </div>

        <div class="mb-3">
            <label for="tanggalDonasi" class="form-label">Tanggal Donasi</label>
            <input type="date" class="frame-input" id="tanggalDonasi" aria-describedby="tanggalDonasi" name="tanggalDonasi" value="{{$getDonatur -> tanggal_donasi}}" required>                                       
        </div>

        <div class="mb-3">
            <label for="nominalDonasi" class="form-label">Nominal Donasi</label>
            <input type="number" class="frame-input" id="nominalDonasi" aria-describedby="nominalDonasi" name="nominalDonasi" value="{{$getDonatur -> nominal_donasi}}" required>
        </div>

        <div class="mb-3">
            <label for="jenisDonasi" class="form-label">Jenis Donasi</label>
            <select class="frame-input" aria-label="Default select example" id="jenisDonasi" name="jenisDonasi" required>
                <option value="">- pilih -</option>
                <option value="Tunai" {{ $getDonatur->jenis_donasi == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                <option value="Non-Tunai" {{ $getDonatur->jenis_donasi == 'Non-Tunai' ? 'selected' : '' }}>Non Tunai</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fotoDonasi" class="form-label">Bukti/Foto Kwitansi</label> 
            <input type="file" class="frame-input" id="fotoDonasi" name="fotoDonasi" accept=".jpg, .jpeg, .png, .svg" max-size="2097152">
            <input type="hidden" class="frame-input" id="fotoLama" name="fotoLama" accept=".jpg, .jpeg, .png, .svg" max-size="2097152" value="{{$getDonatur -> foto_donasi}}" required>
        </div>

        <button type="submit" id="kirim" name="kirim" class="btn w-100 mt-3 kirim" style="background-color: var(--primay-2); color: var(--white-1);">
            <i class="fa fa-send-o"></i> Kirim
        </button>
    </form>
</div>