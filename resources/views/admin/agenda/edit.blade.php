@extends('layout.main')

@section('content')

<div class="container">
    <div class="row">
        <h2 class="mb-4 mt-2">Mengedit Data</h2>

    </div>
    <div class="row">
        <form action="/updateagenda/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Nama Guru</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_guru"
                    value="{{ $data->nama_guru }}">
            </div>

            <div class="mb-4">
                <label for="exampleInputEmail3" class="form-label">Mata Pelajaran</label>
                <input type="text" class="form-control" id="exampleInputEmail3" name="mata_pelajaran"
                    value="{{ $data->mata_pelajaran }}">
            </div>

            <div class="mb-4">
                <label for="exampleInputEmail2" class="form-label">Materi</label>
                <input type="text" class="form-control" id="exampleInputEmail2" name="materi"
                    value="{{ $data->materi }}">
            </div>

            <div class="mb-4">
                <label for="exampleInputEmail4" class="form-label">Jam Pelajaran</label>
                <input type="time" class="form-control" id="exampleInputEmail4" name="jam_pelajaran"
                    value="{{ $data->jam_pelajaran }}">
            </div>

            <div class="mb-4">
                <label for="exampleInputEmail5" class="form-label">Absensi</label>
                <input type="text" class="form-control" id="exampleInputEmail5" name="absen" value="{{ $data->absen }}">
            </div>
            <div class="mb-4">
                <label for="exampleInputEmail5" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="exampleInputEmail5" name="kelas" value="{{ $data->kelas }}">
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
                <label for="exampleInputEmail5" class="form-label">Link Pembelajaran</label>
                <input type="text" class="form-control" id="exampleInputEmail5" name="link" value="{{ $data->link }}">
            </div>
            <div class="mb-4">
                <label for="exampleInputEmail5" class="form-label">Dokumentasi</label>
                <input type="file" class="form-control" id="exampleInputEmail5" name="image" value="{{ $data->image }}">
            </div>
            <div class="mb-4">
                <label for="exampleInputEmail5" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="exampleInputEmail5" name="keterangan"
                    value="{{ $data->keterangan }}">
            </div>



            <button type="submit" class="btn btn-primary px-5 float-right ">Update</button>
            <a href="/guru"><button class="btn btn-danger px-5 float-right mr-3">Kembali</button></a>

        </form>
    </div>
</div>


@endsection
