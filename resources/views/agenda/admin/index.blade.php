@extends('layout.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Agenda</h6>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary float-left mb-3 btn-sm mr-3 px-3" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Tambah Data
        </button>
        <a href="/exportexcel" class="btn btn-success float-left mb-3 btn-sm mr-3 px-3">
            Export Excel
        </a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NamaGuru</th>
                        <th>MataPelajaran</th>
                        <th>Materi</th>
                        <th>JamPelajaran</th>
                        <th>Absensi</th>
                        <th>Kelas</th>
                        <th>JenisPembelajaran</th>
                        <th>LinkPembelajaran</th>
                        <th>Dokumentasi</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->mapel->nama_mapel }}</td>
                        <td>{{ $row->materi }}</td>
                        <td>{{ $row->jam_pelajaran }}</td>
                        <td>{{ $row->absen }}</td>
                        <td>{{ $row->kelas->nama_kelas }}</td>
                        <td>{{ $row->pembelajaran }}</td>
                        <td>{{ $row->link }}</td>
                        <td><img src="{{ asset('imageagenda/' . $row->image) }}" alt="" class="img-fluid"></td>
                        {{-- <td>{{ $row->image }}</td> --}}
                        <td>{{ $row->keterangan }}</td>
                        <td>
                            {{-- <button type="button" class="btn btn-warning  btn-sm px-3 mr-1" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                Edit
                            </button>    --}}
                            <a href="/editagendaadmin/{{ $row->id }}"
                                class="btn btn-warning btn-sm mb-1 d-block">Edit</a>


                            <a href="/deleteagendaadmin/{{ $row->id }}" class="btn btn-danger btn-sm">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
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
                <form action="/tambahagendaadmin" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label">Nama Guru</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" readonly
                            value="{{ auth()->user()->name  }}" aria-describedby="name">
                        @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div class="mb-4">
                        <label for="mapel" class="form-label">Mata Pelajaran</label>
                        <select class="form-select" name="mapel_id" id="mapel">
                            @foreach ($mapel as $mapels)
                            <option value="{{ $mapels->id }}">{{ $mapels->nama_mapel }}</option>
                            @endforeach
                        </select>
                        @error('mapel_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="exampleInputEmail3" class="form-label">Materi</label>
                        <input type="text" class="form-control @error('materi') is-invalid @enderror"
                            id="exampleInputEmail3" name="materi">
                        @error('materi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="exampleInputEmail4" class="form-label">Jam Pelajaran</label>
                        <input type="time" class="form-control @error('jam_pelajaran') is-invalid @enderror"
                            id="exampleInputEmail4" name="jam_pelajaran">
                        @error('jam_pelajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="absen" class="form-label">Absensi</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="absen"
                                style="height: 100px" name="absen"></textarea>
                        </div>
                        @error('absen')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select" name="kelas_id" id="kelas">
                            @foreach ($kelas as $kelass)
                            <option value="{{ $kelass->id }}">{{ $kelass->nama_kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="exampleInputEmail7" class="form-label">Pembelajaran</label>
                        <select class="form-select @error('pembelajaran') is-invalid @enderror"
                            aria-label="Default select example" id="exampleInputEmail7" name="pembelajaran">
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
                        <label for="exampleInputEmail8" class="form-label">Link Pembelajaran</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror"
                            id="exampleInputEmail8" name="link">
                        @error('link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="dokumentasi" class="form-label">Dokumentasi</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="dokumentasi"
                            name="image">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="keterangan"
                                style="height: 100px" name="keterangan"></textarea>
                        </div>
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
