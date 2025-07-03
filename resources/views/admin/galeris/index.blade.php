@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0">{{ __('Galeri') }}</h1>
                    <a href="{{ route('admin.galeris.create') }}" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> </a>
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Gambar</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($galeris as $galeri)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $galeri->title }}</td>
                                        <td>{{ $galeri->description }}</td>
                                        <td>
                                            @if ($galeri->file_path)
                                                <a href="{{ Storage::url($galeri->file_path) }}" target="_blank">
                                                    <img src="{{ Storage::url($galeri->file_path) }}" width="100">
                                                </a>
                                            @else
                                                <span>Tidak ada file</span>
                                            @endif
                                        </td>

                                        <td>
                                                          
                                            <form onclick="return confirm('are you sure ?');" class="d-inline-block" action="{{ route('admin.galeris.destroy', [$galeri]) }}" method="post">
                                                @csrf 
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                                            </form>                              
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $galeris->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection