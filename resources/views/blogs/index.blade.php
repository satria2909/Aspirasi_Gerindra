@extends('layouts.frontend')

@section('content')
<!--==================== HOME ====================-->
<section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
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
                  <h1 class="islands__title">Berita</h1>
                </div>
              </div>
            </div>
            </section>
          </div>
        </div>
      </section>

      <!-- blog -->
      <section class="blog section" id="blog">
        <div class="blog__container container">
          <span class="section__subtitle" style="text-align: center; color: #aaa;"
            >Semua Berita</span
          >
          <h2 class="section__title" style="text-align: center; color: #b22222; font-size: 28px; margin-bottom: 10px;">
            Temukan Berita Terbaru
          </h2>

          <div class="blog__content grid">
            @foreach($blogs as $blog)
                <article class="blog__card">
                <div class="blog__image">
                    <img src="{{ Storage::url($blog->image) }}" alt="" class="blog__img" />
                    <a href="{{ route('blog.show',$blog->slug) }}" class="blog__button">
                    <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>

                <div class="blog__data">
                    <h2 class="blog__title">{{ $blog->title }}</h2>
                    <p class="blog__description">
                        {{ $blog->excerpt }}
                    </p>

                    <div class="blog__footer">
                    <div class="blog__reaction">{{ date('d M Y', strtotime($blog->created_at)) }}</div>
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