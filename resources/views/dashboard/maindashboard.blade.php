@extends('layouts.admin')

@section('content')
    <main class="container py-4">
        <div class="row mb-4 align-items-center">
            <div class="col-lg-4">
                <h1 class="fw-bold">Dashboard</h1>
            </div>
            <div class="col-lg-8">
                <div class="d-flex gap-3">
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 15%;">
                        <h5>Pendaftar</h5>
                        <h3 class="fw-bold">{{$getPendaftar -> count()}}</h3>
                    </div>

                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 15%;">
                        <h5>Santri</h5>
                        <h3 class="fw-bold">{{$getPendaftarLolos -> count()}}</h3>
                    </div>
                    
                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 15%;">
                        <h5>Gagal</h5>
                        <h3 class="fw-bold">{{$getPendaftarGagal -> count()}}</h3>
                    </div>

                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 15%;">
                        <h5>Donatur</h5>
                        <h3 class="fw-bold">{{$getDonatur -> count()}}</h3>
                    </div>

                    <div class="card p-3 text-center border-0 shadow flex-fill" style="width: 15%;">
                        <h5>Feedback</h5>
                        <h3 class="fw-bold">{{$getFeedback -> count()}}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pendaftar-tab" data-bs-toggle="tab" data-bs-target="#pendaftar" type="button" role="tab">Pendaftar</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Santri-tab" data-bs-toggle="tab" data-bs-target="#Santri" type="button" role="tab">Santri</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tidak-lanjut-tab" data-bs-toggle="tab" data-bs-target="#tidak-lanjut" type="button" role="tab">Gagal</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="donatur-tab" data-bs-toggle="tab" data-bs-target="#donatur" type="button" role="tab">Donatur</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="feedback-tab" data-bs-toggle="tab" data-bs-target="#feedback" type="button" role="tab">Feedback</button>
            </li>
        </ul>

        <div class="tab-content mt-4" id="dashboardTabsContent">
            <!-- Pendaftar Tab -->
            @include('dashboard.modal_pendaftar.pendaftar')

            <!-- Santri Tab -->
            @include('dashboard.modal_santri.santri')

            <!-- Tidak Lanjut Tab -->
            @include('dashboard.modal_gagal.gagal')

            <!-- Donatur Tab -->
            @include('dashboard.modal_donatur.donatur')  

            <!-- Feedback Tab -->
            <div class="tab-pane fade" id="feedback" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-success">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getFeedback as $feedback )
                                <tr>
                                <td>{{$loop -> iteration + $getFeedback->firstItem()-1 }}</td>
                                <td>{{$feedback -> nama}}</td>
                                <td>{{$feedback -> email}}</td>
                                <td>{{$feedback -> pesan}}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    
    
    {{-- <!-- Modal Pendaftars--> --}}
    @include('dashboard.modal_pendaftar.addPendaftar')

    {{-- Modal Donatur --}}
    @include('dashboard.modal_donatur.addDonatur')
@endsection

