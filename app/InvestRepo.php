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
  public function cart($id_user);
  public function create($id,$userid);
//   public function bukti($id);
  public function getInvestProyek($id);
  public function getShipping($id);
}

class InvestRepo implements UserRepository{
    public function getWaktu(){
        return Carbon::now();
      }
    public function getInvestProyek($id){

      return investasi::where('investasis.proyek_id','=',$id)->sum('jml_investasi');
    }
    public function getShipping($id){
        $result = investasi::join('proyeks','investasis.proyek_id','=','proyeks.id')
                       ->select('investasis.id as investasiID','investasis.*', 'proyeks.*')
                       ->where('investasis.id', $id) 
                       ->where('investasis.status', '=', '0')
                       ->get();
        return($result);
    }
    public function create($id,$userid){
        return investasi::create([
            'jml_investasi' => request('investasi'),
            'jml_keuntungan' => request('total'),
            'proyek_id' => $id,
            'user_id' => $userid,
            
          ]);
    }
    public function cart($id_user){
        $result = investasi::join('proyeks','investasis.proyek_id','=','proyeks.id')
        ->select('investasis.id as investasiID','investasis.*', 'proyeks.*')
        ->where('investasis.user_id', $id_user) 
        ->where('investasis.status', '=', '0')
        ->get();
        return($result);
    }
    public function bukti($id_user){
        $result = investasi::join('proyeks','investasis.proyek_id','=','proyeks.id')
        ->select('investasis.id as investasiID', 'investasis.status as statusInvestasi','investasis.*', 'proyeks.*')
        ->where('investasis.user_id', $id_user) 
        //->where('investasis.status', '=', '1')
        ->get();
        return($result);
    }
    // public function upload($id){
    //     $result = investasi::where('id', $id)-> update([
    //         'status' => request('status'),
    //         'konfirmasi' => request('bukti')-> store('foto'),
    //       ]);
    //     return($result);
    // }
    public function update($id){
        $result = investasi::where('id', $id)-> update([
            'status' => request('status'),
            'no_rekening' => request('no_rekening'),
          ]);
        return($result);
    }


}


?>