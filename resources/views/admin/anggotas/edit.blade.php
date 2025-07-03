@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Form Edit') }}</h1>
                    <a href="{{ route('admin.anggotas.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($anggota->galleries as $gallery)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gallery->name }}</td>
                                        <td>
                                            <a href="{{ Storage::url($gallery->images) }}" target="_blank">
                                                <img width="100" src="{{ Storage::url($gallery->images) }}" alt="{{ $gallery->name }}">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.anggotas.galleries.edit', [$anggota,$gallery]) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>              
                                            <form onclick="return confirm('are you sure ?');" class="d-inline-block" action="{{ route('admin.anggotas.galleries.destroy', [$anggota,$gallery]) }}" method="post">
                                                @csrf 
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                                            </form>                              
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">Gallery Kosong</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.anggotas.galleries.store', [$anggota]) }}" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-group row border-bottom pb-4">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="example: John Doe">
                                </div>
                            </div>
                           
                            <div class="form-group row border-bottom pb-4">
                                <label for="images" class="col-sm-2 col-form-label">Images</label>
                                <div class="col-sm-10">
                                <input type="file" class="form-control" name="images" value="{{ old('images') }}" id="images">
                                </div>
                            </div>
                           
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>

                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.anggotas.update', [$anggota]) }}">
                            @csrf 
                            @method('put')
                            <div class="form-group row border-bottom pb-4">
                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="jabatan" value="{{ old('jabatan', $anggota->jabatan) }}" id="jabatan" placeholder="example: Ketua">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                <input text="text" class="form-control" id="Nama" name="nama" value="{{ old('nama', $anggota->nama) }}" placeholder="example: John Doe">
                                </div>
                            </div>
                            
                            <div class="form-group row border-bottom pb-4">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" name="type" id="description" cols="30" rows="7" placeholder="Description text...">{{ old('description', $anggota->description) }}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection


@section('styles')
<style>
.ck-editor__editable_inline {
    min-height: 200px;
}
</style>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection