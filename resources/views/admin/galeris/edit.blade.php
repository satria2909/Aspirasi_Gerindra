@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">{{ __('Edit Galeri') }}</h1>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="{{ route('admin.galeris.update', $galeri) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $galeri->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $galeri->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="file_path">Gambar</label><br>
                        @if ($galeri->file_path)
                            <img src="{{ Storage::url($galeri->file_path) }}" width="150" class="mb-2">
                        @endif
                        <input type="file" class="form-control-file" id="file_path" name="file_path" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('admin.galeris.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
