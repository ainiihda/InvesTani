@extends('layouts.tampilan')

@section('content')
    <h3> Cart Investasi </h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th> Nama Proyek </th>
                <th> Investasi </th>
                <th> Keuntungan </th>
                <!-- <th> </th> -->
            </tr>
        </thead>
        <tbody>
        @foreach ($result as $result)
            <tr>
                <td> {{ $result->nama }}</td>
                <td> {{ $result->jml_investasi }} </td>
                <td> {{ $result->jml_keuntungan }} </td>
                <td> <button id="send" type="submit" class="btn btn-success"><a href="{{ route('cart.shipping', $result->investasiID)}}">Checkout</a></button>
                <form action="{{ route('cart.deleteInvestasi', $result->investasiID) }}" method="post" novalidate>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }} 
                <button id="send" type="submit" class="btn btn-danger">Hapus</button> </td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
