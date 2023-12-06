@extends('layout.master')

@section('title', 'Tambah Mahasiswa')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/mahasiswa') }}">Mahasiswa</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="card-title">Form Tambah Mahasiswa</h4>
            </div>
        </div>
        <form action="{{ url('/mahasiswa') }}" method="POST">
            <div class="card-body">
                @csrf
                <div>
                    <label class="form-label @error('nim') text-danger @enderror">NIM</label>
                    <input class="form-control @error('nim') is-invalid @enderror" type="text" name="nim" value="{{ old('nim') }}">
                    @error('nim')
                        <div class="invalid-feedback mb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label class="form-label @error('nama') text-danger @enderror">Nama</label>
                    <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback mb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label class="form-label @error('jurusan') text-danger @enderror">Jurusan</label>
                    <select class="form-select @error('jurusan') is-invalid @enderror" name="jurusan">
                        @foreach ($jurusan as $j)
                            <option value="{{ $j->id }}" {{old('jurusan') == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                        @endforeach
                    </select>
                    @error('jurusan')
                        <div class="invalid-feedback mb-2">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
