<?php
namespace App;
use App\proyek;
use App\category;
use App\investasi;
use App\User;
use Carbon\Carbon;
use Auth;
interface UserRepository {
  public function getWaktu();

}

class AdminRepo implements UserRepository{
    public function getWaktu(){
        return Carbon::now();
      }
    public function getInvestProyek($id){

      return investasi::where('investasis.proyek_id','=',$id)->sum('jml_investasi');
    }
    public function adminProyek(){
        $result =proyek::join('users','proyeks.user_id','=','users.id')
        ->select('proyeks.id as proyekID','proyeks.*','users.*')
        ->where('proyeks.status', '=', '0')
        ->get();
        return($result);
    }
    public function proyekKonfirmasi(){
        $result =proyek::join('users','proyeks.user_id','=','users.id')
        ->select('proyeks.id as proyekID','proyeks.*','users.*')
        ->where('proyeks.status', '=', '1')
        ->get();
        return($result);
    }
    // public function proyekSelesai($id){
    //    return proyek::where('id', $id)-> update([
    //         'status' => request('status'),
    //         // 'konfirmasi' => request('bukti')-> store('foto'),
    //       ]);
    // }
    public function proyekDone(){
        return proyek::join('users','proyeks.user_id','=','users.id')
        ->select('proyeks.id as proyekID','proyeks.*','users.*')
        ->where('proyeks.status', '=', '2')
        ->get();
    }
}


?>