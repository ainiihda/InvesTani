@extends('layouts.admin')

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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    @foreach($member as $member)
                    <tbody>
                      <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->username }}</td>
                        <td>
                        
                          <button id="send" type="submit" class="btn btn-info"> <a href="{{route('admin.editMember', $member->id)}}">edit</a></button>
                          
                        <form action="{{ route('admin.deleteMember', $member->id) }}" method="post" novalidate>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                          <button id="send" type="submit"  class="btn btn-danger">Hapus</button>
                          </form>
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