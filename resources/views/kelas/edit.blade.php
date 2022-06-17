@extends('layout.master')

@section('content')

<div class="container">
    <div class="row">
        <h2 class="mb-4 mt-2">Mengedit Data</h2>

    </div>
    <div class="row">
        <form action="/updatekelas/{{ $data->id }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" 
                name="nama_kelas" value="{{ $data->nama_kelas }}">
                @error('nama_kelas')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="guru_id" class="form-label">Wali Kelas</label>
                <select class="form-select" name="guru_id" id="guru_id">
                    @foreach ($guru as $gurus)
                    @if (old('guru_id', $data->guru_id ) == $gurus->id)
                        <option value="{{ $gurus->id }}" selected>{{ $gurus->nama_guru }}</option>
                    @else
                        <option value="{{ $gurus->id }}">{{ $gurus->nama_guru }}</option>
                    @endif
                    @endforeach
                </select>
                @error('guru_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary px-5 float-right ">Update</button>
            <a href="/kelas" class="btn btn-danger px-5 mr-2 float-right">Cancel</a>

        </form>
    </div>
</div>


@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
