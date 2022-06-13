@extends('layout.main')

@section('content')

<div class="container">
    <div class="row">
        <h2 class="mb-4 mt-2">Mengedit Data</h2>

    </div>
    <div class="row">
        <form action="/updateagendaguru/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Nama Guru</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" readonly
                    value="{{ auth()->user()->name }}" aria-describedby="name">
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
                    id="exampleInputEmail3" name="materi" value="{{ $data->materi }}">
                @error('materi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="exampleInputEmail4" class="form-label">Jam Pelajaran</label>
                <input type="time" class="form-control @error('jam_pelajaran') is-invalid @enderror"
                    id="exampleInputEmail4" name="jam_pelajaran" value="{{ $data->jam_pelajaran }}">
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
                        style="height: 100px" name="absen">{{ $data->absen }}</textarea>
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
                    aria-label="Default select example" id="exampleInputEmail7" name="pembelajaran value="{{ $data->pembelajaran }}"">
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
                    id="exampleInputEmail8" name="link" value="{{ $data->link }}">
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
                        style="height: 100px" name="keterangan">{{ $data->keterangan }}</textarea>
                </div>
                @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary px-5 float-right ">Update</button>


        </form>
    </div>
</div>


@endsection
