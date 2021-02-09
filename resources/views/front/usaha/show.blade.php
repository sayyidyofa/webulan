@extends('layouts.front')

@section('content')
<main id="main">

    <!--==========================
            Deskripsi UMKM
            ============================-->
    <section id="why-us" class="wow fadeIn">
        <div class="container" style="padding-top: 50px;">
            <header class="section-header">
                <h3>{{$usaha->brand}}</h3>
                <p>UMKM {{$usaha->brand}} adalah UMKM milik {{$usaha->pengusaha->nama}} yang bergerak di bidang {{$usaha->kategori}}.<br> UMKM {{$usaha->brand}} adalah {{$usaha->deskripsi}}.</p>
            </header>
        </div>
    </section>

    <!--==========================
            Foto Produk Unggulan
            ============================-->
    <section id="portfolio" class="clearfix">
        <div class="container">

            <header class="section-header">
                <h3 class="section-title">Produk Unggulan</h3>
                <p>Daftar produk unggulan dari UMKM {{$usaha->brand}} adalah </p>
            </header>

            <div class="row portfolio-container">
                @foreach($usaha->usahaProdukUnggulans as $produkUnggulan)
                @foreach($produkUnggulan->produkUnggulanFotoProduks as $fotoProduk)
                @foreach($fotoProduk->foto as $key => $media)
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap">
                        <img src="{{ $media->getUrl() }}" class="img-fluid" alt=""> <!-- Foto Produk -->
                        <div class="portfolio-info">
                            <h4 style="color: white;">{{$produkUnggulan->nama}}</h4>
                            <p style="text-transform: lowercase;">{{$produkUnggulan->deskripsi}}</p> <!-- Nama Foto Produk -->
                            <div>
                                <a href="{{ $media->getUrl() }}" data-lightbox="portfolio" data-title="{{$produkUnggulan->nama}}" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a> <!-- data-title berisi nama produk -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
                @endforeach

            </div>

        </div>
    </section><!-- #portfolio (Produk Unggulan) -->

    <!--==========================
            Alamat, Media Sosial, Maps
            ============================-->
    <section id="services" class="section-bg">
        <div class="container">

            <div class="row wow fadeInUp">
                <div class="col-lg-6" style="padding-left: 50px;">
                    <!-- Alamat dan Kontak -->
                    <div class="row">
                        <p>Alamat Lengkap : {{$usaha->alamat}}<br>
                            Kontak : {{$usaha->kontak}}
                        </p>
                    </div>
                    <!-- Media Sosial -->
                    <div class="row">
                        <p>Media Sosial : <br>
                            @if($usaha->usahaMediaSosials->count() > 0)
                            @foreach($usaha->usahaMediaSosials as $mediaSosial)
                            @if ($mediaSosial->vendor == "website")
                            <i class="fa fa-link" aria-hidden="true"></i><a href="{{$mediaSosial->link_accname}}" target="_blank" title="Website"> {{$mediaSosial->link_accname}}</a><br>
                            @elseif ($mediaSosial->vendor == "instagram")
                            <i class="fa fa-instagram" aria-hidden="true"></i><a href="https://www.instagram.com/{{$mediaSosial->link_accname}}" target="_blank" title="Instagram"> {{$mediaSosial->link_accname}}</a><br>
                            @elseif ($mediaSosial->vendor == "facebook")
                            <i class="fa fa-facebook-official" aria-hidden="true"></i><a href="https://www.facebook.com/{{$mediaSosial->link_accname}}" target="_blank" title="Facebook"> {{$mediaSosial->link_accname}}</a><br>
                            @elseif ($mediaSosial->vendor == "tiktok")
                            <i class="fa fa-music" aria-hidden="true"></i><a href="https://www.tiktok.com/{{$mediaSosial->link_accname}}" target="_blank" title="TikTok"> {{$mediaSosial->link_accname}}</a><br>
                            @endif
                            @endforeach
                            @else
                            Belum ada media sosial yang ditambahkan
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Maps -->
                @if($usaha->maps)
                <div class="col-lg-6">
                    <div class="map mb-4 mb-lg-0">
                        @if(Str::contains($usaha->maps, 'https://www.google.com/maps/embed?' ))
                        <iframe {!!$usaha->maps!!}></iframe>
                        @else
                        <i class="fa fa-map-marker" aria-hidden="true"></i> <a href="{{$usaha->maps}}" target="_blank" title="Maps">{{$usaha->maps}}</a>
                        @endif
                    </div>
                </div>
                @endif
            </div>

        </div>
    </section><!-- #services (Alamat, Media Sosial, Maps) -->
</main>
@endsection