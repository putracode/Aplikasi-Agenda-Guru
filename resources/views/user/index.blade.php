@extends('layout.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary float-right mb-3 btn-sm mr-3 px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
        </button>   
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable"  cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->role }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->password }}</td>
                        <td class="">
                            {{-- <button type="button" class="btn btn-warning  btn-sm px-3 mr-1" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                Edit
                            </button>    --}}
                            <a href="/editregister/{{ $row->id }}" class="btn btn-warning btn-sm mb-1 d-block">Edit</a>
                            <a href="/deleteregister/{{ $row->id }}" class="btn btn-danger btn-sm ">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
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
                <form action="/tambahregister" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') @enderror" id="name" 
                        name="name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $messege }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select @error('role') is-invalid @enderror" aria-label="Default select example" id="role" name="role"> 
                            <option value="1">guru</option>
                            <option value="2">admin</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') @enderror" id="username" 
                        name="username">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $messege }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') @enderror" id="email" 
                        name="email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $messege }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control @error('password') @enderror" id="password" 
                        name="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $messege }}
                            </div>
                        @enderror
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