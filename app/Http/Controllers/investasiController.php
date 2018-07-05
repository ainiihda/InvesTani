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
use App\InvestRepo as IRepo;

class investasiController extends Controller
{
    public function investasi($id){
        $repo=new IRepo();
        $user = Auth::User();
        $userid = $user->id;
        $this->validate(request(),[
            'investasi' => 'required',
            'keuntungan' => 'required',   
          ]);
        $repo->create($id,$userid);
        return redirect()->route('cart.index');
    }

    public function cart(){
        $repo=new IRepo();
        $user = Auth::User();
        $id_user = $user->id;
        // $id_user = auth()->id();
        $result = $repo->cart($id_user);
                //    dd($result);
     return view('cart.index', compact('result'));
    }

    public function shipping($id){
        $repo=new IRepo();
        $user = Auth::User();
        $id_user = $user->id;
        $result = $repo->getShipping($id);
        return view('cart.shipping', compact('result'));
    }

    public function update($id){
        $repo=new IRepo();
        $result =$repo->update($id);
          return view('cart.bank');
    }
    public function bank(){
        return view('cart.bank');
      }

    public function bukti(){
        $repo=new IRepo();
        $user = Auth::User();
        // $id_user = $user->id;
        $id_user = auth()->id();
        $result =$repo->bukti($id_user);
     return view('bukti', compact('result'));
    }

    public function uploadBukti($id){
        $repo=new IRepo();
        $repo->upload($id);
          return redirect('/bukti');
    }

}
