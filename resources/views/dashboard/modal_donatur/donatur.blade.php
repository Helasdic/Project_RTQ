<div class="tab-pane fade" id="donatur" role="tabpanel">
    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-success"><i class="bi bi-cloud-arrow-down"></i> Ekspor</button>
        <button id="add_donatur" class="btn btn-success ms-2"><i class="bi bi-plus-circle"></i> Tambah Donatur</button>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>Jumlah Donasi</th>
                    <th>Tanggal Donasi</th>
                    <th>Jenis Donasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getDonatur as $donatur )
                    <tr>
                        <td>{{$loop -> iteration + $getDonatur->firstItem()-1 }}</td>
                        <td>{{$donatur -> nama_donatur}}</td>
                        <td>Rp. {{$donatur -> nominal_donasi}}</td> 
                        <td>{{date('d/m/Y', strtotime($donatur -> tanggal_donasi))}}</td>
                        <td>{{$donatur -> jenis_donasi}}</td>
                        <td>
                            <a class="btn btn-warning btn-sm view_donatur" kode="{{$donatur -> id}}" data-bs-toggle="modal" data-bs-target="#modal-viewDonatur" style="margin: 1px;"><i class="bi bi-eye"></i></a>
                            <button class="btn btn-secondary btn-sm" style="margin: 1px;"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-secondary btn-sm" style="margin: 1px;"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>