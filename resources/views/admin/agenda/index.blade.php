@extends('layout.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Agenda</h6>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary float-right mb-3 btn-sm mr-3 px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
        </button>   
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable"  cellspacing="0" > 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Materi</th>
                        <th>Jam Pelajaran</th>
                        <th>Absensi</th>
                        <th>Kelas</th>
                        <th>Jenis Pembelajaran</th>
                        <th>Link Pembelajaran</th>
                        <th>Dokumentasi</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($data as $row)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama_guru }}</td>
                        <td>{{ $row->mata_pelajaran }}</td>
                        <td>{{ $row->materi }}</td>
                        <td>{{ $row->jam_pelajaran }}</td>
                        <td>{{ $row->absen }}</td>
                        <td>{{ $row->kelas }}</td>
                        <td>{{ $row->pembelajaran }}</td>
                        <td>{{ $row->link }}</td>
                        <td><img src="{{ asset('imageagenda/' . $row->image) }}"  alt="" class="img-fluid"></td>
                        {{-- <td>{{ $row->image }}</td> --}}
                        <td>{{ $row->keterangan }}</td>
                        <td class="d-flex align-items-center">
                            {{-- <button type="button" class="btn btn-warning  btn-sm px-3 mr-1" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                Edit
                            </button>    --}}
                            <a href="/editagenda/{{ $row->id }}" class="btn btn-warning btn-sm mr-1">Edit</a>
                            <a href="/deleteagenda/{{ $row->id }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/tambahagenda" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="exampleInputEmail1" name="nama_guru">
                        @error('nama_guru')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="exampleInputEmail2" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control @error('mata_pelajaran') is-invalid @enderror" id="exampleInputEmail2" 
                        name="mata_pelajaran">
                        @error('mata_pelajaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="exampleInputEmail3" class="form-label">Materi</label>
                        <input type="text" class="form-control @error('materi') is-invalid @enderror" id="exampleInputEmail3" 
                        name="materi">
                        @error('materi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="exampleInputEmail4" class="form-label">Jam Pelajaran</label>
                        <input type="time" class="form-control @error('jam_pelajaran') is-invalid @enderror" id="exampleInputEmail4" 
                        name="jam_pelajaran">
                        @error('jam_pelajaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="exampleInputEmail5" class="form-label">Absensi</label>
                        <input type="text" class="form-control @error('absen') is-invalid @enderror" id="exampleInputEmail5" 
                        name="absen">
                        @error('absen')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="exampleInputEmail6" class="form-label">Kelas</label>
                        <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="exampleInputEmail6" name="kelas">
                        @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputEmail7" class="form-label">Pembelajaran</label>
                        <select class="form-select @error('pembelajaran') is-invalid @enderror" aria-label="Default select example" id="exampleInputEmail7" name="pembelajaran"> 
                            <option value="1">Online</option>
                            <option value="2">Offline</option>
                        </select>
                        @error('pembelajaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputEmail8" class="form-label">Link</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" id="exampleInputEmail8" name="link">
                        @error('link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="dokumentasi" class="form-label">Dokumentasi</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="dokumentasi" name="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputEmail10" class="form-label">Keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="exampleInputEmail10" name="keterangan">
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mengedit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/updateguru/{{ $data->id }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Guku</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="nama_guru">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail2" class="form-label">NIK Guru</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp"
                            name="nik_guru">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail3" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp"
                            name="mata_pelajaran">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail4" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp"
                            name="username">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail5" class="form-label">Password</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp"
                            name="password">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div> --}}