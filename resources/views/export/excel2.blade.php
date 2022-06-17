<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Mata Pelajaran</th>
        <th>Materi</th>
        <th>Jam Pelajaran</th>
        <th>Absensi</th>
        <th>Pembelajaran</th>
        <th>Link</th>
        <th>Dokumentasi</th>
        <th>Keterangan</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $datas)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $datas->name }}</td>
            <td>{{ $datas->kelas->nama_kelas }}</td>
            <td>{{ $datas->mapel->nama_mapel }}</td>
            <td>{{ $datas->materi }}</td>
            <td>{{ $datas->jam_pelajaran }}</td>
            <td>Hadir = {{ $datas->jumlah_hadir }}  Tidak Hadir = {{ $datas->jumlah_tidak_hadir }} Keterangan = {{ $datas->absen }}</td>
            <td>{{ $datas->pembelajaran }}</td>
            <td>{{ $datas->link }}</td>
            <td>{{ $datas->image }}</td>
            <td>{{ $datas->keterangan }}</td>
            <td>{{ $datas->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
