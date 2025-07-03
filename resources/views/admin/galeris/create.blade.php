@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">{{ __('Tambah Galeri') }}</h1>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="{{ route('admin.galeris.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">Gambar</label>
                        <input type="file" class="form-control-file" id="file" name="file" accept="image/*" required>
                    </div>


                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('admin.galeris.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
