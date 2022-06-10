@extends('layout.main')

@section('content')

<div class="container">
    <div class="row">
        <h2 class="mb-4 mt-2">Mengedit Data</h2>

    </div>
    <div class="row">
        <form action="/updateagenda/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_guru" class="form-label">Nama Guru</label>
                <input list="browsers" name="guru_id" class="form-control @error('guru_id') is-invalid @enderror" id="nama_guru" value="{{  auth()->user()->guru->id  }}" readonly> 
                @foreach($guru as $data1)
                <datalist id="browsers">
                      <option value="{{$data1->id}}">{{$data1->nama_guru}}</option>
                @endforeach
                @error('guru_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mapel_id" class="form-label">Mata Pelajaran</label>
                <input list="browsers1" name="mapel_id" class="form-control @error('mapel_id') is-invalid @enderror" id="mapel_id" value="{{ $data->mapel->nama_mapel }}"> 
                @foreach($mapel as $data1)
                <datalist id="browsers1">
                      <option value="{{$data1->id}}">{{$data1->nama_mapel}}</option>
                @endforeach
                @error('mapel_id')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="materi" class="form-label">Materi</label>
                <input type="text" class="form-control @error('materi') is-invalid @enderror" id="materi" name="materi"
                value="{{ $data->materi }}">
                @error('materi')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="jam_pelajaran" class="form-label">Jam Pelajaran</label>
                <input type="time" class="form-control @error('jam_pelajaran') is-invalid @enderror" id="jam_pelajaran" name="jam_pelajaran"
                value="{{ $data->jam_pelajaran }}">
                @error('jam_pelajaran')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="absen" class="form-label">Absensi</label>
                <input type="text" class="form-control @error('absen') is-invalid @enderror" id="absen" name="absen" value="{{ $data->absen }}">
                @error('absen')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mata_pelajaran" class="form-label">Kelas</label>
                <input list="browsers2" name="kelas_id"  class="form-control @error('kelas_id') is-invalid @enderror" id="mata_pelajaran" value="{{ $data->kelas->nama_kelas }}"> 
                @foreach($kelas as $data1)
                <datalist id="browsers2">
                      <option value="{{$data1->id}}">{{$data1->nama_kelas}}</option>
                @endforeach
                @error('kelas_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="pembelajaran" class="form-label">Pembelajaran</label>
                <select class="form-select @error('pembelajaran') is-invalid @enderror"
                    aria-label="Default select example" id="pembelajaran" name="pembelajaran">
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
                <label for="link" class="form-label">Link Pembelajaran</label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ $data->link }}">
                @error('link')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="dokumentasi" class="form-label">Dokumentasi</label>
                <input type="file" class="form-control @error('dokumentasi') is-invalid @enderror" id="dokumentasi" name="image" value="{{ $data->image }}">
                @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                value="{{ $data->keterangan }}">
                @error('keterangan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary px-5 float-right ">Update</button>


        </form>
    </div>
</div>


@endsection
