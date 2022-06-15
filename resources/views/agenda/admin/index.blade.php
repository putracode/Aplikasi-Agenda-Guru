@extends('layout.master')

@section('content')
<div class="card shadow mb-4">
    @if (session()->has('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('Success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('Edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('Edit') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Agenda</h6>
    </div>
    <div class="card-body">
        {{-- <button type="button" class="btn btn-primary float-left mb-3 btn-sm mr-3 px-3" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Tambah Data
        </button> --}}
        <a href="/formagendaguru" class="btn btn-primary float-right mb-3 btn-sm mr-3 px-3">Tambah Data</a>
        <a href="/exportexcel" class="btn btn-success float-right mb-3 btn-sm mr-3 px-3">
            Export Excel
        </a>
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Action</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Materi</th>
                        <th>Jam Pelajaran</th>
                        <th>Absensi</th>
                        <th>Kelas</th>
                        <th>Jenis Pembelajaran</th>
                        <th>Link Pem
                            elajaran</th>
                        <th>Dokumentasi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{-- <button type="button" class="btn btn-warning  btn-sm px-3 mr-1" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                Edit
                            </button>    --}}
                            <a href="/editagendaguru/{{ $row->id }}"
                                class="btn btn-warning btn-sm mb-1 d-block">Edit</a>


                            <a href="/deleteagendaguru/{{ $row->id }}" class="btn btn-danger btn-sm">Delete</a>

                        </td>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/tambahagendaguru" method="POST" enctype="multipart/form-data">

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
</div> --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>