@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="jumbotron">
        <!-- Overlay Text -->
        <div class="hero-overlay position-absolute top-50 start-0 ps-4 translate-middle-y text-white">
            <h1 class="fw-bold">Rumah Tahfidh Qur'an</h1>
            <p class="lead">Menumbuhkan kepercayaan diri dalam menghafal Al-Qur'an sejak dini</p>
            <a href="#daftar" class="btn btn-success mt-3" style="width: fit-content">Daftar Sekarang</a>
        </div>
    </div>
    
    <!-- Fasilitas -->
    <div class="fasilitas d-flex align-items-center bg-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="p-3 d-flex">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="#6BF5F8"/>
                            <path d="M21.3333 13.3332L24 14.6665L26.6666 13.3332M24 10.6665V19.3332L28 21.6265M31.9039 16.3572L32.0826 19.3332L34.5706 20.9758M35.5466 17.3332L28.0413 21.6665L28.0546 26.2772M34.5706 27.0238L32.0826 28.6665L31.9039 31.6425M35.5466 30.6665L28.0413 26.3332L24.0546 28.6505M26.6666 34.6665L24 33.3332L21.3333 34.6665M24 37.3332V28.6665L20 26.3732M16.096 31.6425L15.9173 28.6665L13.4293 27.0238M12.4532 30.6665L19.9586 26.3332L19.9452 21.7225M13.4293 20.9758L15.9173 19.3332L16.096 16.3572M12.4532 17.3332L19.9586 21.6665L23.9452 19.3492" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="mt-2 ps-2">Ruangan ber-AC</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 d-flex">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="#2BC248"/>
                            <path d="M20 36V28C20 27.2928 20.281 26.6145 20.781 26.1144C21.2811 25.6143 21.9594 25.3333 22.6667 25.3333H25.3333C26.0406 25.3333 26.7189 25.6143 27.219 26.1144C27.719 26.6145 28 27.2928 28 28V36M14.6667 24H12L24 12L36 24H33.3333V33.3333C33.3333 34.0406 33.0524 34.7189 32.5523 35.219C32.0522 35.719 31.3739 36 30.6667 36H17.3333C16.6261 36 15.9478 35.719 15.4477 35.219C14.9476 34.7189 14.6667 34.0406 14.6667 33.3333V24Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="mt-2 ps-2">Ruangan Nyaman</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 d-flex">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="#B39600"/>
                            <path d="M12 16H36M13.3333 16V33.3333M34.6667 33.3333V16M13.3333 21.3333H34.6667M28 16V26.6667C28 27.3739 28.281 28.0522 28.781 28.5523C29.2811 29.0524 29.9594 29.3333 30.6667 29.3333H34.6667" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="mt-2 ps-2">Meja Belajar</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="p-3 d-flex">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="#027518"/>
                            <path d="M37.3333 19.9998L24 14.6665L10.6667 19.9998L24 25.3332L37.3333 19.9998ZM37.3333 19.9998V27.9998M16 22.1332V29.3332C16 30.394 16.8428 31.4115 18.3431 32.1616C19.8434 32.9117 21.8783 33.3332 24 33.3332C26.1217 33.3332 28.1566 32.9117 29.6568 32.1616C31.1571 31.4115 32 30.394 32 29.3332V22.1332" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="mt-2 ps-2 text-start">Guru Ilmu Al-Quran Profesional</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Program Unggulan-->
    <section id="program-unggulan" class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center">Program Unggulan</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="d-flex align-items-center bg-light rounded p-3 mb-3 me-5">
                        <div class="icon-container me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#2BC248" viewBox="0 0 24 24">
                                <path d="M12 22c5.514 0 10-4.486 10-10s-4.486-10-10-10-10 4.486-10 10 4.486 10 10 10zm0-4l-5-5h3v-6h4v6h3l-5 5z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="mb-1">Pra Qur'an (Metode Alif Laam Miim)</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center bg-light rounded p-3 ms-5">
                        <div class="icon-container me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#2BC248" viewBox="0 0 24 24">
                                <path d="M12 22c5.514 0 10-4.486 10-10s-4.486-10-10-10-10 4.486-10 10 4.486 10 10 10zm0-4l-5-5h3v-6h4v6h3l-5 5z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="mb-1">Tahfidzul Quran (Menghafal Al Quran)</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/quran.jpeg') }}" alt="Program Unggulan" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>
    
    <!-- Visi & Misi -->
    <section id="visi-misi" class="py-5 bg-white">
        <div class="container">
            <div class="row mt-4 align-items-center">
                <div class="col-md-6">
                    <h2 class="text-start visi">Visi</h2>
                </div>
                <div class="col-md-6">
                    <h2 class="text-start misi">Misi</h2>
                </div>
            </div>
            <div class="row mt-4 align-items-center">
                <!-- Visi -->
                <div class="col-md-6 text-start border-end">
                    <ul style="list-style-type: disc;">
                        <li>Menumbuhkan kepercayaan diri dalam menghafal Al-Qur'an</li>
                        <li>Menanamkan karakter Qur'ani</li>
                        <li>Mencetak generasi pengkaderan sumber daya manusia yang profesional di bidang Al-Quran dan Sunnah</li>
                    </ul>
                </div>
                <!-- Misi -->
                <div class="col-md-6">
                    <ul style="list-style-type: disc;">
                        <li>Menumbuhkan kepercayaan diri dalam menghafal Al-Qur'an</li>
                        <li>Menjadi pusat pendidikan Al-Qur'an sejak dini</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="program-kelas" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Program Kelas</h2>
            <div class="row align-items-center">
                <!-- Gambar Kelas -->
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/masjid.jpeg') }}" alt="Program Kelas" class="img-fluid rounded">
                </div>
                
                <!-- Daftar Program -->
                <div class="col-md-6">
                    <div class="mt-3 border-start border-3 border-secondary ps-4">
                        <div class="mb-4">
                            <span class="badge bg-success mb-2">Kelas Anak (usia 3-15 tahun)</span>
                            <ul class="list-unstyled">
                                <li>Sesi Pagi: 06.30 - 08.30 WIB</li>
                                <li>Sesi Sore: 15.30 - 17.30 WIB</li>
                                <li>Sesi Malam: 17.30 - 20.00 WIB</li>
                            </ul>
                        </div>
                        <div class="mb-4">
                            <span class="badge bg-success mb-2">Kelas Majlis Tahsin Remaja</span>
                            <ul class="list-unstyled">
                                <li>Waktu: 20.00 - 21.00 WIB</li>
                            </ul>
                        </div>
                        <div class="mb-4">
                            <span class="badge bg-success mb-2">Kelas Majlis Tahsin Dewasa</span>
                            <ul class="list-unstyled">
                                <li>Setiap Ahad ba'da Maghrib</li>
                            </ul>
                        </div>
                        <div>
                            <span class="badge bg-success mb-2">Kelas Bahasa Inggris</span>
                            <ul class="list-unstyled">
                                <li>Sabtu - Ahad</li>
                            </ul>
                        </div>
                        <div>
                            <span class="badge bg-success mb-2">Kelas Bahasa Arab</span>
                            <ul class="list-unstyled">
                                <li>Sabtu - Ahad</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="kegiatan-kelas" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Kegiatan Kelas</h2>
            <div class="row align-items-center">
                <!-- Daftar Kegiatan -->
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-bookmark-check-fill text-success me-3"></i> Tasmi' Quran 1 Juz
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-people-fill text-success me-3"></i> Qari Anak & Dewasa
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-bag-fill text-success me-3"></i> Outing Class
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-mountain text-success me-3"></i> Tahfidz Camp
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-torch text-success me-3"></i> Pawai Obor
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-house-door-fill text-success me-3"></i> Pesantren Weekend
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-moon-stars-fill text-success me-3"></i> Pesantren Ramadhan
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-award-fill text-success me-3"></i> Lomba Tahlil & Tahsin Hijriyah
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bi bi-flag-fill text-success me-3"></i> Lomba Agustusan
                        </li>
                    </ul>
                </div>
    
                <!-- Gambar Kegiatan -->
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/kegiatan.jpeg') }}" alt="Kegiatan Kelas" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <section id="para-donatur" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Para Donatur</h2>
            <div class="d-flex flex-wrap justify-content-center">
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
                <div class="badge bg-light text-dark border rounded-pill shadow-sm py-2 px-4 m-2 d-flex align-items-center">
                    <i class="bi bi-person-circle text-warning me-2"></i> Yanto Widyatmoko
                </div>
            </div>
        </div>
    </section>

    <!-- Section Feedback -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Feedback Text -->
                <div class="col-md-6">
                    <div>
                        <h2 class="fw-bold">Feedback</h2>
                        <p>
                            Pesan dan Masukkan dari anda sangat berharga bagi kami untuk kemajuan dan perkembangan 
                            yang lebih baik lagi bagi Rumah Tahfidz Quran kedepannya.
                        </p>
                    </div>
                </div>

                <!-- Feedback Form -->
                <div class="col-md-6">
                    <div class="p-4 shadow-sm bg-white rounded">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
                            </div>
                            <div class="mb-3">
                                <label for="feedback" class="form-label">Pesan Feedback</label>
                                <textarea name="feedback" id="feedback" rows="5" class="form-control" placeholder="Masukkan pesan feedback" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-send"></i> Kirim
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection