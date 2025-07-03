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
                            <h1 class="islands__title">Galeri</h1> 
                        </div> 
                    </div> 
                </div> 
            </section> 
        </div> 
    </div> 
</section> 

<section class="section" style="padding: 60px 0; "> 
    <div class="container" style="max-width: 1224px; width:90%; margin: auto;"> 
        <h2 style="text-align: center;  font-size: 28px; margin-bottom: 10px; color: #b22222;">Galeri Kegiatan</h2> 
        <p style="text-align: center; font-size: 16px; color: #555; margin-bottom: 40px;"> Dokumentasi kegiatan Fraksi Partai Gerindra DPRD Kota Semarang. </p>
        
        <!-- Grid Galeri dengan Masonry Layout -->
        <div class="gallery__grid" style="column-count: 4; column-gap: 10px; display: block;">
            @forelse ($galeris as $galeri)
                <div class="gallery__item" style="margin-bottom: 5px; break-inside: avoid; width: 100%; display: inline-block;">
                    <img src="{{ Storage::url($galeri->file_path) }}" alt="Galeri" 
                         style="width: 100%; height: auto; object-fit: cover;" 
                         onclick="openModal(this.src)">
                </div>
            @empty
                <p style="text-align: center;">Belum ada gambar di galeri.</p>
            @endforelse
        </div>
    </div>
</section> 

<!-- Modal View --> 
<div id="imageModal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.8); justify-content: center; align-items: center;"> 
    <span onclick="closeModal()" style="position: absolute; top: 20px; right: 30px; font-size: 40px; color: white; cursor: pointer;">&times;</span> 
    <img id="modalImage" src="" style="max-width: 90%; max-height: 90%; border-radius: 10px;"> 
</div> 

<script> 
function openModal(src) { 
    document.getElementById('modalImage').src = src; 
    document.getElementById('imageModal').style.display = 'flex'; 
} 
function closeModal() { 
    document.getElementById('imageModal').style.display = 'none'; 
} 
</script>

@endsection
