@extends('layouts.app')

@section('content')

<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 justify-content-between d-flex">
                <h1 class="m-0">{{ __('Hasil Perhitungan VIKOR (SPK Aspirasi)') }}</h1>
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
                                    <th>Tujuan</th>
                                    <th>Kategori</th>
                                    <th>Urgensi</th>
                                    <th>Cakupan Wilayah</th>
                                    <th>Dampak Sosial</th>
                                    <th>Skor</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hasil as $aspirasi)
                                <tr>
                                    <td>{{ $aspirasi->id }}</td>
                                    <td>{{ $aspirasi->name }}</td>
                                    <td>{{ $aspirasi->tujuan }}</td>
                                    <td>{{ $aspirasi->kategori }}</td>
                                    <td>{{ $aspirasi->urgensi }}</td>
                                    <td>{{ $aspirasi->cakupan_wilayah }}</td>
                                    <td>{{ $aspirasi->dampak_sosial }}</td>
                                    <td><strong>{{ $aspirasi->skor }}</strong></td>
                                    <td>
                                        <form action="{{ route('admin.spk.updateStatus', $aspirasi->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status"
                                                    class="form-select form-select-sm status-select"
                                                    data-id="{{ $aspirasi->id }}"
                                                    onchange="this.form.submit()">
                                                <option value="Belum Ditinjau" {{ $aspirasi->status == 'Belum Ditinjau' ? 'selected' : '' }}>Belum Ditinjau</option>
                                                <option value="Sedang Diproses" {{ $aspirasi->status == 'Sedang Diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                                                <option value="Selesai" {{ $aspirasi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        {{ $hasil->links() }}
                    </div>

                    <div class="p-3">
                        <div class="mt-2">
                            <strong>Keterangan Nilai Kriteria:</strong>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm text-center" style="font-size: 14px;">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nilai</th>
                                            <th>Urgensi</th>
                                            <th>Cakupan Wilayah</th>
                                            <th>Dampak Sosial</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Tidak Mendesak</td>
                                            <td>Lingkup RT</td>
                                            <td>Sangat Rendah</td>
                                            <td>Infrastruktur</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Rendah</td>
                                            <td>Lingkup RW</td>
                                            <td>Rendah</td>
                                            <td>Kesehatan</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Sedang</td>
                                            <td>Kelurahan</td>
                                            <td>Sedang</td>
                                            <td>Pendidikan</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Tinggi</td>
                                            <td>Kecamatan</td>
                                            <td>Tinggi</td>
                                            <td>Ekonomi</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Sangat Mendesak</td>
                                            <td>Kota/Kabupaten</td>
                                            <td>Sangat Tinggi</td>
                                            <td>Lingkungan</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-4 p-3 alert alert-warning">
                            <strong>Catatan Perhitungan SPK (Metode VIKOR):</strong>
                            <p style="margin-top: 10px;">
                                Sistem ini menggunakan metode <strong>VIKOR (VIseKriterijumska Optimizacija I Kompromisno Resenje)</strong> untuk menghitung <strong>skor prioritas</strong> dari setiap aspirasi masyarakat. Proses ini melibatkan 4 kriteria utama dengan bobot sebagai berikut:
                            </p>
                            <ul>
                                <li><strong>Urgensi</strong> (Bobot: 40%)</li>
                                <li><strong>Cakupan Wilayah</strong> (Bobot: 20%)</li>
                                <li><strong>Dampak Sosial</strong> (Bobot: 30%)</li>
                                <li><strong>Jumlah Aspirasi Serupa (Kategori)</strong> (Bobot: 10%)</li>
                            </ul>

                            <p><strong>Langkah Perhitungan:</strong></p>
                            <ol>
                                <li>
                                    Normalisasi nilai setiap kriteria menggunakan rumus:
                                    <pre style="background-color: #f8f9fa; padding: 10px; border-left: 4px solid #ffc107;">
                        r<sub>ij</sub> = (x<sub>j</sub><sup>+</sup> − x<sub>ij</sub>) / (x<sub>j</sub><sup>+</sup> − x<sub>j</sub><sup>-</sup>)
                                    </pre>
                                    Keterangan:
                                    <br>x<sub>ij</sub> = nilai kriteria ke-j untuk aspirasi ke-i
                                    <br>x<sub>j</sub><sup>+</sup> = nilai maksimum dari semua aspirasi (terbaik)
                                    <br>x<sub>j</sub><sup>-</sup> = nilai minimum dari semua aspirasi (terburuk)
                                </li>

                                <li>
                                    Hitung nilai kompromi untuk masing-masing aspirasi:
                                    <pre style="background-color: #f8f9fa; padding: 10px; border-left: 4px solid #ffc107;">
                        S<sub>i</sub> = ∑(w<sub>j</sub> × r<sub>ij</sub>)
                        R<sub>i</sub> = max(w<sub>j</sub> × r<sub>ij</sub>)
                                    </pre>
                                    Di mana:
                                    <br>S<sub>i</sub> adalah total bobot deviasi
                                    <br>R<sub>i</sub> adalah deviasi maksimum (kritikal)
                                </li>

                                <li>
                                    Hitung nilai kompromi Q untuk setiap aspirasi:
                                    <pre style="background-color: #f8f9fa; padding: 10px; border-left: 4px solid #ffc107;">
                        Q<sub>i</sub> = v × (S<sub>i</sub> − S<sup>-</sup>) / (S<sup>+</sup> − S<sup>-</sup>) 
                            + (1 − v) × (R<sub>i</sub> − R<sup>-</sup>) / (R<sup>+</sup> − R<sup>-</sup>)
                                    </pre>
                                    Dengan nilai v = 0.5 (tingkat kompromi), S<sup>+</sup> = max(S), S<sup>-</sup> = min(S), R<sup>+</sup> = max(R), dan R<sup>-</sup> = min(R)
                                </li>

                                <li>
                                    Aspirasi dengan nilai <strong>Q terkecil</strong> merupakan yang paling diprioritaskan untuk ditindaklanjuti.
                                </li>
                            </ol>

                            <p><strong>Contoh:</strong></p>
                            <ul>
                                <li>Urgensi = 4</li>
                                <li>Cakupan Wilayah = 3</li>
                                <li>Dampak Sosial = 5</li>
                                <li>Jumlah Aspirasi Serupa = 8 (dari maksimum 10 kategori lain)</li>
                            </ul>

                            <p>Contoh normalisasi (misal nilai maksimum dan minimum diketahui):</p>
                            <pre style="background-color: #f8f9fa; padding: 10px; border-left: 4px solid #ffc107;">
                        r<sub>jumlah</sub> = (10 − 8) / (10 − 2) = 0.25
                        r<sub>urgensi</sub> = (5 − 4) / (5 − 2) = 0.33
                        dst...
                            </pre>

                            <p><strong>Langkah selanjutnya:</strong></p>
                            <pre style="background-color: #f8f9fa; padding: 10px; border-left: 4px solid #ffc107;">
                        S<sub>i</sub> = (0.4 × r<sub>urgensi</sub>) + (0.2 × r<sub>cakupan</sub>) + (0.3 × r<sub>dampak</sub>) + (0.1 × r<sub>jumlah</sub>)
                        R<sub>i</sub> = max dari (w<sub>j</sub> × r<sub>ij</sub>)
                        Q<sub>i</sub> = dihitung berdasarkan kombinasi S dan R
                            </pre>

                            <p>
                                <strong>Interpretasi:</strong><br>
                                Seluruh aspirasi masyarakat akan diurutkan berdasarkan nilai <strong>Q</strong>. Nilai Q yang lebih rendah berarti tingkat prioritas lebih tinggi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.status-select').forEach(function (select) {
                    setColor(select); // Initial color
                    select.addEventListener('change', function () {
                        setColor(this);
                    });
                });

                function setColor(select) {
                    const status = select.value;
                    select.classList.remove('bg-success', 'bg-warning', 'bg-secondary', 'text-white');

                    switch (status) {
                        case 'Selesai':
                            select.classList.add('bg-success', 'text-white');
                            break;
                        case 'Sedang Diproses':
                            select.classList.add('bg-warning', 'text-dark');
                            break;
                        case 'Belum Ditinjau':
                            select.classList.add('bg-secondary', 'text-white');
                            break;
                    }
                }
            });
        </script>
    </div>
</div>
@endsection
