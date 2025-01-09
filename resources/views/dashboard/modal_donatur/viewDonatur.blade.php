<div class="container" style="padding: 10px 40px;">
    <h3 class="primay">Data Detail Donatur</h3>
    <div class="row mt-4">
        <div class="col-md-4 ">
            <h5>Nama Lengkap</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getDonatur -> nama_donatur}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Jenis Kelamin</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getDonatur -> jenis_kelamin_donatur}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Alamat Lengkap</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getDonatur -> alamat_donatur}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Tanggal Masuk Donasi</h5>
        </div>
        <div class="col-md-8">
            <p>: {{date('d/m/Y', strtotime($getDonatur -> tanggal_donasi))}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Nominal Donasi</h5>
        </div>
        <div class="col-md-8">
            <p>: Rp. {{$getDonatur -> nominal_donasi}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Jenis Donasi</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getDonatur -> jenis_donasi}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <h5>Bukti/Foto Kwitansi</h5>
        </div>
        <div class="col-md-8">
            <p>: {{$getDonatur -> foto_donasi}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            {{-- konten kosong --}}
        </div>
        <div class="col-md-8">
            @php
                $cek = $getDonatur -> foto_donasi;
                if($cek == '-'){
                    $icon = asset('assets/images/quran.jpeg');
                } else {
                    $icon = Storage::url('donasi/'.$cek);
                }
            @endphp
            <p><img src="{{ $icon }}" class="img-kegiatan" alt="Bukti Donasi"></p>
        </div>
    </div>
</div>