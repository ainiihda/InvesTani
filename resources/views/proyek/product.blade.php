@extends('layouts.tampilan')

@section('content')
<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      @foreach($result as $product)
      <div style="max-width:300px"><center><h2 class="product-name">{{ $product->nama }}</h2></br></center></div>
      <!-- Product main img -->
      <div class="col-md-5 col-md-push-2" style="max-width:300px">
      
        <div id="product-main-img" >
          <div class="product-preview">
            <img src="{{ asset('storage/'.$product->foto1) }}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{ asset('storage/'.$product->foto2) }}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{ asset('storage/'.$product->foto3) }}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{ asset('storage/'.$product->foto4) }}" alt="">
          </div>
        </div>
      </div>
      <!-- /Product main img -->

      <!-- Product thumb imgs -->
      <div class="col-md-3  col-md-pull-2" >
        <div id="product-imgs" style="max-width:90px">
          <div class="product-preview">
            <img src="{{ asset('storage/'.$product->foto1) }}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{ asset('storage/'.$product->foto2) }}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{ asset('storage/'.$product->foto3) }}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{ asset('storage/'.$product->foto4) }}" alt="">
          </div>
        </div>
      </div>
      <!-- /Product thumb imgs -->

      <!-- Product details -->
      <div class="col-md-5">
        <div class="product-details">
          
          <!--<div>
            <div class="product-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <a class="review-link" href="#">10 Review(s) | Add your review</a>
          </div>
        -->
          <div>
          
          <h2>Rp. {{ $result_invest}}</h2><span class="product-available">
          <h5>terkumpul dari target Rp. {{ $product->target_investasi }}</h5></br>
      <h2> {{ $product-> keuntungan}} %</h2>
      <h5>profit dari keuntungan proyek</h5>
      <?php
                          
                          $abc=99;
                          $adameong=date_create($product->deadline);
                          $meong=date_create($now);
                          $diff=date_diff($meong,$adameong);
                          
                          echo $diff->format("%R%a hari lagi");
                          $x= $diff->format("%R%a");
                          
                          ?>
      <!-- </br>
      <span class="product-available">Skema</span>
      <h3 class="product-price" style="padding-left:115px;">{{ $product->min_investasi }}</h3> -->


          </div>
          <form class="form-horizontal form-label-left" action="{{ route('proyek.investasi', $product->id) }}" method="PATCH" enctype="multipart/form-data" novalidate>
              {{ csrf_field() }}
          <div class="add-to-cart">
            <div class="qty-label">
              Investasi
              <div class="input-number" style="padding-left:28px;">
                <input type="number" id="investasi" onKeyPress="OgKeyPress()" onKeyUp="OgKeyPress()" name="investasi" placeholder="minimal {{ $product->min_investasi }}">
              </div>
            </br></br>
            Keuntungan
            <input type="hidden" id="keuntungan" name="keuntungan" value="{{ $product->keuntungan }}">
            <div class="input-number">
              <input type="number" id="total"  name="total" readonly>
            </div>
            
          </br></br>
          <!-- Nomor rekening
              <div class="input-number" style="padding-left:28px;">
                <input type="number" id="no_rekening" name="no_rekening" placeholder="Nomor rekening">
              </div>
            </br></br> -->
            <?php 
            if($x>="0"):?>
            <button id="send" type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Investasi</button><br>
            <?php else:?>
            <button id="send" type="submit" class="add-to-cart-btn-2" disabled>Waktu Habis</button>
            <?php endif; ?>
            
          </div>
          </div>
          </form>
          <!--
          <ul class="product-btns">
            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
            <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
          </ul>

          <ul class="product-links">
            <li>Category:</li>
            <li><a href="#">Headphones</a></li>
            <li><a href="#">Accessories</a></li>
          </ul>

          <ul class="product-links">
            <li>Share:</li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
          </ul>
        -->

        </div>
      </div>
      <!-- /Product details -->

      <!-- Product tab -->
      <div class="col-md-12" >
        <div id="product-tab">
          <!-- product tab nav -->
          <ul class="tab-nav">
            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
            <!-- <li><a data-toggle="tab" href="#tab2">Details</a></li>
            <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li> -->
          </ul>
          <!-- /product tab nav -->

          <!-- product tab content -->
          <div class="tab-content">
            <!-- tab1  -->
            <div id="tab1" class="tab-pane fade in active">
              <div class="row">
                <div class="col-md-12">
                  <p>{{ $product->deskripsi }}</p>
                </div>
              </div>
            </div>
            <!-- /tab1  -->

            <!-- tab2  -->
            <!-- <div id="tab2" class="tab-pane fade in">
              <div class="row">
                <div class="col-md-12">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
            </div> -->
            <!-- /tab2  -->

            <!-- tab3  -->
            <div id="tab3" class="tab-pane fade in">
              <div class="row">
                <!-- Rating -->
                <!-- <div class="col-md-3">
                  <div id="rating">
                    <div class="rating-avg">
                      <span>4.5</span>
                      <div class="rating-stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                      </div>
                    </div>
                    <ul class="rating">
                      <li>
                        <div class="rating-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                        <div class="rating-progress">
                          <div style="width: 80%;"></div>
                        </div>
                        <span class="sum">3</span>
                      </li>
                      <li>
                        <div class="rating-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                        <div class="rating-progress">
                          <div style="width: 60%;"></div>
                        </div>
                        <span class="sum">2</span>
                      </li>
                      <li>
                        <div class="rating-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                        <div class="rating-progress">
                          <div></div>
                        </div>
                        <span class="sum">0</span>
                      </li>
                      <li>
                        <div class="rating-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                        <div class="rating-progress">
                          <div></div>
                        </div>
                        <span class="sum">0</span>
                      </li>
                      <li>
                        <div class="rating-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                        <div class="rating-progress">
                          <div></div>
                        </div>
                        <span class="sum">0</span>
                      </li>
                    </ul>
                  </div>
                </div> -->
                <!-- /Rating -->

                <!-- Reviews -->
                <!-- <div class="col-md-6">
                  <div id="reviews">
                    <ul class="reviews">
                      <li>
                        <div class="review-heading">
                          <h5 class="name">John</h5>
                          <p class="date">27 DEC 2018, 8:0 PM</p>
                          <div class="review-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                          </div>
                        </div>
                        <div class="review-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                      </li>
                      <li>
                        <div class="review-heading">
                          <h5 class="name">John</h5>
                          <p class="date">27 DEC 2018, 8:0 PM</p>
                          <div class="review-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                          </div>
                        </div>
                        <div class="review-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                      </li>
                      <li>
                        <div class="review-heading">
                          <h5 class="name">John</h5>
                          <p class="date">27 DEC 2018, 8:0 PM</p>
                          <div class="review-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                          </div>
                        </div>
                        <div class="review-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                      </li>
                    </ul>
                    <ul class="reviews-pagination">
                      <li class="active">1</li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                  </div>
                </div> -->
                <!-- /Reviews -->

                <!-- Review Form -->
                <!-- <div class="col-md-3">
                  <div id="review-form">
                    <form class="review-form">
                      <input class="input" type="text" placeholder="Your Name">
                      <input class="input" type="email" placeholder="Your Email">
                      <textarea class="input" placeholder="Your Review"></textarea>
                      <div class="input-rating">
                        <span>Your Rating: </span>
                        <div class="stars">
                          <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                          <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                          <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                          <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                          <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                        </div>
                      </div>
                      <button class="primary-btn">Submit</button>
                    </form>
                  </div>
                </div> -->
                <!-- /Review Form -->
              </div>
            </div>
            <!-- /tab3  -->
          </div>
          <!-- /product tab content  -->
        </div>
      </div>
      <!-- /product tab -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

@endforeach
<script>
 
 function OgKeyPress() {
        var investasi = document.getElementById("investasi");
        var s = investasi.value;
 
        var keuntungan = document.getElementById("keuntungan");
		    var y = keuntungan.value
        total.value = Number (s) + (Number(s) * (Number(y)/100));
    }
</script> 
@endsection
