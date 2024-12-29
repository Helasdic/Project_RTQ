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
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="#6BF5F8"/>
                            <path d="M21.3333 13.3332L24 14.6665L26.6666 13.3332M24 10.6665V19.3332L28 21.6265M31.9039 16.3572L32.0826 19.3332L34.5706 20.9758M35.5466 17.3332L28.0413 21.6665L28.0546 26.2772M34.5706 27.0238L32.0826 28.6665L31.9039 31.6425M35.5466 30.6665L28.0413 26.3332L24.0546 28.6505M26.6666 34.6665L24 33.3332L21.3333 34.6665M24 37.3332V28.6665L20 26.3732M16.096 31.6425L15.9173 28.6665L13.4293 27.0238M12.4532 30.6665L19.9586 26.3332L19.9452 21.7225M13.4293 20.9758L15.9173 19.3332L16.096 16.3572M12.4532 17.3332L19.9586 21.6665L23.9452 19.3492" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        {{-- <img src="{{ asset('assets/images/Frame 4.png') }}" alt="Ruangan ber-AC" class="img-fluid" style="width: 50px;"> --}}
                        <p class="mt-2">Ruangan ber-AC</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="#2BC248"/>
                            <path d="M20 36V28C20 27.2928 20.281 26.6145 20.781 26.1144C21.2811 25.6143 21.9594 25.3333 22.6667 25.3333H25.3333C26.0406 25.3333 26.7189 25.6143 27.219 26.1144C27.719 26.6145 28 27.2928 28 28V36M14.6667 24H12L24 12L36 24H33.3333V33.3333C33.3333 34.0406 33.0524 34.7189 32.5523 35.219C32.0522 35.719 31.3739 36 30.6667 36H17.3333C16.6261 36 15.9478 35.719 15.4477 35.219C14.9476 34.7189 14.6667 34.0406 14.6667 33.3333V24Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        {{-- <img src="{{ asset('assets/images/Frame 5.png') }}" alt="Ruangan Nyaman" class="img-fluid" style="width: 50px;"> --}}
                        <p class="mt-2">Ruangan Nyaman</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="#B39600"/>
                            <path d="M12 16H36M13.3333 16V33.3333M34.6667 33.3333V16M13.3333 21.3333H34.6667M28 16V26.6667C28 27.3739 28.281 28.0522 28.781 28.5523C29.2811 29.0524 29.9594 29.3333 30.6667 29.3333H34.6667" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        {{-- <img src="path-to-icon3.png" alt="Meja Belajar" class="img-fluid" style="width: 50px;"> --}}
                        <p class="mt-2">Meja Belajar</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="#027518"/>
                            <path d="M37.3333 19.9998L24 14.6665L10.6667 19.9998L24 25.3332L37.3333 19.9998ZM37.3333 19.9998V27.9998M16 22.1332V29.3332C16 30.394 16.8428 31.4115 18.3431 32.1616C19.8434 32.9117 21.8783 33.3332 24 33.3332C26.1217 33.3332 28.1566 32.9117 29.6568 32.1616C31.1571 31.4115 32 30.394 32 29.3332V22.1332" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
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