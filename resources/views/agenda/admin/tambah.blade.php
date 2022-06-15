@extends('layout.master')

@section('content')
    

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Guru</h4>

            <form class="forms-sample"action="/tambahagendaguru" method="POST" enctype="multipart/form-data"">
                @csrf
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
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>