@push('myscript')
    <script>
        
        // jquery pendaftar
        $(function(){
            // Menampilkan modal tambah pendaftar
            $("#tambahPendaftarModal").on("show.bs.modal", function(){
                console.log("Modal tambah pendaftar ditampilkan.");
            });

            // Tombol ekspor data
            // $("#exportButton").click(function() {
            //     Swal.fire({
            //         title: "Ekspor Data",
            //         text: "Apakah Anda yakin ingin mengekspor data ini?",
            //         icon: "info",
            //         showCancelButton: true,
            //         confirmButtonText: "Ekspor",
            //         cancelButtonText: "Batal"
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             // Submit form secara manual jika pengguna mengonfirmasi
            //             $("#exportForm").submit();
            //         }
            //     });
            // });


            // Tombol pratinjau data
            $(".btn-warning").click(function(){
                const nisn = $(this).closest('tr').find('td:nth-child(2)').text();
                const nama = $(this).closest('tr').find('td:nth-child(3)').text();

                // Contoh menampilkan data di modal
                $("#previewModal .modal-body").html(`
                    <p><strong>NISN:</strong> ${nisn}</p>
                    <p><strong>Nama Lengkap:</strong> ${nama}</p>
                `);
            });

            // Tombol hapus data
            $("form[action*='siswa.delete']").on("submit", function(e){
                e.preventDefault();
                const form = this;
                Swal.fire({
                    title: "Konfirmasi Hapus",
                    text: "Yakin ingin menghapus siswa ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // Dropdown aksi tambahan untuk diterima atau tidak diterima
            $(".dropdown-menu a").click(function(){
                const action = $(this).text();
                const row = $(this).closest('tr');
                const nama = row.find('td:nth-child(3)').text();
                const statusCell = row.find('td:nth-child(6)');

                Swal.fire({
                    title: `Konfirmasi Aksi: ${action}`,
                    text: `Apakah Anda ingin menandai siswa ${nama} sebagai '${action}'?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (action === 'Diterima') {
                            statusCell.html('<i class="bi bi-check-circle text-success"></i>');
                            const newRow = row.clone();
                            newRow.find("td:nth-child(7)").remove(); // Menghapus kolom aksi dari clone
                            $("#Santri tbody").append(newRow);
                        } else if (action === 'Tidak') {
                            statusCell.html('<i class="bi bi-x-circle text-danger"></i>');
                            const newRow = row.clone();
                            newRow.find("td:nth-child(7)").remove(); // Menghapus kolom aksi dari clone
                            $("#tidak-lanjut tbody").append(newRow);
                        }

                        Swal.fire(`Siswa ${nama} telah ditandai sebagai '${action}'.`, "", "success");
                    }
                });
            });
        });

        $(function(){
            /////////////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////PENDAFTAR///////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////

            //Button View Pendaftar
            $(".btn_viewPendaftar").click(function(){
                var id = $(this).attr('kode');
                // console.log(id);

                $.ajax({
                    type: 'POST',
                    url : '{{route('admin.viewPendaftar')}}',
                    cache : false,
                    data : {
                        _token : "{{ csrf_token() }}",
                        id : id
                    },
                    success: function(respond){
                        $("#loadViewPendaftar").html(respond);
                    }
                });

                $("#modal-viewPendaftar").modal("show");
            });

            // Menutup modal view pendaftar
            $("#close-viewPendaftar").click(function(){
                $("#modal-viewPendaftar").modal("hide");
            });

            //menampilkan modal edit pendaftar
            $(".btn_editPendaftar").click(function(){
                var id = $(this).attr('kode');
                // console.log(id);
                $.ajax({
                    type: 'POST',
                    url : '{{route('admin.editFormPendaftar')}}',
                    cache : false,
                    data : {
                        _token : "{{ csrf_token() }}",
                        id : id
                        },
                    success: function(respond){
                        $("#loadEditPendaftar").html(respond);
                    }
                });

                $("#modal-editPendaftar").modal("show");
            });

            // Menutup modal edit pendaftar
            $("#close-editPendaftar").click(function(){
                $("#modal-editPendaftar").modal("hide");
            });

            //Button Hapus Pendaftar
            $(".konfirmasiDeletePendaftar").click(function(e){
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

            //Button Terima Pendaftar Lolos
            $(".btn_lolos").click(function(e){
                 //memilih form dari si button
                 form = $(this).closest('form');

                e.preventDefault();
                Swal.fire({
                    title: "Konfirmasi Siswa Lolos ?",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Lanjutkan",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire("Diterima!", "", "success");
                    }
                });
            });

            //Button Tolak Pendaftar (Gagal Lolos)
            $(".btn_gagal").click(function(e){
                 //memilih form dari si button
                 form = $(this).closest('form');

                e.preventDefault();
                Swal.fire({
                    title: "Konfirmasi Siswa Gagal ?",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Lanjutkan",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire("Sukses!", "", "success");
                    }
                });
            });
            //////////////////////////////////////////// TUTUP PENDAFTAR ////////////////////////////////////////////



            /////////////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////DONATUR/////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////

            //Button Tambahkan Data Donatur
            $("#add_donatur").click(function(){
                $("#modal-addDonatur").modal("show");
            });

            //Button Delete Data Donatur
            $(".konfirmasiDeleteDonatur").click(function(e){
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

            //Button Edit Data Donatur
            $('.edit_donatur').click(function(){
                var id = $(this).attr('kode');

                $.ajax({
                    type: 'POST',
                    url : '{{route('admin.editFormDonatur')}}',
                    cache : false,
                    data : {
                        _token : "{{ csrf_token() }}",
                        id : id
                    },
                    success: function(respond){
                        $("#loadEditDonatur").html(respond);
                    }
                });

                $("#modal-editDonatur").modal("show");
            });

            //Button Preview Data Donatur
            $(".view_donatur").click(function(){
                var id = $(this).attr('kode');
                // console.log(id);

                $.ajax({
                    type: 'POST',
                    url : '{{route('admin.viewDonatur')}}',
                    cache : false,
                    data : {
                        _token : "{{ csrf_token() }}",
                        id : id
                    },
                    success: function(respond){
                        $("#loadViewDonatur").html(respond);
                    }
                });

                $("#modal-viewDonatur").modal("show");
            });

            //button close modal Preview Donatur
            $("#close-viewDonatur").click(function(){
                $("#modal-viewDonatur").modal("hide");
            });

            //Button Close Modal Edit Donatur
            $("#close-editDonatur").click(function(){
                $("#modal-editDonatur").modal("hide");
            });

            //pesan sukses Add Data Donatur
            $("#formAddDonatur").submit(function(e){  
                e.preventDefault();
                Swal.fire({
                    title: "Data Donatur Ditambahkan!",
                    text: "Data Donatur baru telah berhasil ditambahkan.",
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

            //pesan sukses Edit Data Donatur
            $("#formEditDonatur").submit(function(e){  
                e.preventDefault();
                Swal.fire({
                    title: "Data Donatur Diperbarui!",
                    text: "Data Donatur baru telah berhasil diperbarui.",
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
        ///////////////////////////////////////////// TUTUP DONATUR /////////////////////////////////////////////


        /////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////// SANTRI / SISWA LOLOS //////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////////////////

        //Button Preview Data Santri
        $(".btn_viewSantri").click(function(){
            var id = $(this).attr('kode');
            // console.log(id);

            $.ajax({
                type: 'POST',
                url : '{{route('admin.viewLolos')}}',
                cache : false,
                data : {
                    _token : "{{ csrf_token() }}",
                    id : id
                },
                success: function(respond){
                    $("#loadViewSantri").html(respond);
                }
            });

            $("#modal-viewSantri").modal("show");
        });

        // Menutup modal view pendaftar
        $("#close-viewSantri").click(function(){
            $("#modal-viewSantri").modal("hide");
        });

        //Ini Untuk Edit Santri
        $(".btn_editSantri").click(function(){
                var id = $(this).attr('kode');
                // console.log(id);
                $.ajax({
                    type: 'POST',
                    url : '{{route('admin.editFormLolos')}}',
                    cache : false,
                    data : {
                        _token : "{{ csrf_token() }}",
                        id : id
                        },
                    success: function(respond){
                        $("#loadEditSantri").html(respond);
                    }
                });

                $("#modal-editSantri").modal("show");
            });

            // Menutup modal edit Santri
            $("#close-editSantri").click(function(){
                $("#modal-editSantri").modal("hide");
            });

        //Ini untuk hapus santri
        $(".konfirmasiDeleteLolos").click(function(e){
            //memilih form dari si button
            form = $(this).closest('form');

            e.preventDefault();
            Swal.fire({
                title: "Konfirmasi Hapus Data Santri",
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

        //Batalkan Kelulusan Santri
        $(".btn_batalLolos").click(function(e){
                //memilih form dari si button
                form = $(this).closest('form');

            e.preventDefault();
            Swal.fire({
                title: "Batalkan Kelulusan Santri ?",
                showCancelButton: true,
                confirmButtonText: "Ya, Lanjutkan",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire("Sukses!", "", "success");
                }
            });
        });

        ///////////////////////////////////////////// TUTUP SANTRI /////////////////////////////////////////////
        
        /////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////// SANTRI / SISWA Gagal //////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////////////////

        //Button Preview Data Santri Gagal
        $(".btn_viewGagal").click(function(){
            var id = $(this).attr('kode');
            // console.log(id);

            $.ajax({
                type: 'POST',
                url : '{{route('admin.viewGagal')}}',
                cache : false,
                data : {
                    _token : "{{ csrf_token() }}",
                    id : id
                },
                success: function(respond){
                    $("#loadViewGagal").html(respond);
                }
            });

            $("#modal-viewGagal").modal("show");
        });

        // Menutup modal view Santri Gagal
        $("#close-viewGagal").click(function(){
            $("#modal-viewGagal").modal("hide");
        });

        //Ini Untuk Edit Santri Gagal
        $(".btn_editGagal").click(function(){
            var id = $(this).attr('kode');
            // console.log(id);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.editFormGagal')}}',
                cache: false,
                data : {
                    _token : "{{ csrf_token() }}",
                    id : id
                },
                success: function(respond){
                    $("#loadEditGagal").html(respond);
                }
            });

            $("#modal-editGagal").modal("show");
        });

        // Menutup modal edit Santri Gagal
        $("#close-editGagal").click(function(){
            $("#modal-editGagal").modal("hide");
        });

        //Ini untuk hapus santriGagal
        $(".konfirmasiDeleteGagal").click(function(e){
            //memilih form dari si button
            form = $(this).closest('form');

            e.preventDefault();
            Swal.fire({
                title: "Konfirmasi Hapus Data Santri",
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

        //Batalkan Kelulusan Santri
        $(".btn_batalGagal").click(function(e){
                //memilih form dari si button
                form = $(this).closest('form');

            e.preventDefault();
            Swal.fire({
                title: "Batalkan Kelulusan Santri ?",
                showCancelButton: true,
                confirmButtonText: "Ya, Lanjutkan",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire("Sukses!", "", "success");
                }
            });
        });

        ///////////////////////////////////////////// TUTUP Gagal ///////////////////////////////////////////////

        // Script to toggle sekolah form visibility based on status selection
        document.getElementById('status').addEventListener('change', function () {
            const formSekolah = document.getElementById('form-sekolah');
            if (this.value === 'Ya') {
                formSekolah.style.display = 'block';
            } else {
                formSekolah.style.display = 'none';
            }
        });
    </script>
@endpush