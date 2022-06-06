@extends('layout.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary float-right mb-3 btn-sm mr-3 px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
        </button>   
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable"  cellspacing="0">
                
                    
                
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Timestamp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($data as $row)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama_kelas }}</td>
                        <td>{{ $row->wali_kelas }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td class="d-flex">
                            {{-- <button type="button" class="btn btn-warning  btn-sm px-3 mr-1" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                Edit
                            </button>    --}}
                            <a href="/editkelas/{{ $row->id }}" class="btn btn-warning btn-sm mr-1">Edit</a>
                            <a href="/deletekelas/{{ $row->id }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/tambahkelas" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="nama_kelas">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail2" class="form-label">Wali Kelas</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp"
                            name="wali_kelas">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mengedit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/updateguru/{{ $data->id }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Guku</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="nama_guru">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail2" class="form-label">NIK Guru</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp"
                            name="nik_guru">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail3" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp"
                            name="mata_pelajaran">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail4" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp"
                            name="username">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail5" class="form-label">Password</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp"
                            name="password">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div> --}}