@extends('layouts.tampilan')

@section('content')
    <h3> Cart Investasi </h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th> Nama Proyek </th>
                <th> Investasi </th>
                <th> Keuntungan </th>
                <th> Bukti transfer </th>
                <th> </th>
                <th> Status </th>
                <!-- <th> </th> -->
            </tr>
        </thead>
        <tbody>
        @foreach ($result as $result)
            <tr>
                <td> {{ $result->nama }}</td>
                <td> {{ $result->jml_investasi }} </td>
                <td> {{ $result->jml_keuntungan }} </td>
                <form action="{{route('uploadBukti', $result->investasiID)}}" method="post" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                <td> <input type="file" id="bukti" name="bukti" required="required" class="form-control col-md-7 col-xs-12"> </td>
                <input type="hidden" id="status" name="status" value="2">
                <td> <button id="send" type="submit" class="btn btn-success">Checkout</button></td>
                </form>
                <td>
                        <?php
                          
                              if ($result->statusInvestasi == 1)
                                  print "Menunggu bukti transfer";
                              elseif ($result->statusInvestasi == 2)
                              print "Bukti transfer menunggu di konfirmasi";
                              elseif ($result->statusInvestasi == 3)
                              print "Bukti transfer telah di konfirmasi";
                              else
                              print "Proyek selesai, segera cek rekening anda";
                          
                          ?>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
