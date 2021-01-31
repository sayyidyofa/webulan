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
                    <p>Nomor Induk Berusaha : {{$usaha->id}}<br><br>
                        UMKM {{$usaha->brand}} adalah UMKM milik {{$usaha->pengusaha->nama}} yang bergerak di bidang {{$usaha->kategori}}. UMKM {{$usaha->brand}} adalah {{$usaha->deskripsi}}.</p>
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
                    @foreach($usaha->usahaProdukUnggulans as $foto)
                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/app1.jpg" class="img-fluid" alt=""> <!-- Foto Produk -->
                            <div class="portfolio-info">
                                <p>App</p> <!-- Nama Foto Produk -->
                                <div>
                                    <a href="img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a> <!-- data-title berisi nama produk -->
                                </div>
                            </div>
                        </div>
                    </div>
@endforeach
                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/app1.jpg" class="img-fluid" alt=""> <!-- Foto Produk -->
                            <div class="portfolio-info">
                                <p>App</p> <!-- Nama Foto Produk -->
                                <div>
                                    <a href="img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a> <!-- data-title berisi nama produk -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/app2.jpg" class="img-fluid" alt=""> <!-- Foto Produk -->
                            <div class="portfolio-info">
                                <p>App 2</p> <!-- Nama Foto Produk -->
                                <div>
                                    <a href="img/portfolio/app2.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="ion ion-eye"></i></a> <!-- data-title berisi nama produk -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/card2.jpg" class="img-fluid" alt=""> <!-- Foto Produk -->
                            <div class="portfolio-info">
                                <p>Card 2</p> <!-- Nama Foto Produk -->
                                <div>
                                    <a href="img/portfolio/card2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="ion ion-eye"></i></a> <!-- data-title berisi nama produk -->
                                </div>
                            </div>
                        </div>
                    </div>

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
                            <p>Alamat Lengkap : {{$usaha->alamat_maps}}<br>
                                Kontak : {{$usaha->kontak}}
                            </p>
                        </div>
                        <!-- Media Sosial -->
                        <div class="row">
                            <p>Media Sosial : <br>
                            @if ($usaha->usahaMediaSosials[0]->vendor == 'website sendiri')
                                <i class="fa fa-link" aria-hidden="true"></i><a href="https://instagram.com/{{$usaha->usahaMediaSosials[0]->link_accname}}" target="_blank"> {{$usaha->usahaMediaSosials[0]->link_accname}}</a><br>
                            @elseif ($usaha->usahaMediaSosials[0]->vendor == "instagram")    
                                <i class="fa fa-instagram" aria-hidden="true"></i><a href="#"> {{$usaha->usahaMediaSosials[0]->link_accname}}</a><br>
                            @elseif ($usaha->usahaMediaSosials[0]->vendor == "facebook")
                                <i class="fa fa-facebook-official" aria-hidden="true"></i><a href="#"> {{$usaha->usahaMediaSosials[0]->link_accname}}</a><br>
                            
                            @endif
                            </p>
                        </div>
                    </div>

                    <!-- Maps -->
                    <div class="col-lg-6">
                        <div class="map mb-4 mb-lg-0">
                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe> -->
                                <iframe src="{{$usaha->alamat_maps}}" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #services (Alamat, Media Sosial, Maps) -->
    </main>
@endsection