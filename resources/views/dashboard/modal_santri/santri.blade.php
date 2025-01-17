<div class="tab-pane fade" id="Santri" role="tabpanel">
    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-success"><i class="bi bi-cloud-arrow-down"></i> Ekspor</button>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-info">
                <tr>
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Panggilan</th>
                    <th>Jenis Kelamin</th>
                    <th>NISN</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getPendaftarLolos as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->nama_panggilan }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->sekolah?->nisn ?? '-' }}</td>
                    <td><i class="bi bi-check-circle text-success"></i></td>
                    <td class="d-flex align-items-center gap-1 justify-content-center">
                        <!-- Button to trigger modal -->
                        <button class="btn btn-primary btn-sm btn_viewSantri" kode="{{$item -> id}}" data-bs-toggle="modal" data-bs-target="#previewModal"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-secondary btn-sm btn-preview btn_editSantri" kode="{{$item -> id}}"><i class="bi bi-pencil-square"></i></button>
                        <form action="{{ route('admin.deleteLolos', $item->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm konfirmasiDeleteLolos"><i class="bi bi-trash"></i></button>
                        </form>
                        <form action="{{ route('admin.batalLolos', $item->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-warning btn-sm btn_batalLolos"><i class="bi bi-x-square"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Preview Santri-->
<div class="modal fade" id="modal-viewSantri" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="loadViewSantri">
                
            </div>
            
            <div class="modal-footer">
                <button type="button" id="close-viewSantri" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Santri-->
<div class="modal fade" id="modal-editSantri" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="loadEditSantri">
                
            </div>
            
            <div class="modal-footer">
                <button type="button" id="close-editSantri" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
            </div>
        </div>
    </div>
</div>