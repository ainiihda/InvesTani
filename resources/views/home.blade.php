@extends('layouts.tampilan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                  </br>
                    <a href="{{ route('proyek.create') }}"> Buat Proyek </a>
                  </br>
                    <a href="{{ route('proyek.index') }}"> Lihat Proyek </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
