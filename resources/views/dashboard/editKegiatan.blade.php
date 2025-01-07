<div class="container" style="padding: 40px;">
    <form id="formKegiatan" method="POST" action="/admin/kegiatan/{{$getKegiatan->id}}/edit" enctype="multipart/form-data">
        @csrf
        <h3 class="primay">Edit Kegiatan</h3>
        <div class="mb-3 mt-4">
            <h5>Form Kegiatan</h5>
        </div>
        <div class="mb-3">
            <label for="namaKegiatan" class="form-label">Nama Kegiatan</label>
            <input type="text" class="frame-input" id="namaKegiatan" aria-describedby="namaKegiatan" name="namaKegiatan" value="{{ $getKegiatan->nama_kegiatan }}" required>    
        </div>
        <div class="mb-3">
            <label for="linkKegiatan" class="form-label">Link Kegiatan</label>
            <input type="text" class="frame-input" id="linkKegiatan" aria-describedby="linkKegiatan" name="linkKegiatan" value="{{ $getKegiatan->link }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggalMulai" class="form-label">Tanggal Mulai</label>
            <input type="date" class="frame-input" id="tanggalMulai" aria-describedby="tanggalMulai" name="tanggalMulai" value="{{ $getKegiatan->tanggal_mulai}}" required>                                       
        </div>
        <div class="mb-3">
            <label for="tanggalSelesai" class="form-label">Tanggal Berakhir</label>
            <input type="date" class="frame-input" id="tanggalSelesai" aria-describedby="tanggalSelesai" name="tanggalSelesai" value="{{ $getKegiatan->tanggal_selesai }}" required>                                       
        </div>

        <div class="mb-3">
            <label for="fotoKegiatan" class="form-label">Thumbnail/Foto Kegiatan</label> 
            <input type="file" class="frame-input" id="fotoKegiatan" name="fotoKegiatan" accept=".jpg, .jpeg, .png, .svg" max-size="2097152">
            <input type="hidden" class="frame-input" id="fotoKegiatanLama" name="fotoKegiatanLama" value="{{ $getKegiatan->foto_kegiatan }}" accept=".jpg, .jpeg, .png, .svg" max-size="2097152">
        </div>

        <button type="submit" id="kirim" name="kirim" class="btn w-100 mt-3 kirim" style="background-color: var(--primay-2); color: var(--white-1);">
            <i class="fa fa-send-o"></i> Kirim
        </button>
    </form>
</div>