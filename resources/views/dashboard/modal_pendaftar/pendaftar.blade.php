<div class="tab-pane fade show active" id="pendaftar" role="tabpanel">
    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-success"><i class="bi bi-cloud-arrow-down"></i> Ekspor</button>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahPendaftarModal">
            Tambah Pendaftar
        </button>                                    
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No.</th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Panggilan</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getPendaftar as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->sekolah?->nisn ?? '-' }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->nama_panggilan }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td><i class="bi bi-check-circle text-success"></i></td>
                    <td class="d-flex align-items-center gap-3 justify-content-center">
                        <!-- Button to trigger modal -->
                        <!-- Button to trigger modal -->
                        <button class="btn btn-primary btn-sm btn-preview"
                            data-bs-toggle="modal" 
                            data-bs-target="#previewModal">
                            <i class="bi bi-eye"></i>
                        </button>
                        <form action="{{ route('siswa.delete', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus siswa ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                        <a href="" class="btn btn-success btn-sm"><i class="bi bi-check2-square"></i></a>
                        <a href="" class="btn btn-warning btn-sm"><i class="bi bi-x-square"></i></a>                                 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>