@extends('layouts.frontend')

@section('content')

<!--==================== HOME ====================-->
    <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <!--========== ISLANDS 1 ==========-->
            <section class="islands swiper-slide">
              <img
                src="{{ asset('frontend/assets/img/background.png') }}"
                alt=""
                class="islands__bg"
              />
              <div class="bg__overlay">
                <div class="islands__container container">
                  <div class="islands__data">
                    <h2 class="islands__subtitle">Fraksi Partai Gerindra</h2>
                    <h1 class="islands__title">Aspirasi</h1>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>

      <section class="section form" id="form">
    <div class="container aspirasi-form" style="max-width: 700px; margin: 0 auto; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
        <h2 class="section__title" style="text-align: center; color: #b22222; font-size: 28px; margin-bottom: 10px;">
            Form Aspirasi Masyarakat
        </h2>
        <p class="section__subtitle" style="text-align: center; font-size: 16px; color: #aaa; margin-bottom: 30px;">
            Silakan sampaikan aspirasi Anda kepada Fraksi Partai Gerindra DPRD Kota Semarang.
        </p>

        <div class="contact__container">
            <form action="{{ route('aspirasi.store') }}" method="POST" enctype="multipart/form-data" class="contact__form">
                @csrf
                <div class="contact__inputs" style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 20px;">
                    <input type="text" name="name" placeholder="Nama Anda" required
                        style="padding: 12px 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; width: 100%;">
                    
                    <input type="text" name="address" placeholder="Alamat Anda" required
                        style="padding: 12px 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; width: 100%;">
                    
                    <input type="text" name="phone" placeholder="Narahubung/Telp/WA" required
                        style="padding: 12px 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; width: 100%;">

                    <input type="text" name="tujuan" placeholder="Judul Aspirasi" required
                    style="padding: 12px 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; width: 100%;">

                    <textarea name="message" rows="4" placeholder="Deskripsi Aspirasi" required
                        style="padding: 12px 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; width: 100%; "></textarea>
                    
                </div>

                <label for="nama_dewan" style="font-size: 14px; margin-bottom: 8px;">Nama Anggota Dewan:</label>
                <select id="nama_dewan" name="nama_dewan" required
                    style="padding: 12px 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; width: 100%; margin-bottom: 10px;">
                    <option value="">- - Pilih Nama Anggota Dewan - -</option>
                    <option value="Arya Setya Novanto, S.H., M.H">Arya Setya Novanto, S.H., M.H</option>
                    <option value="Nunung Sriyanto, S.H., M.M">Nunung Sriyanto, S.H., M.M</option>
                    <option value="Dinda Ari Ayu Isnani, S.T">Dinda Ari Ayu Isnani, S.T</option>
                    <option value="Herlambang Prabowo, S.A">Herlambang Prabowo, S.A</option>
                    <option value="Dyah Tunjung Pudyawati, S.M.B., M.M">Dyah Tunjung Pudyawati, S.M.B., M.M</option>
                    <option value="H. Mualim, S.Pd., M.H., M.M">H. Mualim, S.Pd., M.H., M.M</option>
                    <option value="Drs. H. Abdul Majid">Drs. H. Abdul Majid</option>
                </select>

                <label for="dapil_display" style="font-size: 14px; margin-bottom: 8px;">Dapil:</label>
                <input type="text" id="dapil_display" placeholder="Pilih Nama Anggota Dewan" readonly
                    style="background-color: white; color: black; cursor: default; padding: 12px 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; width: 100%; margin-bottom: 10px;">
                <input type="hidden" name="dapil" id="dapil">
  
                <label for="urgensi" style="font-size: 14px; margin-bottom: 8px; ">Urgensi:</label>
                <select name="urgensi" required style="padding: 12px 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; width: 100%; margin-bottom: 10px;">
                  <option>- - Pilih Tingkat Urgensi - -</option>
                  <option value="1">1 - Tidak Mendesak</option>
                  <option value="2">2 - Rendah</option>
                  <option value="3">3 - Sedang</option>
                  <option value="4">4 - Tinggi</option>
                  <option value="5">5 - Sangat Mendesak</option>
                </select>

                <label for="cakupan_wilayah" style="font-size: 14px; margin-bottom: 8px; ">Cakupan Wilayah:</label>
                <select name="cakupan_wilayah" required style="padding: 12px 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; width: 100%; margin-bottom: 10px;">
                  <option>- - Pilih Tingkat Cakupan Wilayah - -</option>
                  <option value="1">1 - Lingkup RT</option>
                  <option value="2">2 - Lingkup RW</option>
                  <option value="3">3 - Kelurahan</option>
                  <option value="4">4 - Kecamatan</option>
                  <option value="5">5 - Kota/Kabupaten</option>
                </select>

                <label for="dampak_sosial" style="font-size: 14px; margin-bottom: 8px; ">Dampak Sosial:</label>
                <select name="dampak_sosial" required style="padding: 12px 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; width: 100%; margin-bottom: 10px;">
                  <option>- - Pilih Tingkat Dampak Sosial - -</option>
                  <option value="1">1 - Sangat Rendah</option>
                  <option value="2">2 - Rendah</option>
                  <option value="3">3 - Sedang</option>
                  <option value="4">4 - Tinggi</option>
                  <option value="5">5 - Sangat Tinggi</option>
                </select>

                <label for="kategori" style="font-size: 14px; margin-bottom: 8px; ">Kategori:</label>
                <select name="kategori" required style="padding: 12px 16px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px; width: 100%; margin-bottom: 10px;">
                  <option>- - Pilih Kategori - -</option>
                  <option value="1">Infrastruktur</option>
                  <option value="2">Kesehatan</option>
                  <option value="3">Pendidikan</option>
                  <option value="4">Ekonomi</option>
                  <option value="5">Lingkungan</option>
                </select>

                <label for="file" style="font-size: 14px; margin-bottom: 8px; ">Unggah Dokumen Pendukung (Opsional):</label>
                <input type="file" name="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" 
                    style="margin-bottom: 20px; padding: 8px; border: 1px solid #ccc; border-radius: 8px; width: 100%;">

                <button type="submit"
                    style="background-color: #b22222; color: white; padding: 12px 20px; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; width: 100%; transition: background-color 0.3s;">
                    Kirim Aspirasi
                </button>
            </form>
        </div>
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                confirmButtonColor: '#b22222'
            });
        </script>
        @endif

        <script>
            const dewanToDapil = {
                "Arya Setya Novanto, S.H., M.H": "Dapil 1 (Semarang Tengah, Semarang Timur, Semarang Utara)",
                "Nunung Sriyanto, S.H., M.M": "Dapil 2 (Gayamsari, Genuk, Pedurungan)",
                "Dinda Ari Ayu Isnani, S.T": "Dapil 2 (Gayamsari, Genuk, Pedurungan)",
                "Herlambang Prabowo, S.A": "Dapil 3 (Candisari, Tembalang)",
                "Dyah Tunjung Pudyawati, S.M.B., M.M": "Dapil 4 (Banyumanik, Gajahmungkur, Gunungpati)",
                "H. Mualim, S.Pd., M.H., M.M": "Dapil 5 (Mijen, Ngaliyan, Tugu)",
                "Drs. H. Abdul Majid": "Dapil 6 (Semarang Barat, Semarang Selatan)"
            };

            document.getElementById('nama_dewan').addEventListener('change', function () {
                const selectedName = this.value;
                const selectedDapil = dewanToDapil[selectedName] || "";

                // Tampilkan di input readonly
                document.getElementById('dapil_display').value = selectedDapil;

                // Simpan ke input hidden agar ikut terkirim
                document.getElementById('dapil').value = selectedDapil;
            });
        </script>

    </div>
</section>
@endsection
