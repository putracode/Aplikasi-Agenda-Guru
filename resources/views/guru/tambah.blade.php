@extends('layout.master')

@section('content')
    

<div class="col-12 grid-margin stretch-card">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title">Tambah Guru</h4>

            <form class="forms-sample"action="/tambahguru" method="POST">
                @csrf
                    <div class="mb-4">
                        <label for="nama_guru" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control @error('nama_guru') @enderror" id="nama_guru" 
                        name="nama_guru">
                        @error('nama_guru')
                            <div class="invalid-feedback">
                                {{ $messege }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nik_guru" class="form-label">NIK Guru</label>
                        <input type="text" class="form-control @error('nik_guru') @enderror" id="nik_guru"
                        name="nik_guru">
                        @error('nik_guru')
                            <div class="invalid-feedback">
                                {{ $messege }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mapel_id" class="form-label">Mata Pelajaran</label>
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
                        <label for="user_id" class="form-label">Username</label>
                        <select class="form-select" name="user_id" id="user_id">
                            @foreach ($user as $users)
                            <option value="{{ $users->id }}">{{ $users->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary px-5 float-right">Submit</button>
                    <a href="/guru" class="btn btn-danger px-5 mr-2 float-right">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>