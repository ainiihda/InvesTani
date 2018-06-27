@extends('layouts.tampilan')

@section('content')
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Nama Proyek</th>
                        <th>Daftar Investor</th>
                        <th>Bukti transfer</th>
                        <th>action</th>
                        <th>status</th>
                      </tr>
                    </thead>
                    @foreach($result as $proyek)
                    <tbody>
                      <tr>
                        
                        <td>{{ $proyek->nama }}</td>
                        <td> 
                        <button id="send" type="submit" class="btn btn-info"><a href="{{route('proyek.listInvestor', $proyek->id)}}">Lihat daftar Investor</a></button>
                        <button id="send" type="submit" class="btn btn-info"><a href="{{route('proyek.editProyek', $proyek->id)}}">Edit Proyek</a></button>
                        </td>
                        <form action="{{route('proyek.uploadBukti', $proyek->id)}}" method="post" enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                        <td> <input type="file" id="bukti" name="bukti" required="required" class="form-control col-md-7 col-xs-12"> </td>
                        <input type="hidden" id="status" name="status" value="1">
                        <td> <button id="send" type="submit" class="btn btn-success">Upload bukti transfer</button></td>
                        </form>
                        
                        <td> 
                        <?php
                          
                              if ($proyek->status == 2)
                                  print "Proyek selesai";
                              elseif ($proyek->status == 1)
                              print "Bukti Transfer di Konfirmasi";
                              else
                              print "Proyek berjalan";
                          
                          ?>
                         
                            <!-- <input id="myInput" type="hidden" value ="{{ $proyek->status }}">
                            <button onclick="myFunction()">Try it</button>
                            <p id="demo"></p> -->
                        </td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                        </div>
                    </div>
                </div>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection