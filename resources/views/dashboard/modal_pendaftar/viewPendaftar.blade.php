<div class="container" style="padding: 10px 40px;">
    <h3 class="primay">Data Detail Pendaftar</h3>

    {{-- data siswa --}}
    <div class="row mt-3 primay">
        <h4>Data Peserta Didik</h4>
    </div>
    <div class="row mt-1">
        <div class="col-md-4 ">
            <h5>Nama Lengkap</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> nama_lengkap}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Nama Panggilan</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> nama_panggilan}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Jenis Kelamin</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> jenis_kelamin}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Tempat Lahir</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> tempat_lahir}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Tanggal Lahir</h5>
        </div>
        <div class="col-md-8">
            <p>: {{date('d/m/Y', strtotime($getPendaftar -> tanggal_lahir))}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Alamat Lengkap</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> alamat_lengkap}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>NIK</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> nik}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Anak Ke-</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> anak_ke}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Jumlah Saudara Kandung</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> jumlah_saudara_kandung}}</p>
        </div>
    </div>
    
    {{-- Data Orang Tua --}}
    <div class="row mt-3 primay">
        <h4>Data Orang Tua/Wali</h4>
    </div>
    <div class="row mt-1">
        <div class="col-md-4 ">
            <h5>Nama Ayah</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> walisiswa -> nama_ayah}}</p>
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-4 ">
            <h5>Pekerjaan Ayah</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> walisiswa -> pekerjaan_ayah}}</p>
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-4 ">
            <h5>Pendidikan Ayah</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> walisiswa -> pendidikan_ayah}}</p>
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-4 ">
            <h5>Alamat Ayah</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> walisiswa -> alamat_ayah}}</p>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-4 ">
            <h5>Nama ibu</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> walisiswa -> nama_ibu}}</p>
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-4 ">
            <h5>Pekerjaan ibu</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> walisiswa -> pekerjaan_ibu}}</p>
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-4 ">
            <h5>Pendidikan ibu</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> walisiswa -> pendidikan_ibu}}</p>
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-4 ">
            <h5>Alamat ibu</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> walisiswa -> alamat_ibu}}</p>
        </div>
    </div>

    {{-- data sekolah --}}
    <div class="row mt-3 primay">
        <h4>Data Sekolah Asal</h4>
    </div>
    <div class="row mt-1">
        <div class="col-md-4 ">
            <h5>Asal Sekolah</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> sekolah -> asal_sekolah ?? '-'}}</p>
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-4 ">
            <h5>Alamat Sekolah</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> sekolah -> alamat_sekolah ?? '-'}}</p>
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-4 ">
            <h5>NISN</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> sekolah -> nisn ?? '-'}}</p>
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-4 ">
            <h5>NPSN</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> sekolah -> npsn ?? '-'}}</p>
        </div>
    </div>

    {{-- Data Berkas Upload --}}
    <div class="row mt-3 primay">
        <h4>Data Berkas Upload</h4>
    </div>
    <div class="row mt-1">
        <div class="col-md-4 ">
            <h5>Kartu Keluarga</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> kartu_keluarga}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            {{-- konten kosong --}}
        </div>
        <div class="col-md-8">
            @php
                $cek = $getPendaftar -> kartu_keluarga;
                if($cek == '-'){
                    $icon = asset('assets/images/quran.jpeg');
                } else {
                    $icon = Storage::url('kartu_keluarga/'.$cek);
                }
            @endphp
            <p><img src="{{ $icon }}" class="img-kegiatan" alt="Kartu Keluarga"></p>
        </div>
    </div>

    <div class="row mt">
        <div class="col-md-4 ">
            <h5>Akta Kelahiran</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getPendaftar -> akta_kelahiran}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            {{-- konten kosong --}}
        </div>
        <div class="col-md-8">
            @php
                $cek = $getPendaftar -> akta_kelahiran;
                if($cek == '-'){
                    $icon = asset('assets/images/quran.jpeg');
                } else {
                    $icon = Storage::url('akta_kelahiran/'.$cek);
                }
            @endphp
            <p><img src="{{ $icon }}" class="img-kegiatan" alt="Akta Kelahiran"></p>
        </div>
    </div>
   
</div>