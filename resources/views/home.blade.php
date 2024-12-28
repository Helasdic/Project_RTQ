@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="jumbotron">
        <!-- Overlay Text -->
        <div class="hero-overlay position-absolute top-50 start-0 ps-4 translate-middle-y text-white">
            <h1 class="fw-bold">Rumah Tahfidh Qur'an</h1>
            <p class="lead">Menumbuhkan kepercayaan diri dalam menghafal Al-Qur'an sejak dini</p>
            <a href="#daftar" class="btn btn-primary mt-3">Daftar Sekarang</a>
        </div>
    </div>
    
    <!-- Fasilitas -->
    <div class="fasilitas d-flex align-items-center bg-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="p-3">
                        <img src="{{ asset('assets/images/Frame 4.png') }}" alt="Ruangan ber-AC" class="img-fluid" style="width: 50px;">
                        <p class="mt-2">Ruangan ber-AC</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <img src="{{ asset('assets/images/Frame 5.png') }}" alt="Ruangan Nyaman" class="img-fluid" style="width: 50px;">
                        <p class="mt-2">Ruangan Nyaman</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <img src="path-to-icon3.png" alt="Meja Belajar" class="img-fluid" style="width: 50px;">
                        <p class="mt-2">Meja Belajar</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <img src="path-to-icon4.png" alt="Guru Ilmu Al-Quran Profesional" class="img-fluid" style="width: 50px;">
                        <p class="mt-2">Guru Ilmu Al-Quran Profesional</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Visi & Misi -->
    <section id="visi-misi" class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center">Visi & Misi</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <h4>Visi</h4>
                    <p>Menumbuhkan kepercayaan diri dalam menghafal Al-Qur'an, menanamkan karakter Qur'ani, dan mencetak generasi pengkaderan sumber daya manusia yang profesional di bidang Al-Quran dan Sunnah.</p>
                </div>
                <div class="col-md-6">
                    <h4>Misi</h4>
                    <ul>
                        <li>Menumbuhkan kepercayaan diri dalam menghafal Al-Qur'an</li>
                        <li>Menjadi pusat pendidikan Al-Qur'an sejak dini</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Kelas -->
    <section id="program-kelas" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">Program Kelas</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <h5>Kelas Anak (usia 3-15 tahun)</h5>
                    <ul>
                        <li>Sesi Pagi: 06.30 - 08.30 WIB</li>
                        <li>Sesi Sore: 15.30 - 17.30 WIB</li>
                        <li>Sesi Malam: 17.30 - 20.00 WIB</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Kelas Majlis</h5>
                    <ul>
                        <li>Tahsin Remaja: 20.00 - 21.00 WIB</li>
                        <li>Tahsin Dewasa: Ahad Ba'da Maghrib</li>
                        <li>Kelas Bahasa Inggris & Arab: Sabtu - Ahad</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection