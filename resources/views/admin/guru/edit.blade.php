@extends('layout.main')

@section('content')

<div class="container">
    <div class="row">
        <h2 class="mb-4 mt-2">Mengedit Data</h2>

    </div>
    <div class="row">
        <form action="/updateguru/{{ $data->id }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">Nama Guru</label>
                <input list="browsers" name="user_id" class="form-control @error('user_id') @enderror" id="user_id" value="{{ $data->user_id }}">
                @foreach($isiuser as $data1)
                <datalist id="browsers">
                      <option value="{{$data1->id}}">{{$data1->name}}</option>
                @endforeach
                @error('user_id')
                    <div class="invalid-feedback">
                        {{$message}}
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
                <input list="browsers2" name="mapel_id"  class="form-control @error('mapel_id') @enderror" id="mapel_id" value="{{ $data->mapel_id }}">
                @foreach($isimapel as $datamapel)
                <datalist id="browsers2">
                      <option value="{{$datamapel->id}}">{{$datamapel->nama_mapel}}</option>
                @endforeach
                @error('mapel_id')
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
