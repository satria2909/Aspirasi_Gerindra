@extends('layouts.frontend')

@section('content')
 <!--==================== HOME ====================-->
 <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
          @foreach($anggota->galleries as $gallery)
            <section class="islands swiper-slide">
              <img src="{{ asset('frontend/assets/img/background.png') }}" alt="" class="islands__bg" />

              <div class="islands__container container">
                <div class="islands__data">
                  <h2 class="islands__subtitle">Biografi</h2>
                  <h1 class="islands__title">{{ $gallery->name }}</h1>
                </div>
              </div>
            </section>
          @endforeach
          </div>
        </div>

        <!--========== CONTROLS ==========-->
        <div class="controls gallery-thumbs">
          <div class="controls__container swiper-wrapper">
           @foreach($anggota->galleries as $gallery)
            <img
              src="{{ Storage::url($gallery->images) }}"
              alt=""
              class="controls__img swiper-slide"
            />
           @endforeach
          </div>
        </div>
      </section>

      <section class="blog section" id="blog">
        <div class="blog__container container">
          <div class="content__container">
            <div class="blog__detail">
            {!! $anggota->description !!}
            </div>
            <div class="package-travel">
              <h3 style="margin-bottom: 1rem">Berita Populer</h3>
              @foreach($relatedBlogs as $relatedBlog)
                <article class="popular__card" style="margin-bottom: 1rem">
                  <a href="{{ route('blog.show', $relatedBlog->slug) }}">
                    <img
                      src="{{ Storage::url($relatedBlog->image) }}"
                      alt=""
                      class="popular__img"
                    />
                    <div class="popular__data">
                      <h3 class="popular__title">{{ $relatedBlog->title }}</h3>
                      <p class="popular__description">{{ $relatedBlog->excerpt }}</p>
                    </div>
                  </a>
                </article>
              @endforeach
            </div>
          </div>
        </div>
      </section>

      <section class="section" id="popular">
        <div class="container">
          <span class="section__subtitle" style="text-align: center"
            >Anggota Fraksi</span
          >
          <h2 class="section__title" style="text-align: center">
            Partai Gerindra
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

    @if(session()->has('message'))
      <div id="alert" class="alert">
        {{ session()->get('message') }}
        <i class='bx bx-x alert-close' id="close"></i>
      </div>
    @endif
@endsection

@push('style-alt')
<style>
  .alert {
    position:absolute;
    top: 120px;
    left:0;
    right:0;
    background-color: var(--second-color);
    color: white;
    padding: 1rem;
    width: 70%;
    z-index: 99;
    margin: auto;
    border-radius: .25rem;
    text-align: center;
  }

  .alert-close {
    font-size: 1.5rem;
    color: #090909;
    position: absolute;
    top: .25rem;
    right: .5rem;
    cursor: pointer;
  }
  blockquote {
    border-left: 8px solid #b4b4b4;
    padding-left: 1rem;
  }
  .blog__detail ul li {
    list-style: initial;
  }
</style>
@endpush

@push('script-alt')
<script>
      let galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 0,
        slidesPerView: 0,
      });

      let galleryTop = new Swiper('.gallery-top', {
        effect: 'fade',
        loop: true,

        thumbs: {
          swiper: galleryThumbs,
        },
      });

      const close = document.getElementById('close');
      const alert = document.getElementById('alert');
      if(close) {
        close.addEventListener('click', function() {
          alert.style.display = 'none';
        })
      }
    </script>
@endpush