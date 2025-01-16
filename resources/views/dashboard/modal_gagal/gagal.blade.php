<div class="tab-pane fade" id="tidak-lanjut" role="tabpanel">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-danger">
                <tr>
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Panggilan</th>
                    <th>Jenis Kelamin</th>
                    <th>NISN</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getPendaftarGagal as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->nama_panggilan }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->sekolah?->nisn ?? '-' }}</td>
                        <td><i class="bi bi-x-circle text-danger"></i></td>
                        <td class="d-flex align-items-center gap-1 justify-content-center">
                            <button class="btn btn-primary btn-sm btn_viewGagal" kode="{{$item -> id}}" data-bs-toggle="modal"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-secondary btn-sm btn-preview btn_editGagal" kode="{{$item -> id}}"><i class="bi bi-pencil-square"></i></button>
                            <form action="{{ route('admin.deleteGagal', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm konfirmasiDeleteGagal"><i class="bi bi-trash"></i></button>
                            </form>
                            <form action="{{ route('admin.batalGagal', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-warning btn-sm btn_batalGagal"><i class="bi bi-x-square"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Preview Santri Gagal-->
<div class="modal fade" id="modal-viewGagal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="loadViewGagal">
                
            </div>
            
            <div class="modal-footer">
                <button type="button" id="close-viewGagal" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
            </div>
        </div>
    </div>
</div>