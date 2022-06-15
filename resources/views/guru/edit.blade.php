@extends('layout.master')

@section('content')

<div class="container">
    <div class="row">
        <h2 class="mb-4 mt-2">Mengedit Data</h2>

    </div>
    <div class="row">
        <form action="/updateguru/{{ $data->id }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_guru" class="form-label">Nama Guru</label>
                <input type="text" class="form-control @error('nama_guru') @enderror" id="nama_guru" 
                name="nama_guru" value="{{ $data->nama_guru }}">
                @error('nama_guru')
                    <div class="invalid-feedback">
                        {{ $messege }}
                    </div>
                @enderror
            </div>

            
            <div class="mb-3">
                <label for="nik_guru" class="form-label">NIK Guru</label>
                <input type="text" class="form-control @error('nik_guru') @enderror" id="nik_guru" name="nik_guru" value="{{ $data->nik_guru }}">
                @error('mapel_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mapel_id" class="form-label">Nama Pelajaran</label>
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
            <div class="mb-3">
                <label for="user_id" class="form-label">Username</label>
                <select class="form-select" name="user_id" id="user_id">
                    @foreach ($user as $users)
                    @if (old('user_id', $data->user_id ) == $users->id)
                        <option value="{{ $users->id }}" selected>{{ $users->username }}</option>
                    @else
                        <option value="{{ $users->id }}">{{ $users->username }}</option>
                    @endif
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary px-5 float-right ">Update</button>
            <a href="/guru"><button class="btn btn-danger px-5 float-right mr-3">Kembali</button></a>

        </form>
    </div>
</div>


@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>