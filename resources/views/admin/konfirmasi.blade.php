@extends('layouts.admin')
<style>
#myDIV {
    width: 100%;
    padding: 50px 0;
    text-align: center;
    background-color: lightblue;
    margin-top: 20px;
}
</style>

@section('content')
    <h3> Cart Investasi </h3>
    <table class="table table-hover">
        <thead>
            <tr>
            <th> Nama User </th>
                <th> Nama Proyek </th>
                <th> Investasi </th>
                <th> Keuntungan </th>
                <!-- <th> </th> -->
            </tr>
        </thead>
        <tbody>
        @foreach ($result as $result)
            <tr>
            <td> {{ $result->name }}</td>
                <td> {{ $result->nama }}</td>
                <td> {{ $result->jml_investasi }} </td>
                <td> {{ $result->jml_keuntungan }} </td>
                <td>
                <img src="{{ asset('storage/'.$result->konfirmasi) }}" alt="">
                </td>
                <form action="{{route('admin.ubahKonfirmasi', $result->investasiID)}}" method="post" novalidate>
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" id="status" name="status" value="3">
                <td> <button id="send" type="submit" class="btn btn-success">Konfirmasi</button></td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>

<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
@endsection
