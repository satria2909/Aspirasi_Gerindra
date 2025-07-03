@extends('layouts.frontend')

@section('content')
 <!--==================== HOME ====================-->
 <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <section class="islands swiper-slide">
              <img src="{{ asset('frontend/assets/img/background.png') }}" alt="" class="islands__bg" />
              <div class="bg__overlay">
              <div class="islands__container container">
                <div class="islands__data">
                  <h2 class="islands__subtitle">Fraksi Partai Gerindra</h2>
                  <h1 class="islands__title">Profil Fraksi</h1>
                </div>
              </div>
              </div>
            </section>
          </div>
        </div>
      </section>

      <section class="visi-misi" style="margin-top: 5rem; padding-bottom: 3rem; text-align: center;">
          <div style="padding: 0 1rem;">
              <h2 style="font-size: 2.5rem; font-weight: bold; color: #b22222; margin-bottom: 2rem;">Visi - Misi</h2>

              <div style="margin-bottom: 2rem; text-align: justify; display: inline-block; max-width: 800px; width: 100%;">
                  <h3 style="font-size: 2rem; color: #b22222; text-align: left; margin-bottom: 1rem;">Visi :</h3>
                  <p style="font-size: 1.1rem; line-height: 1.8;">
                      Menjadi Partai Politik yang mampu menciptakan kesejahteraan rakyat, keadilan sosial, dan tatanan politik negara yang melandaskan diri pada nilai-nilai nasionalisme dan religiusitas dalam wadah Negara Kesatuan Republik Indonesia yang berdasarkan pada Pancasila dan Undang-Undang Dasar 1945 yang senantiasa berdaulat di bidang politik, berkepribadian di bidang budaya, dan berdiri di atas kaki sendiri dalam bidang ekonomi.
                  </p>
              </div>

              <div style="margin-bottom: 2rem; text-align: justify; display: inline-block; max-width: 800px; width: 100%;">
                  <h3 style="font-size: 2rem; color: #b22222; text-align: left; margin-bottom: 1rem;">Misi :</h3>
                  <ul style="padding-left: 1px; text-align: justify; font-size: 1.1rem; line-height: 1.8;">
                      <li>1. Mempertahankan kedaulatan dan tegaknya Negara Kesatuan Republik Indonesia yang berdasarkan Pancasila dan Undang-Undang Dasar 1945 yang ditetapkan pada tanggal 18 Agustus 1945.</li>
                      <li>2. Mendorong pembangunan nasional yang menitikberatkan pada pembangunan ekonomi kerakyatan, pertumbuhan ekonomi yang berkelanjutan, dan pemerataan hasil-hasil pembangunan bagi seluruh warga bangsa dengan senantiasa berpegang teguh pada kemampuan sendiri.</li>
                      <li>3. Membentuk tatanan sosial dan politik masyarakat yang kondusif untuk mewujudkan kedaulatan rakyat dan kesejahteraan rakyat.</li>
                      <li>4. Menegakkan supremasi hukum dengan mengedepankan azas praduga tak bersalah dan persamaan hak di hadapan hukum serta melindungi seluruh warga Negara Indonesia secara berkeadilan tanpa memandang suku, agama, ras, dan/atau latar belakang golongan.</li>
                      <li>5. Merebut kekuasaan pemerintahan secara konstitusional melalui Pemilu Legislatif, Pemilu Presiden, dan Pemilu Kepala Daerah untuk menciptakan lapisan kepemimpinan nasional yang kuat dan bersih di setiap tingkat pemerintahan.</li>
                  </ul>
              </div>
          </div>
      </section>

      <section class="struktur-organisasi" style="margin-top: 5rem; padding-bottom: rem; text-align: center;">
          <div style="padding: 5;">
              <h2 style="font-size: 2.5rem; font-weight: bold; color: #b22222; margin-bottom: 2rem;">
                  Struktur Organisasi
              </h2>

              <!-- Gambar Struktur Organisasi -->
              <div style="display: flex; justify-content: center;">
                  <img src="{{ asset('frontend/assets/img/struktur.png') }}" 
                      alt="Struktur Organisasi Fraksi Gerindra" 
                      style="max-width: 100%; height: auto; border-radius: 10px; ">
              </div>
          </div>
      </section>


      <!--==================== POPULAR ====================-->
      <section class="section" id="popular">
        <div class="container">
          <span class="section__subtitle" style="text-align: center"></span>
          <h2 class="section__title" style="font-size: 2.5rem; font-weight: bold; color: #b22222; margin-bottom: 2rem; text-align: center;">
            Anggota Fraksi Gerindra </br> DPRD Kota Semarang
          </h2>

          <div class="popular__all">
            @foreach($anggotas as $anggota)
                <article class="popular__card">
                <a href="{{ route('anggota.show', $anggota->slug) }}">
                    <img
                    src="{{ Storage::url($anggota->galleries->first()->images) }}"
                    alt=""
                    class="popular__img"
                    />
                    <div class="popular__data">
                    
                    <h3 class="popular__title">{{ $anggota->nama }}</h3>
                    <p class="popular__description">{{ $anggota->jabatan }}</p>
                    </div>
                </a>
                </article>
            @endforeach
          </div>
        </div>
      </section>
@endsection