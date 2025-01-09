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
                        <button class="btn btn-warning btn-sm btn-preview"
                            data-bs-toggle="modal" 
                            data-bs-target="#previewModal" 
                            data-id="{{ $item->id }}" 
                            data-nama-lengkap="{{ $item->nama_lengkap }}"
                            data-nama-panggilan="{{ $item->nama_panggilan }}"
                            data-jenis-kelamin="{{ $item->jenis_kelamin }}"
                            data-tempat-lahir="{{ $item->tempat_lahir }}"
                            data-tanggal-lahir="{{ $item->tanggal_lahir }}"
                            data-alamat-lengkap="{{ $item->alamat_lengkap }}"
                            data-status="{{ $item->status }}"
                            data-asal-sekolah="{{ $item->sekolah?->asal_sekolah ?? '-' }}"
                            data-nisn="{{ $item->sekolah?->nisn ?? '-' }}"
                            data-npsn="{{ $item->sekolah?->npsn ?? '-' }}"
                            data-nik="{{ $item->nik }}"
                            data-anak-ke="{{ $item->anak_ke }}"
                            data-jumlah-saudara="{{ $item->jumlah_saudara }}"
                            data-nama-ayah="{{ $item->nama_ayah }}"
                            data-pekerjaan-ayah="{{ $item->pekerjaan_ayah }}"
                            data-pendidikan-ayah="{{ $item->pendidikan_ayah }}"
                            data-alamat-ayah="{{ $item->alamat_ayah }}"
                            data-nama-ibu="{{ $item->nama_ibu }}"
                            data-pekerjaan-ibu="{{ $item->pekerjaan_ibu }}"
                            data-pendidikan-ibu="{{ $item->pendidikan_ibu }}"
                            data-alamat-ibu="{{ $item->alamat_ibu }}">
                            <i class="bi bi-eye"></i>
                        </button>
                        <form action="{{ route('siswa.delete', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus siswa ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <li><a class="dropdown-item" href="#">Diterima</a></li>
                              <li><a class="dropdown-item" href="#">Tidak</a></li>
                            </ul>
                        </div>                                      
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>