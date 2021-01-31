@extends('layouts.front')

@section('content')
    <!--==========================
    Intro Section
    ============================-->
    <section id="intro" class="clearfix">
        <div class="container">
            <div class="intro-info">
                <div>
                    <h4 style="color: white;">Selamat Datang di</h4>
                </div>
                <h2>Sistem Informasi UMKM Kelurahan Bulusan</h2>
            </div>
        </div>
    </section><!-- #intro -->

    <main id="main">

        <!--==========================
            Statistik
            ============================-->
        <section id="why-us" class="wow fadeIn" style="background: #494648;">
            <div class="container">
                <header class="section-header">
                    <h3>Statistik UMKM</h3>
                </header>

                <div class="row counters">

                    <div class="col-lg-6 col-6 text-center">
                        <span data-toggle="counter-up">{{count($pengusaha)}}</span>
                        <p>Pemilik UMKM</p>
                    </div>

                    <div class="col-lg-6 col-6 text-center">
                        <span data-toggle="counter-up">{{count($usahas)}}</span>
                        <p>UMKM</p>
                    </div>

                </div>

            </div>
        </section>

        <!--==========================
            Daftar UMKM
            ============================-->
        <section id="about">
            <div class="container">

                <header class="section-header">
                    <h3>Daftar UMKM Kelurahan Bulusan</h3>
                </header>

                <div class="row about-container">

                    <div class="col-lg-12 content">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width:100%">
                            <thead>
                            <tr>
                                <!-- <th style="width: 15%">No</th> -->
                                <th>UMKM</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usahas as $usaha)
                                <tr>
                                    <!-- <td>{{ $loop->iteration }}</td> -->
                                    <td><a href="{{ route('front.usahaShow', ['usaha' => $usaha->id]) }}">{{ $usaha->brand }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
        </section><!-- #about -->

    </main>
@endsection
