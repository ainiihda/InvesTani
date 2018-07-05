@extends('layouts.tampilan')

@section('content')
<div id="hot-deal" class="section">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>Daftar</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>Cari</h3>
                                <span>Proyek</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h4>Investasi</h4>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h4>Pantau
                                    dan
                                    Tunggu</h4>
                                <span>Hasilnya</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">investasi pertanian mudah dan nyaman</h2>
                    <p>yuk mulai berinvestasi di bidang pertanian!</p>
                    <a class="primary-btn cta-btn" href="{{ route('proyek.index') }}">Investasi Sekarang</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
</div>
<div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Proyek Tersedia</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            @forelse($proyek as $proyek)
                                    <!-- product -->
                                    <div class="col-md-3 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <img width="200" height="250" src="{{ asset('storage/'.$proyek->foto1) }}" alt="">
                                            <div class="product-label">
                                                <span class="new">
                                                    @if ($proyek->category_id === 1)
                                                    Tanah
                                                    @else
                                                    Proyek
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Target : Rp. {{ $proyek->target_investasi }}</p>
                                            <h3 class="product-name"><a href="#"> {{ $proyek->nama }} </a></h3>
                                            <h4 class="product-price">Mulai Dari : Rp. {{ $proyek->min_investasi }}</h4>
                                            <div class="product-rating">
                                                    <i>{{ $proyek->deadline }}</i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><a href="{{ route('proyek.product', $proyek->id) }}">Investasi</a></button>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- /product -->
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                                @empty
                                @endforelse
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <div class="section">
        <div id="hot-deal" class="hot-deal">
                <a class="primary-btn cta-btn" href="{{ route('proyek.index') }}">Proyek Lainnya</a>
        </div>
    </div>
    <!-- /SECTION -->
@endsection
