<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proyek;
use App\category;
use App\User;
use App\admin;
use App\investasi;
use Illuminate\Support\Facades\DB;


class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin');
    }

    public function adminProyek(){
        $proyek = DB::table('proyeks')
                      ->join('users','proyeks.user_id','=','users.id')
                      ->select('proyeks.id as proyekID','proyeks.*','users.*')
                      ->where('proyeks.status', '=', '0')
                      ->get();
                  //dd($result);
        // $proyek = proyek::all();
        return view('admin.proyek',compact('proyek'));
    }

    public function proyekKonfirmasi(){
        $proyek = DB::table('proyeks')
                      ->join('users','proyeks.user_id','=','users.id')
                      ->select('proyeks.id as proyekID','proyeks.*','users.*')
                      ->where('proyeks.status', '=', '1')
                      ->get();
                  //dd($result);
        // $proyek = proyek::all();
        return view('admin.proyekKonfirmasi',compact('proyek'));
    }

    public function proyekSelesai($id){
        proyek::where('id', $id)-> update([
            'status' => request('status'),
            // 'konfirmasi' => request('bukti')-> store('foto'),
          ]);

        investasi::where('proyek_id', $id)->update([
            'status' => request('investasiStatus'),
        ]);
        
          return redirect('/admin/proyek');
    }

    public function destroyProyek($id){
        investasi::where('proyek_id', $id)->delete();
        proyek::where('id', $id)->delete();
        // surat_aktif_kuliah::where('id_user', $id)->delete();
        // surat_tidak_menerima_beasiswa::where('id_user', $id)->delete();
        // surat_rekomendasi_beasiswa::where('id_user', $id)->delete();
        return redirect('/admin/proyek');
      }

      public function proyekDone(){
        $proyek = DB::table('proyeks')
                      ->join('users','proyeks.user_id','=','users.id')
                      ->select('proyeks.id as proyekID','proyeks.*','users.*')
                      ->where('proyeks.status', '=', '2')
                      ->get();
                  //dd($result);
        // $proyek = proyek::all();
        return view('admin.proyekDone',compact('proyek'));
    }

    public function adminMember(){
        $member = user::all();
        return view('admin.member',compact('member'));
    }

    public function destroyMember($id){
        user::where('id', $id)->delete();
        // proyek::where('id', $id)->delete();
        // surat_aktif_kuliah::where('id_user', $id)->delete();
        // surat_tidak_menerima_beasiswa::where('id_user', $id)->delete();
        // surat_rekomendasi_beasiswa::where('id_user', $id)->delete();
        return redirect('/admin/member');
      }

      public function editMember($id){
       $result = user::where('id', $id)->get();
        return view('admin.editMember',compact('result'));
      }

      public function editAdmin($id){
        user::where('id', $id)-> update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt('password'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'tempat_lahir' => request('tempat_lahir'),
            'no_telp' => request('no_telp'),
            'username' => request('username'),
          ]);
        
          return redirect('/admin/member');
    }

    public function tambahAdmin(){
        return view('admin.create');
    }
    
    public function tambahAdminStore(){
        $this->validate(request(),[
          'name' => 'required|string|max:255',
          'username' => 'required|string|max:20',
          'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt('password'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'tempat_lahir' => request('tempat_lahir'),
            'no_telp' => request('no_telp'),
            'username' => request('username'),
        ]);
    
      return redirect('/admin/member');
    }
    
    public function konfirmasi(){
        $result = DB::table('investasis')
                       ->join('proyeks','investasis.proyek_id','=','proyeks.id')
                       ->join('users','investasis.user_id','=','users.id')
                       ->select('investasis.id as investasiID','investasis.*', 'proyeks.*', 'users.*')
                    //    ->where('investasis.user_id', $id_user) 
                       ->where('investasis.status', '=', '2')
                       ->get();
                //    dd($result);
     return view('admin.konfirmasi', compact('result'));
    }

    public function ubahKonfirmasi($id){
        investasi::where('id', $id)-> update([
            'status' => request('status'),
            // 'konfirmasi' => request('bukti')-> store('foto'),
          ]);
        
          return redirect('/admin/konfirmasi');
    }


    public function sudahKonfirmasi(){
        $result = DB::table('investasis')
                       ->join('proyeks','investasis.proyek_id','=','proyeks.id')
                       ->join('users','investasis.user_id','=','users.id')
                       ->select('investasis.id as investasiID','investasis.*', 'proyeks.*', 'users.*')
                    //    ->where('investasis.user_id', $id_user) 
                       ->where('investasis.status', '=', '3')
                       ->get();
                //    dd($result);
     return view('admin.sudahKonfirmasi', compact('result'));
    }

    public function listInvestor($id){
        $result = DB::table('proyeks')
                       ->join('investasis','proyeks.id','=','investasis.proyek_id')
                       ->join('users', 'investasis.user_id','=','users.id')
                      //  ->select('investasis.id as investasiID','investasis.*', 'proyeks.*')
                      //  ->where('proyeks.user_id', $id_user) 
                      //  ->where('proyeks.status', '=', '0')
                       ->where('investasis.status', '=', '3')
                       ->get();
                //    dd($result);
     return view('admin.listInvestor', compact('result'));
    }

    public function listInvestorDone($id){
        $result = DB::table('proyeks')
                       ->join('investasis','proyeks.id','=','investasis.proyek_id')
                       ->join('users', 'investasis.user_id','=','users.id')
                      //  ->select('investasis.id as investasiID','investasis.*', 'proyeks.*')
                      //  ->where('proyeks.user_id', $id_user) 
                      //  ->where('proyeks.status', '=', '0')
                       ->where('investasis.status', '=', '4')
                       ->get();
                //    dd($result);
     return view('admin.listInvestor', compact('result'));
    }
}
