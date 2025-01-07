@extends('layouts.admin')

@section('content')

<!-- Section Semua Kegiatan -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex mb-3" style="gap: 24px;">
                <h2 class="fw-bold text-start">Semua Kegiatan</h2>
                <a href="#" id="addKegiatan" class="btn space-btn" style="height: max-content; background-color: var(--primay-2); color: var(--white-1);">
                    <i class="fas fa-plus-circle"></i> Tambah Kegiatan
                </a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if(Session::get('success'))
                        <div class="alert alert-success fade-out">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if(Session::get('warning'))
                        <div class="alert alert-danger fade-out">
                            {{Session::get('warning')}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-4 mt-3">
                @foreach($getKegiatan as $kegiatan)
                    <!-- Kegiatan 1 -->
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
                                <div class="d-flex align-items-center" style="gap: 10px;">
                                    {{-- <a href="#" class="" style="background-image: url('{{ asset('assets/images/btn_edit.png')}}')"></a> --}}
                                    <a href="#" class="editKegiatan" kode="{{$kegiatan -> id}}">
                                        <img class="icon-btn" src="{{ asset('assets/images/btn_edit.png')}}" />
                                    </a>
                                    <form action="/admin/kegiatan/{{$kegiatan -> id}}/delete" method="POST">
                                        @csrf
                                        <a href="#" class="konfirmasiDeleteApps">
                                            <img class="icon-btn" src="{{asset('assets/images/btn_hapus.png')}}" />
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modal-addKegiatan" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: var(--shape-corner-large);">
                <div class="modal-body">
                    <div class="container" style="padding: 40px;">
                        <form id="formKegiatan" method="POST" action="{{ route('admin.storeKegiatan') }}" enctype="multipart/form-data">
                            @csrf
                            <h3 class="primay">Tambahkan Kegiatan</h3>
                            <div class="mb-3 mt-4">
                                <h5>Form Kegiatan</h5>
                            </div>
                            <div class="mb-3">
                                <label for="namaKegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="frame-input" id="namaKegiatan" aria-describedby="namaKegiatan" name="namaKegiatan" required>
                            </div>
                            <div class="mb-3">
                                <label for="linkKegiatan" class="form-label">Link Kegiatan</label>
                                <input type="text" class="frame-input" id="linkKegiatan" aria-describedby="linkKegiatan" name="linkKegiatan" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggalMulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="frame-input" id="tanggalMulai" aria-describedby="tanggalMulai" name="tanggalMulai" required>                                       
                            </div>
                            <div class="mb-3">
                                <label for="tanggalSelesai" class="form-label">Tanggal Berakhir</label>
                                <input type="date" class="frame-input" id="tanggalSelesai" aria-describedby="tanggalSelesai" name="tanggalSelesai" required>                                       
                            </div>

                            <div class="mb-3">
                                <label for="fotoKegiatan" class="form-label">Thumbnail/Foto Kegiatan</label> 
                                <input type="file" class="frame-input" id="fotoKegiatan" name="fotoKegiatan" accept=".jpg, .jpeg, .png, .svg" max-size="2097152">
                            </div>

                            <button type="submit" id="kirim" name="kirim" class="btn w-100 mt-3 kirim" style="background-color: var(--primay-2); color: var(--white-1);">
                                <i class="fa fa-send-o"></i> Kirim
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-editKegiatan" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: var(--shape-corner-large);">
                <div class="modal-body" id="loadEditKegiatan">
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@push('myscript')
    <script>
        $(function(){
            $(".editKegiatan").click(function(){
                var id = $(this).attr('kode');
                // console.log(id);

                $.ajax({
                    type: 'POST',
                    url : '{{route('admin.editFormKegiatan')}}',
                    cache : false,
                    data : {
                        _token : "{{ csrf_token() }}",
                        id : id
                    },
                    success: function(respond){
                        $("#loadEditKegiatan").html(respond);
                    }
                });

                $("#modal-editKegiatan").modal("show");
            });

            $(".konfirmasiDeleteApps").click(function(e){
                //memilih form dari si button
                form = $(this).closest('form');

                e.preventDefault();
                Swal.fire({
                    title: "Konfirmasi Hapus Data",
                    showCancelButton: true,
                    confirmButtonText: "Delete"
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire("Deleted!", "", "success");
                    }
                });
            });

            $("#addKegiatan").click(function(){
                $("#modal-addKegiatan").modal("show");
            });

            $("#formKegiatan").submit(function(e){  
                e.preventDefault();
                Swal.fire({
                    title: "Kegiatan Ditambahkan!",
                    text: "Kegiatan baru telah berhasil ditambahkan.",
                    icon: "success",
                    confirmButtonText: "Terima Kasih",
                    allowOutsideClick: false,
                    customClass: {
                        title: 'my-title-class', // Class untuk judul
                        content: 'my-content-class', // Class untuk teks konten
                        confirmButton: 'my-confirm-button-class' // Class untuk tombol konfirmasi
                        // Anda juga bisa menambahkan class untuk tombol cancel, popup, icon, dll.
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@endpush