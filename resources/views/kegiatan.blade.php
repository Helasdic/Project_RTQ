@extends('layouts.app')

@section('content')

<!-- Section Semua Kegiatan -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center mb-4">Semua Kegiatan</h2>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <!-- Kegiatan 1 -->
                <div class="col">
                    <div class="card card-kegiatan ">
                        <img src="{{ asset('assets/images/quran.jpeg') }}" class="card-img-top img-kegiatan" alt="Tahfid Camp">
                        <div class="card-body space">
                            <div>
                                <h5 class="card-title fw-bold">Tahfid Camp</h5>
                                <p class="card-text mb-2">Mulai pada: 15/04/2023</p>
                                <p class="card-text">Berakhir pada: 16/04/2023</p>
                            </div> 
                            <a href="#" class="btn btn-danger">
                                <i class="bi bi-youtube btn-text"></i> Kunjungi Laman
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Kegiatan 2 -->
                <div class="col">
                    <div class="card card-kegiatan">
                        <img src="{{asset('assets/images/Frame 21.png')}}" class="card-img-top img-kegiatan" alt="Outing Class">
                        <div class="card-body space">
                            <div>
                                <h5 class="card-title fw-bold">Outing Class</h5>
                                <p class="card-text mb-2">Mulai pada: 15/04/2023</p>
                                <p class="card-text">Berakhir pada: 16/04/2023</p>
                            </div> 
                            <a href="#" class="btn btn-danger">
                                <i class="bi bi-youtube"></i> Tonton di Youtube
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Kegiatan 3 -->
                <div class="col">
                    <div class="card card-kegiatan">
                        <img src="{{ asset('assets/images/masjid.jpeg') }}" class="card-img-top img-kegiatan" alt="Pawai Obor">
                        <div class="card-body space">
                            <div>
                                <h5 class="card-title fw-bold">Pawai Obor</h5>
                                <p class="card-text mb-2">Mulai pada: 15/04/2023</p>
                                <p class="card-text">Berakhir pada: 16/04/2023</p>
                            </div>
                            <a href="#" class="btn btn-danger">
                                <i class="bi bi-youtube"></i> Tonton di Youtube
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>

</script>