<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proyek;
use App\category;
use App\investasi;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\ProyekRepo as PRepo;

class proyekController extends Controller
{
    
    
    
    public function product($id){
      $repo=new PRepo();
      $result = $repo->getProyekData($id);
      $result_invest=$repo->getInvestProyek($id);
      $now=$repo->getWaktu();
      return view('proyek.product', compact('result','result_invest','now'));
    }
    public function create(){
      $repo=new PRepo();
      $category = $repo->getCategory();
      return view('proyek.create', compact('category'));
    }
    public function index(){
      $repo=new PRepo();
      // $proyek = proyek::all()->where('proyeks.status', '=', '0');
      $proyek = proyek::where('proyeks.status', '=', '0')
                      ->paginate(10);
                      // ->get();
      $now=$repo->getWaktu();
      return view('proyek.index',compact('proyek','now'));
    }
    public function listProyek(){
      $repo=new PRepo();
      // $user = Auth::User();
      $id_user = auth()->id();
           // $id_user = auth()->id();
      $result=$repo->getProyekList($id_user);
     return view('proyek.listProyek', compact('result'));
    }

    // public function listInvestor($id){
    //     $result = DB::table('proyeks')
    //                    ->join('investasis','proyeks.id','=','investasis.proyek_id')
    //                    ->join('users', 'investasis.user_id','=','users.id')
    //                   //  ->select('investasis.id as investasiID','investasis.*', 'proyeks.*')
    //                   //  ->where('proyeks.user_id', $id_user) 
    //                   //  ->where('proyeks.status', '=', '0')
    //                    ->where('investasis.status', '=', '3')
    //                    ->get();
    //             //    dd($result);
    //  return view('proyek.listInvestor', compact('result'));
    // }
    public function store(){
      $this->validate(request(),[
        'nama' => 'required|max:10',
        'deskripsi' => 'required',
        'min_investasi' => 'required',
        'target_investasi' => 'required',
        'keuntungan' => 'required',
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
      'keuntungan' => request('keuntungan'),
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
    return redirect('/proyek/index');
    }

    public function uploadBukti($id){
      proyek::where('id', $id)-> update([
          'status' => request('status'),
          'bukti' => request('bukti')-> store('foto'),
        ]);
      
        return redirect('/proyek/listProyek');
  }

  public function editProyek($id){
    $result = DB::table('proyeks')
                    ->join('categories', 'proyeks.category_id','=','categories.id')
                    ->select('categories.nama as namaKategori','categories.id as idCategory','categories.*', 'proyeks.*')
                    ->where('proyeks.id', '=', $id)
                    ->get();
    return view('proyek.editProyek', compact('result'));
  }

  public function updateProyek($id){
    proyek::where('id', $id)-> update([
      'nama' => request('nama'),
      'lokasi'=> request('lokasi'),
      'deskripsi' => request('deskripsi'),
      'keuntungan' => request('keuntungan'),
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
  
    return redirect('/proyek/listProyek');
  }
  
    
}