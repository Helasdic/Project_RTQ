@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="frame-9">
                            <h3 style="color: var(--primay-2);">Form Pendaftaran</h3>
                            <form>
                                @csrf
                                <div class="mb-3">
                                    <h5>Data Peserta Didik</h5>
                                </div>
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namaLengkap" aria-describedby="namaLengkap" name="namaLengkap">
                                </div>
                                <div class="mb-3">
                                    <label for="namaPanggilan" class="form-label">Nama Panggilan</label>
                                    <input type="email" class="form-control" id="namaPanggilan" aria-describedby="namaPanggilan" name="namaPanggilan">
                                </div>
                                <div class="mb-3">
                                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" aria-label="Default select example" id="jenisKelamin" name="jenisKelamin">
                                        <option selected>- pilih -</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                    <input type="email" class="form-control" id="tempatLahir" aria-describedby="tempatLahir" name="tempatLahir">
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
                </div>
            </div>

            <div class="col-md-6">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="frame-mini" style="background-color: var(--white-2);">
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
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="frame-mini" style="background-color: var(--acsend-1);">
                            <h6>Waktu dan Tempat Pendaftaran Offline</h6>
                            <div class="label">
                                <ol type="1">
                                    <li>Senin s/d Kamis
                                        <ol type="a">
                                            <li>Pagi 06.30 - 08.00 WIB</li>
                                            <li>Sore 15.30 - 17.30 WIB</li>
                                            <li>Malam 17.30 - 20.00 WIB</li>
                                        </ol>
                                    </li>
                                    <li>Jum’at
                                        <ol type="a">
                                            <li>Pagi 07.00 - 10.00 WIB</li>
                                        </ol>
                                    </li>
                                    <li>Sabtu s/d Ahad
                                        <ol type="a">
                                            <li>Sabtu s/d Ahad</li>
                                        </ol>
                                    </li>
                                </ol>

                                <b>RTQ.Alif Laam Miim Pekayon</b>
                                <p>Gg.H. Tabrih No.15-16 Rt/Rw 003/022 Kel.Pekayon Jaya Kec.Bekasi Selatan 17148</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection