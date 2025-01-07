@extends('layouts.app')

@section('content')

<!-- Section Semua Kegiatan -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center mb-4">Semua Kegiatan</h2>
            <div class="row row-cols-1 row-cols-md-2 mt-2 g-4">

                @foreach($getKegiatan as $kegiatan)
                    <div class="col">
                        <div class="card card-kegiatan ">
                            @php
                                $cek = $kegiatan -> foto_kegiatan;
                                if($cek == '-'){
                                    $icon = asset('assets/images/quran.jpeg');
                                } else {
                                    $icon = Storage::url('kegiatan/'.$kegiatan -> foto_kegiatan);
                                }
                            @endphp
                            <img src="{{ $icon }}" class="card-img-top img-kegiatan" alt="Tahfid Camp">
                            <div class="card-body space">
                                <div>
                                    <h5 class="card-title fw-bold">{{$kegiatan -> nama_kegiatan}}</h5>
                                    <p class="card-text mb-2">Mulai pada: {{ date('d/m/Y', strtotime($kegiatan-> tanggal_mulai)) }}</p>
                                    <p class="card-text">Berakhir pada: 
                                        @if($kegiatan-> tanggal_selesai)
                                            {{ date('d/m/Y', strtotime($kegiatan-> tanggal_selesai)) }}
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div> 
                                <a href="{{$kegiatan -> link}}" target="_blank" class="btn btn-danger space-btn">
                                    <i class="bi bi-youtube"></i> Kunjungi Laman
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

<script>

</script>