@extends('layouts.tampilan')

@section('content')
<!-- STORE -->
<div id="store" class="col-md-12">
  <!-- store top filter -->
  <div class="store-filter clearfix">
    <!-- <div class="store-sort"> -->
      <!-- <label>
        Sort By:
        <select class="input-select">
          <option value="0">Popular</option>
          <option value="1">Position</option>
        </select>
      </label> -->

      <!-- <label>
        Show:
        <select class="input-select">
          <option value="0">20</option>
          <option value="1">50</option>
        </select>
      </label> -->
    <!-- </div> -->
    <ul class="store-grid">
      <li class="active"><i class="fa fa-th"></i></li>
      <li><a href="{{ route('proyek.create') }}"><i class="fa fa-pencil"></i></a></li>
    </ul>
  </div>
  <!-- /store top filter -->

  <!-- store products -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    @forelse($proyek as $proyeks)
    <!-- product -->
    <div class="col-md-4 col-xs-6">
      <div class="product">
        <div class="product-img">
          <img width="210" height="340" src="{{ asset('storage/'.$proyeks->foto1) }}" alt="">
          <div class="product-label">
            <span class="new">
              @if ($proyeks->category_id === 1)
              Tanah
              @else
              Proyek
              @endif
            </span>
          </div>
        </div>
        <div class="product-body">
          <p class="product-category">Target : {{ $proyeks->target_investasi }}</p>
          <h3 class="product-name"><a href="#"> {{ $proyeks->nama }} </a></h3>
          <h4 class="product-price">Mulai Dari : {{ $proyeks->min_investasi }}</h4>
          <div class="product-rating">
            <i>{{ $proyeks->deadline }}</i>
          </div>
          <div class="product-btns">
            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
          </div>
        </div>
        <div class="add-to-cart">
          <button class="add-to-cart-btn"><a href="{{ route('proyek.product', $proyeks->id) }}"> Investasi </a></button>
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
</div>
{{ $proyek->links()}}
<!-- /STORE -->
@endsection
