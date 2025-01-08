
<table class="table table-borderless">
    <tr>
        <th>Nama Lengkap</th>
        <td>: {{$getDonatur -> nama_donatur}}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>: {{$getDonatur -> jenis_kelamin_donatur}}</td>
    </tr>
    <tr>
        <th>Alamat Lengkap</th>
        <td>: {{$getDonatur -> alamat_donatur}}</td>
    </tr>
    <tr>
        <th>Tanggal Masuk Donasi</th>
        <td>: {{date('d/m/Y', strtotime($getDonatur -> tanggal_donasi))}}</td>
    </tr>
    <tr>
        <th>Nominal Donasi</th>
        <td>: Rp. {{$getDonatur -> nominal_donasi}}</td>
    </tr>
    <tr>
        <th>Jenis Donasi</th>
        <td>: {{$getDonatur -> jenis_donasi}}</td>
    </tr>
    <tr>
        <th>Bukti/Foto Kwitansi</th>
        <td>: {{$getDonatur -> foto_donasi}}</td>
    </tr>
    <tr>
        <th></th>
        <td>ini gambar nantinya</td>
    </tr>
</table>