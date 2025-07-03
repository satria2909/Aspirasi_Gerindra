@extends('layouts.frontend')

@section('content')
<!--==================== HOME ====================-->
<section>
    <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <!--========== ISLANDS 1 ==========-->
            <section class="islands swiper-slide">s
                <img
                    src="{{ asset('frontend/assets/img/welcome3.png') }}"
                    alt=""
                    class="islands__bg"
                />
                <div class="bg__overlay">
                    <div class="islands__container container">
                        <div
                            class="islands__data"
                            style="z-index: 99; position: relative">
                            <h2 class="islands__subtitle">
                                Fraksi Partai Gerindra
                            </h2>
                            <h1 class="islands__title">
                                Selamat Datang
                            </h1>
                            <p class="islands__description">
                                Di Website Resmi Fraksi Partai Gerindra
                                <br />
                                DPRD Kota Semarang
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<!--==================== LOGOS ====================-->


<!--==================== POPULAR ====================-->
<section class="section" id="popular">
    <div class="container">
        
        <h2 class="section__title" style="font-size: 2.5rem; font-weight: bold; color: #b22222; margin-bottom: 1rem; text-align: center;">
            Anggota Fraksi Partai Gerindra </br> DPRD Kota Semarang
        </h2>

        <div class="popular__container swiper">

            <div class="swiper-wrapper">
                @foreach($anggotas as $anggota)
                    <article class="popular__card swiper-slide">
                        <a href="{{ route('anggota.show', $anggota->slug) }}">
                            <img
                                src="{{ Storage::url($anggota->galleries->first()->images) }}"
                                alt=""
                                class="popular__img"
                            />
                            <div class="popular__data">
                                
                                <h3 class="popular__title">
                                    {{ $anggota->nama}}
                                </h3>
                                <p class="popular__description">{{ $anggota->jabatan }}</p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>

            <div class="swiper-button-next">
                <i class="bx bx-chevron-right"></i>
            </div>
            <div class="swiper-button-prev">
                <i class="bx bx-chevron-left"></i>
            </div>
        </div>
    </div>
</section>

<!-- blog -->
<section class="blog section" id="blog">
    <div class="blog__container container">
        <span class="section__subtitle" style="text-align: center"
            ></span
        >
        <h2 class="section__title" style="font-size: 2.5rem; font-weight: bold; color: #b22222; margin-bottom: 1rem; text-align: center;">
            Berita Fraksi Gerindra
        </h2>

        <div class="blog__content grid">
            @foreach($blogs as $blog)
                <article class="blog__card">
                    <div class="blog__image">
                        <img
                            src="{{ Storage::url($blog->image) }}"
                            alt=""
                            class="blog__img"
                        />
                        <a href="{{ route('blog.show', $blog->slug) }}" class="blog__button">
                            <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    </div>

                    <div class="blog__data">
                        <h2 class="blog__title">
                            {{ $blog->title }}
                        </h2>
                        <p class="blog__description">
                            {{ $blog->excerpt }}
                        </p>

                        <div class="blog__footer">
                            <div class="blog__reaction">
                                {{ date('d M Y', strtotime($blog->created_at)) }}
                            </div>
                            <div class="blog__reaction">
                                <i class="bx bx-show"></i>
                                <span>{{ $blog->reads }}</span>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection