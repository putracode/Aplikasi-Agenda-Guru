<div class="container">
    <div class="row">
        <h2 class="mb-4 mt-2">Mengedit Data</h2>

    </div>
    <div class="row">
        <form action="/updateguru/{{ $data->id }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Nama Guru</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="nama_guru" value="{{ $data->nama_guru }}">
            </div>

            <div class="mb-4">
                <label for="exampleInputEmail2" class="form-label">NIK Guru</label>
                <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp"
                    name="nik_guru" value="{{ $data->nik_guru }}">
            </div>

            <div class="mb-4">
                <label for="exampleInputEmail3" class="form-label">Mata Pelajaran</label>
                <input type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp"
                    name="mata_pelajaran" value="{{ $data->mata_pelajaran }}">
            </div>

            <div class="mb-4">
                <label for="exampleInputEmail4" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp"
                    name="username" value="{{ $data->username }}">
            </div>

            <div class="mb-4">
                <label for="exampleInputEmail5" class="form-label">Password</label>
                <input type="text" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp"
                    name="password" value="{{ $data->password }}">
            </div>

            <button type="submit" class="btn btn-primary px-5 float-right ">Update</button>
            <a href="/guru"><button class="btn btn-danger px-5 float-right mr-3">Kembali</button></a>

        </form>
    </div>
</div>