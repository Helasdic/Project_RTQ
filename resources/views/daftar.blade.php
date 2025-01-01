@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="frame-9">
                    <h3>Form Pendaftaran</h3>
                    <h5>Data Peserta Didik</h5>
    
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="frame-8">
                        <h6>Syarat dan Ketentuan</h6>
                        <div class="label">
                            <ol type="1">
                                <li>Minimal anak berusia 2,5 - 12 Tahun</li>
                                <li>Mengikuti tes kemampuan membaca Al Quran dan hafalan</li>
                                <li>Menyerahkan Fotocopy Akta Kelahiran dan Kartu Keluarga(KK)</li>
                                <li>Mengisi Formulir Pendaftaran(bisa langsung di kantor RTQ atau via online)</li>
                                <li>Membayar administrasi
                                    <ol type="a">
                                        <li>Pendaftaran Rp.100.000(dapat kartu identitas dan buku metode alif laam miim)</li>
                                        <li>Infaq bulanan Rp.150.000(dibayar setelah 1 bulan)</li>
                                    </ol>
                                <li>Memiliki kemauan yang kuat dalam menghafal Alquran antara orang tua dan anak</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="frame-8">
                        <h6>Kontak Kami</h6>
                    </div>
                <//div>
            </div>
        </div>  
    </div>
@endsection