@extends('layout.master')

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
                <label for="mapel_id" class="form-label">Mata Pelajaran</label>
                <select class="form-select" name="mapel_id" id="mapel_id">
                    @foreach ($mapel as $mapels)
                    @if (old('mapel_id', $data->mapel_id ) == $mapels->id)
                    <option value="{{ $mapels->id }}" selected>{{ $mapels->nama_mapel }}</option>
                    @else
                    <option value="{{ $mapels->id }}">{{ $mapels->nama_mapel }}</option>
                    @endif
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
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="number" class="form-control @error('jumlah_hadir') is-invalid @enderror"
                            id="exampleInputEmail3" name="jumlah_hadir" placeholder="Hadir" value="{{ $data->jumlah_hadir }}">
                        @error('jumlah_hadir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="number" class="form-control @error('jumlah_tidak_hadir') is-invalid @enderror"
                            id="exampleInputEmail3" name="jumlah_tidak_hadir" placeholder="Tidak Hadir" value="{{ $data->jumlah_tidak_hadir }}">
                        @error('jumlah_tidak_hadir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="absen" style="height: 100px"
                        name="absen">{{ $data->absen }}</textarea>
                    <label for="absen">Keterangan</label>
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
                    aria-label="Default select example" id="exampleInputEmail7" name="pembelajaran" value="{{ $data->pembelajaran }}">
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
                <input type="hidden" name="poto" value="{{ $data->image }}">
                @if ($data->image)
                    <img src="{{ asset('storage/' . $data->image ) }}" alt="" class="img-preview img-fluid mb-3  rounded-2 d-block " style="width: 300px; height: 150px;">
                @else
                <img class="img-preview mb-3 img-fluid rounded-2" style="width: 300px; height: 150px;">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="dokumentasi"
                    name="image" onchange="previewImage()">
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
            <a href="/agendaguru" class="btn btn-danger px-5 mr-2 float-right">Cancel</a>

        </form>
    </div>
</div>


@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    function previewImage(){
        const image = document.querySelector("#dokumentasi");
        const imgPreview = document.querySelector(".img-preview");
    
        imgPreview.style.display = "block";
    
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
</script>