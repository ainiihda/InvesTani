@extends('layouts.admin')

@section('content')
    <h3> Cart Investasi </h3>
    <table id="countit" class="table table-hover">
        <thead>
            <tr>
            <th> Nama User </th>
                <th> Nama Proyek </th>
                <th> Investasi </th>
                <th> Keuntungan </th>
                <th> Nomor Rekening </th>
                <!-- <th> </th> -->
            </tr>
        </thead>
        
        <tbody>
        @foreach ($result as $result)
            <tr>
            <td> {{ $result->name }}</td>
                <td> {{ $result->nama }}</td>
                <td> {{ $result->jml_investasi }} </td>
                <td class="count-me" > {{ $result->jml_keuntungan }} </td>
                <td> {{$result->no_rekening}}</td>
                
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <td> </td>
            <td></td>
            <td></td>
            <td>
            <script language="javascript" type="text/javascript">
            var tds = document.getElementById('countit').getElementsByTagName('td');
            var sum = 0;
            for(var i = 0; i < tds.length; i ++) {
                if(tds[i].className == 'count-me') {
                    sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }
            }
            document.getElementById('countit').innerHTML += '<tr><td>' + sum + '</td><td>total Keuntungan yang ditransfer</td></tr>';
        
        </script>
            
            </td>
            <td></td>

        </tfoot>
    </table>

    

@endsection
