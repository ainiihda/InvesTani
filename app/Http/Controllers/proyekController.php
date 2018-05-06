<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proyek;
use App\category;
use App\User;
use Illuminate\Support\Facades\DB;

class proyekController extends Controller
{
  public function create(){
    $category = DB::table('categories')->get();
    return view('proyek.create', compact('category'));
  }

  public function store(){
      $this->validate(request(),[
        'nama' => 'required|max:10',
        'deskripsi' => 'required',
        'min_investasi' => 'required',
        'target_investasi' => 'required',
        'deadline' => 'required',
        'lokasi' => 'required',
        'foto1' => 'required|image|mimes:png,jpg,jpeg',
        'foto2' => 'required|image|mimes:png,jpg,jpeg',
        'foto3' => 'required|image|mimes:png,jpg,jpeg',
        'foto4' => 'required|image|mimes:png,jpg,jpeg',

      ]);
      proyek::create([
      'nama' => request('nama'),
      'lokasi'=> request('lokasi'),
      'deskripsi' => request('deskripsi'),
      'min_investasi' => request('min_investasi'),
      'target_investasi' => request('target_investasi'),
      'deadline' => request('deadline'),
      'category_id' => request('category_id'),
      'foto1' => request('foto1') -> store('foto'),
      'foto2' => request('foto2') -> store('foto'),
      'foto3' => request('foto3') -> store('foto'),
      'foto4' => request('foto4') -> store('foto'),
      'user_id' => auth()->id()
    ]);
    return redirect()->route('proyek.create')->withInfo('surat telah dikirim');
    }

    public function index(){
      $proyek = proyek::all();
      return view('proyek.index',compact('proyek'));
    }

    public function product($id){
      $result = DB::table('proyeks')
                      ->where('proyeks.id', '=', $id)
                      ->get();
      return view('proyek.product', compact('result'));
    }

}
