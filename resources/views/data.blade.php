@extends('komponen.navbar')

@section('main')
<div class="main-panel">
    <div class="container">
        <div class="panel-header bg-warning-gradient">
            <div class="page-inner py-5 typo">
                <h1>kelompok 1</h1>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-info alert-dismissible fade show w-50 position-fixed top-10 start-50 translate-middle" role="alert" style="z-index: 9999;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="page-inner">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4>Data</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('data.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari data" name="keyword" value="{{ request('keyword') }}">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </form>
                            <div class="row">
                                @foreach ($data as $item)
                                <div class="col-md-3">
                                    <div class="card" style="width:auto; height: 550px;">
                                        @if ($item->foto)
                                        <img src="{{ asset('uploads/' . $item->foto) }}" alt="" style="max-width: 300px; max-height: 300px;">
                                        @else
                                        <img src="" alt="foto belum diupload" style="width: auto" height="200px">
                                        @endif
                                        <div class="card-body text-start">
                                            <h5 class="card-title">No:{{ $item->id }}</h5>
                                            <p class="card-text">nama:{{ $item->nama }}</p>
                                            <p class="card-text">nik:{{ $item->nik }}</p>
                                            <p class="card-text">jenis kelamin:{{ $item->jeniskelamin }}</p>
                                            <p class="card-text">tanggallahir:{{ $item->tanggal_lahir }}</p>
                                            <p class="card-text">alamat:{{ $item->alamat }}</p>
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                Edit
                                            </button>
                                            <form action="{{ route('data.hapus', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($data as $item)
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModal{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{ $item->id }}Label">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('data.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editNomor" name="nomor" placeholder="masukan nomor" value="{{ $item->nomor }}" required>
                        <label for="editNomor" class="form-label">Nomor</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editNama" name="nama" placeholder="masukan nama" value="{{ $item->nama }}" required>
                        <label for="editNama" class="form-label">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editNIK" name="nik" placeholder="masukan nik" value="{{ $item->nik }}" required>
                        <label for="editNIK" class="form-label">NIK</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="editTanggalLahir" name="tanggal_lahir" placeholder="masukan tanggal lahir" value="{{ $item->tanggal_lahir }}" required>
                        <label for="editTanggalLahir" class="form-label">Tanggal Lahir</label>
                    </div>
                    <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="jeniskelamin"required >
                                <option value=""> pilih jeniskelamin</option>
                                <option value="Laki-laki" {{ $item->jeniskelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $item->jeniskelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                              </select>
                        </select>
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                      </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="editAlamat" name="alamat" placeholder="masukan alamat" required>{{ $item->alamat }}</textarea>
                        <label for="editAlamat" class="form-label">Alamat</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" id="editFoto" name="foto" placeholder="masukan foto">
                        <label for="editFoto" class="form-label">Foto</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal tambah -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('data.tambah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="masukan nomor" name="nomor" required >
                        <label for="floatingInput">masukan nomor</label>
                      </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="createNama"  placeholder="masukan nama" name="nama" required>
                        <label for="createNama" class="form-label">masukan nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="createNIK" placeholder="masukan nik" name="nik" required>
                        <label for="createNIK" class="form-label">masukan NIK</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="tambah" name="jeniskelamin" required>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                      </div>
                      
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="createTanggalLahir" placeholder="masukan tanggal" name="tanggal_lahir" required>
                        <label for="createTanggalLahir" class="form-label">masukan tanggal lahir</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="createAlamat" placeholder="masukan alamat" name="alamat" required></textarea>
                        <label for="createAlamat" class="form-label">Alamat</label>
                    </div>
                    <div class=" form-floating mb-3">
                        <input type="file" class="form-control" id="createFoto" placeholder="masukan foto" name="foto">
                        <label for="createFoto" class="form-label">Foto</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
