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
            {{-- <a href="/kelas"><button class="btn btn-danger px-5 float-right mr-3">Kembali</button></a> --}}

        </form>
    </div>
</div>


@endsection
