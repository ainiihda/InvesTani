<?php

namespace App\Http\Controllers;
use Request;
//use Illuminate\Http\Request;
use App\proyek;
use App\category;
use App\User;
use App\investasi;
use Auth;
use Illuminate\Support\Facades\DB;

class investasiController extends Controller
{
    public function investasi($id){
        $user = Auth::User();
        $userid = $user->id;
        $this->validate(request(),[
            'investasi' => 'required',
            'keuntungan' => 'required',   
          ]);
        investasi::create([
          'jml_investasi' => request('investasi'),
          'jml_keuntungan' => request('total'),
          'proyek_id' => $id,
          'user_id' => $userid,
          
        ]);
        return redirect()->route('cart.index');
    }

    public function cart(){
        $user = Auth::User();
        $id_user = $user->id;
        // $id_user = auth()->id();
        $result = DB::table('investasis')
                       ->join('proyeks','investasis.proyek_id','=','proyeks.id')
                       ->select('investasis.id as investasiID','investasis.*', 'proyeks.*')
                       ->where('investasis.user_id', $id_user) 
                       ->where('investasis.status', '=', '0')
                       ->get();
                //    dd($result);
     return view('cart.index', compact('result'));
    }

    public function shipping($id){
        $user = Auth::User();
        $id_user = $user->id;
        $result = DB::table('investasis')
                       ->join('proyeks','investasis.proyek_id','=','proyeks.id')
                       ->select('investasis.id as investasiID','investasis.*', 'proyeks.*')
                       ->where('investasis.id', $id) 
                       ->where('investasis.status', '=', '0')
                       ->get();

        return view('cart.shipping', compact('result'));
    }

    public function update($id){
        investasi::where('id', $id)-> update([
            'status' => request('status'),
            'no_rekening' => request('no_rekening'),
          ]);
        
          return view('cart.bank');
    }
    public function bank(){
        return view('cart.bank');
      }

    public function bukti(){
        $user = Auth::User();
        // $id_user = $user->id;
        $id_user = auth()->id();
        $result = DB::table('investasis')
                       ->join('proyeks','investasis.proyek_id','=','proyeks.id')
                       ->select('investasis.id as investasiID', 'investasis.status as statusInvestasi','investasis.*', 'proyeks.*')
                       ->where('investasis.user_id', $id_user) 
                       //->where('investasis.status', '=', '1')
                       ->get();
                //    dd($result);
     return view('bukti', compact('result'));
    }

    public function uploadBukti($id){
        investasi::where('id', $id)-> update([
            'status' => request('status'),
            'konfirmasi' => request('bukti')-> store('foto'),
          ]);
        
          return redirect('/bukti');
    }

}
