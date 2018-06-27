@extends('layouts.tampilan')

@section('content')
@guest
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
              </br>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-12">
                                <div class="checkbox">
                                    <label>
                                      belum punya akun?
                                        <a class="btn-link" href="{{ route('register') }}">  Register
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="col-md-12 col-sm-12 col-xs-12" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Proyek</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lengkapi data dibawah ini</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    @foreach($result as $result)
                        <form action="{{ route('proyek.updateProyek', $result->id) }}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
                        <div class="item form-group">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Proyek <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama" class="form-control col-md-7 col-xs-12" value="{{ $result->nama }}" name="nama" placeholder="nama proyek" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Kategori <span class="required">*</span>
                        </label>
                        <select name="category_id" id="" class="input-select">
                    
                            <option value="{{$result -> idCategory}}">{{ $result -> namaKategori }}</option>
                          
                        </select>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi">Lokasi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="lokasi" required="required" name="lokasi"  value="{{ $result->lokasi }}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deskripsi">Deskripsi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="deskripsi" required="required" name="deskripsi"  value="{{ $result->deskripsi }}" placeholder="deskripsi proyek" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="target_investasi">Target Investasi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="target_investasi" required="required" name="target_investasi"  value="{{ $result->target_investasi }}" placeholder="Target Investasi" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="min_investasi">Minimum Investasi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="min_investasi" required="required" name="min_investasi"  value="{{ $result->min_investasi }}" placeholder="Minimum Investasi" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keuntungan">Keuntungan Investasi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="keuntungan" required="required" name="keuntungan"  value="{{ $result->keuntungan }}" placeholder="Tulis presentase keuntungan dalam persen" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deadline">Deadline<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="deadline" required="required" name="deadline"  value="{{ $result->deadline }}" placeholder="Deadline Investasi" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto1">Foto Proyek <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="foto1" name="foto1" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto2">Foto Proyek 2<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="foto2" name="foto2" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto3">Foto Proyek 3</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="foto3" name="foto3" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto4">Foto Proyek 4</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="foto4" name="foto4" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endguest
@endsection
