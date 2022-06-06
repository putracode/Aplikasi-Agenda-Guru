@extends('layout.main')

@section('content')

<div class="container">
    <div class="row">
        <h2 class="mb-4 mt-2">Mengedit Data</h2>

    </div>
    <div class="row">
        <form action="/updatekelas/{{ $data->id }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Nama Guru</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="nama_kelas" value="{{ $data->nama_kelas }}">
            </div>

            <div class="mb-4">
                <label for="exampleInputEmail2" class="form-label">NIK Guru</label>
                <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp"
                    name="wali_kelas" value="{{ $data->wali_kelas }}">
            </div>

            <button type="submit" class="btn btn-primary px-5 float-right ">Update</button>
            <a href="/kelas"><button class="btn btn-danger px-5 float-right mr-3">Kembali</button></a>

        </form>
    </div>
</div>


@endsection
