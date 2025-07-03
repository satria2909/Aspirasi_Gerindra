@extends('layouts.app')

@section('content')
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0">{{ __('Aspirasi') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No. Telepon</th>
                                        <th>Judul</th>
                                        <th>Pesan</th>
                                        <th>Anggota Dewan</th>
                                        <th>Dapil</th>
                                        <th>Dokumen</th>
                                        <th style="width: 160px;">Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($aspirasis as $aspirasi)
                                    <tr>
                                        <td>{{ $aspirasi->id }}</td>
                                        <td>{{ $aspirasi->name }}</td>
                                        <td>{{ $aspirasi->address }}</td>
                                        <td>{{ $aspirasi->phone }}</td>
                                        <td>{{ $aspirasi->tujuan }}</td>
                                        <td>{{ $aspirasi->message }}</td>
                                        <td>{{ $aspirasi->nama_dewan }}</td>
                                        <td>{{ $aspirasi->dapil }}</td>
                                        
                                        <td>
                                            @if ($aspirasi->file_path)
                                                @php
                                                    $ext = pathinfo($aspirasi->file_path, PATHINFO_EXTENSION);
                                                    $fileUrl = Storage::url($aspirasi->file_path);
                                                @endphp

                                                @if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif']))
                                                    <a href="{{ $fileUrl }}" target="_blank">
                                                        <img src="{{ $fileUrl }}" width="100" alt="Dokumen Gambar">
                                                    </a>
                                                @elseif (in_array(strtolower($ext), ['pdf']))
                                                    <a href="{{ $fileUrl }}" target="_blank">
                                                        <img src="{{ asset('frontend/assets/img/pdf.png') }}" width="40" alt="Lihat PDF">
                                                        <br>Lihat PDF
                                                    </a>
                                                @elseif (in_array(strtolower($ext), ['doc', 'docx']))
                                                    <a href="{{ $fileUrl }}" target="_blank">
                                                        <img src="{{ asset('frontend/assets/img/doc.png') }}" width="40" alt="Lihat Word">
                                                        <br>Lihat Word
                                                    </a>
                                                @else
                                                    <a href="{{ $fileUrl }}" target="_blank">Unduh File</a>
                                                @endif
                                            @else
                                                <span>Tidak ada file</span>
                                            @endif
                                        </td>
                                        <td style="width: 160px;">
                                            @if ($aspirasi->status === 'Selesai')
                                                <span style="padding: 4px 10px; border: 1px solid #28a745; color: #28a745; border-radius: 6px; font-weight: 500;">
                                                    {{ $aspirasi->status }}
                                                </span>
                                            @elseif ($aspirasi->status === 'Sedang Diproses')
                                                <span style="padding: 4px 10px; border: 1px solid #ffc107; color: #ffc107; border-radius: 6px; font-weight: 500;">
                                                    {{ $aspirasi->status }}
                                                </span>
                                            @elseif ($aspirasi->status === 'Belum Ditinjau')
                                                <span style="padding: 4px 10px; border: 1px solid #6c757d; color: #6c757d; border-radius: 6px; font-weight: 500;">
                                                    {{ $aspirasi->status }}
                                                </span>
                                            @else
                                                <span>{{ $aspirasi->status }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            <form onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="d-inline-block" action="{{ route('admin.aspirasis.destroy', [$aspirasi]) }}" method="post">
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



                        <div class="card-footer clearfix">
                            {{ $aspirasis->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
