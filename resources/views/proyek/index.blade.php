@extends('layouts.tampilan')

@section('content')
<!-- STORE -->
<div id="store" class="col-md-9">
  <!-- store top filter -->
  <div class="store-filter clearfix">
    <div class="store-sort">
      <label>
        Sort By:
        <select class="input-select">
          <option value="0">Popular</option>
          <option value="1">Position</option>
        </select>
      </label>

      <label>
        Show:
        <select class="input-select">
          <option value="0">20</option>
          <option value="1">50</option>
        </select>
      </label>
    </div>
    <ul class="store-grid">
      <li class="active"><i class="fa fa-th"></i></li>
      <li><a href="{{ route('proyek.create') }}"><i class="fa fa-pencil"></i></a></li>
    </ul>
  </div>
  <!-- /store top filter -->

  <!-- store products -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    @forelse($proyek as $proyek)
    <!-- product -->
    <div class="col-md-4 col-xs-6">
      <div class="product">
        <div class="product-img">
          <img width="210" height="340" src="{{ asset('storage/'.$proyek->foto1) }}" alt="">
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
          <p class="product-category">Target : {{ $proyek->target_investasi }}</p>
          <h3 class="product-name"><a href="#"> {{ $proyek->nama }} </a></h3>
          <h4 class="product-price">Mulai Dari : {{ $proyek->min_investasi }}</h4>
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
          <button class="add-to-cart-btn"><a href="{{ route('proyek.product', $proyek->id) }}"> Investasi </a></button>
        </div>
      </div>
    </div>
    <!-- /product -->

    <div class="clearfix visible-sm visible-xs"></div>
    @empty
    <h3> No Proyek </h3>
    @endforelse
</div>
  </div>
  <!-- /store products -->

  <!-- store bottom filter -->
  <div class="store-filter clearfix">
    <span class="store-qty">Showing 20-100 products</span>
    <ul class="store-pagination">
      <li class="active">1</li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
    </ul>
  </div>
  <!-- /store bottom filter -->
</div>
<!-- /STORE -->
@endsection
